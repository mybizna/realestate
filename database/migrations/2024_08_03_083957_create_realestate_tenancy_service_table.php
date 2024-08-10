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
        Schema::create('realestate_tenancy_service', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->foreignId('tenancy_id')->constrained('realestate_tenancy')->onDelete('cascade')->nullable()->index('tenancy_id');
            $table->double('amount', 8, 2)->nullable();
            $table->dateTime('billing_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realestate_tenancy_service');
    }
};
