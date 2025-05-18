<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('blog_reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('blog_posts')->onDelete('cascade');
            $table->string('session_id');
            $table->enum('reaction_type', ['like', 'dislike']);
            $table->timestamps();
            
            // Ensure one reaction per session per post
            $table->unique(['post_id', 'session_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_reactions');
    }
}; 