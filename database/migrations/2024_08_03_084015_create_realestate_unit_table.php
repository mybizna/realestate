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
        Schema::create('realestate_unit', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->foreignId('building_id')->nullable();
            $table->enum('type', ['single', 'bedsitter', 'one_bedroom', 'two_bedroom', 'three_bedroom', 'four_bedroom'])->default('one_bedroom');
            $table->double('amount', 8, 2)->nullable();
            $table->double('deposit', 8, 2)->nullable();
            $table->double('goodwill', 8, 2)->nullable();
            $table->integer('rooms');
            $table->integer('bathrooms');
            $table->boolean('is_full')->default(0)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realestate_unit');
    }
};
