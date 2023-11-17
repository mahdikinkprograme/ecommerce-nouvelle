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
        Schema::create('product190', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('price');
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->enum('is_item',['yes','no']);
            $table->string('prod_uniqid')->uniqid();
            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product190');
    }
};
