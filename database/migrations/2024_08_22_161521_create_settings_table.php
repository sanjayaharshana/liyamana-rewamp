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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('value')->nullable();
            $table->string('type');
            $table->string('options')->nullable()->comment('options for select type, json format');
            $table->string('label')->nullable();
            $table->string('placeholder')->nullable();
            $table->string('rules')->nullable();
            $table->string('description')->nullable();
            $table->string('group')->nullable();
            $table->string('default')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
