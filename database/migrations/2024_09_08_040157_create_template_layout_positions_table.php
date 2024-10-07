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
        Schema::create('template_layout_positions', function (Blueprint $table) {
            $table->id();
            $table->text('layout_id');
            $table->text('template_id');
            $table->text('field_name');
            $table->json('positions')->nullable();
            $table->json('configuration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('template_layout_positions');
    }
};
