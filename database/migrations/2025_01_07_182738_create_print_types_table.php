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
        Schema::create('print_types', function (Blueprint $table) {
            $table->id();
            $table->text('printer_name');
            $table->text('printer_type');
            $table->boolean('printer_status');
            $table->text('description');
            $table->text('printer_ip')->nullable()->comment('IP address for future use');
            $table->text('printer_port')->nullable()->comment('Port for future use');
            $table->text('printer_path')->nullable()->comment('Path for future use');
            $table->text('printer_driver')->nullable()->comment('Driver for future use');
            $table->text('printer_model')->nullable()->comment('Model for future use');
            $table->text('printer_location')->nullable()->comment('Location for future use');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('print_types');
    }
};
