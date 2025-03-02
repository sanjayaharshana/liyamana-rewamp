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
        Schema::create('momentos', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('short_description');
            $table->text('description');
            $table->text('feature_image');
            $table->text('article');
            $table->text('taken_by');
            $table->text('template_id');
            $table->string('user_id');
            $table->text('category_ids');
            $table->json('theme')->nullable();
            $table->json('configuration')->nullable();
            $table->json('video_links')->nullable();
            $table->text('seo_tags')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('momentos');
    }
};
