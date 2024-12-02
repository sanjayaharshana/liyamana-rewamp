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
        Schema::create('ordered_designs', function (Blueprint $table) {
            $table->id();
            $table->text('address')->nullable();
            $table->text('price')->nullable();
            $table->json('design')->nullable();
            $table->string('status')->default('pending');
            $table->text('user_id');
            $table->longText('order_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordered_designs');
    }
};
