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

            $table->foreignId('tenancy_id')->nullable()->constrained('realestate_tenancy')->onDelete('set null');
            $table->foreignId('invoice_id')->nullable()->constrained('account_invoice')->onDelete('set null');
            $table->char('billing_period', 20)->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
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
