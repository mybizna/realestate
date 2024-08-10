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
        Schema::create('realestate_tenancy_invoice', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tenancy_id')->constrained('realestate_tenancy')->onDelete('cascade')->nullable()->index('realestate_tenancy_invoice_tenancy_id');
            $table->foreignId('invoice_id')->constrained('account_invoice')->onDelete('cascade')->nullable()->index('realestate_tenancy_invoice_invoice_id');
            $table->char('billing_period', 20)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realestate_tenancy_invoice');
    }
};
