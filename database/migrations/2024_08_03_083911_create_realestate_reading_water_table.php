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
        Schema::create('realestate_reading_water', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tenancy_id')->constrained('realestate_tenancy')->onDelete('cascade')->nullable()->index('realestate_reading_water_tenancy_id');
            $table->foreignId('invoice_id')->constrained('account_invoice')->onDelete('cascade')->nullable()->index('realestate_reading_water_invoice_id');
            $table->integer('reading')->nullable();
            $table->integer('units')->nullable();
            $table->string('billing_period', 20)->nullable();
            $table->dateTime('billing_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realestate_reading_water');
    }
};
