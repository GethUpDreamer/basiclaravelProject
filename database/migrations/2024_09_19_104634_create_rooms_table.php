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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_title')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price', 8, 2)->nullable(); // decimal for price, with 8 digits and 2 decimal places
            $table->string('room_type')->nullable();
            $table->boolean('wifi')->default(true); // Use boolean true as default for wifi availability

            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
