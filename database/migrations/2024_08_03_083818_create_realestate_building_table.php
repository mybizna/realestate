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
        Schema::create('realestate_building', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('estate_id')->nullable();
            $table->enum('type', ['apartment', 'maisonette', 'bungalow'])->nullable();
            $table->text('description')->nullable();
            $table->integer('units')->nullable();
            $table->double('default_deposit', 8, 2)->nullable();
            $table->double('default_goodwill', 8, 2)->nullable();
            $table->double('default_amount', 8, 2)->nullable();
            $table->boolean('is_full')->default(0)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realestate_building');
    }
};
