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
        Schema::create('help_and_support_articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('article_body');
            $table->string('slug');
            $table->boolean('status')->default(1);
            $table->text('user_id');
            $table->integer('order')->default(0);
            $table->string('featured_image');
            $table->text('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->json('related_articles')->nullable();
            $table->json('tags')->nullable();
            $table->json('categories')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('help_and_support_articles');
    }
};
