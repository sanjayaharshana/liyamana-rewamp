<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('templetes', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('buying_price')->default(0);
            $table->string('feature_image')->default('default.png');
            $table->text('form_data')->nullable();
            $table->json('images')->nullable();
            $table->text('category_ids')->nullable();
            $table->text('user_id');
            $table->string('slug');
            $table->boolean('status')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_trending')->default(0);
            $table->boolean('is_new')->default(0);
            $table->boolean('is_best_selling')->default(0);
            $table->boolean('is_top_rated')->default('0');
            $table->boolean('is_active')->default(1);
            $table->text('tags')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('background')->nullable();
            $table->json('layouts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templetes');
    }
};
