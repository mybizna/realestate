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
        Schema::create('realestate_reading_electricity', function (Blueprint $table) {
            $table->id();

            $table->integer('reading');
            $table->foreignId('tenancy_id')->nullable();
            $table->foreignId('invoice_id')->nullable();
            $table->integer('units');
            $table->char('billing_period', 20)->nullable();
            $table->dateTime('billing_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realestate_reading_electricity');
    }
};
