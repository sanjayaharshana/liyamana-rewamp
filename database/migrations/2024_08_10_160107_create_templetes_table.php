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
            $table->float('price');
            $table->float('buying_price');
            $table->text('feature_image')->nullable();
            $table->text('form_data')->nullable();
            $table->text('images');
            $table->integer('category_id');
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
            $table->text('seo_description');
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
