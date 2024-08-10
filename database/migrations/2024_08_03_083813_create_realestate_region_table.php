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
        Schema::create('realestate_region', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->foreignId('country_id')->constrained('core_country')->onDelete('cascade')->nullable()->index('country_id');
            $table->foreignId('state_id')->constrained('core_state')->onDelete('cascade')->nullable()->index('state_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realestate_region');
    }
};
