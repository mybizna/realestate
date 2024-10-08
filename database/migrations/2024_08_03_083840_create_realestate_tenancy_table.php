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
        Schema::create('realestate_tenancy', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->foreignId('unit_id')->nullable()->constrained('realestate_unit')->onDelete('set null');
            $table->foreignId('partner_id')->nullable()->constrained('partner_partner')->onDelete('set null');
            $table->enum('type', ['weekly', 'bi_weekly', 'monthly', 'quarterly', 'bi_annually', 'annually'])->default('monthly');
            $table->double('amount', 8, 2)->nullable();
            $table->double('deposit', 8, 2)->nullable();
            $table->double('goodwill', 8, 2)->nullable();
            $table->integer('rooms');
            $table->dateTime('billing_date')->nullable();
            $table->boolean('is_merged_bill')->default(true)->nullable();
            $table->boolean('is_started')->default(0)->nullable();
            $table->boolean('is_closed')->default(0)->nullable();
            $table->boolean('bill_gas')->default(0)->nullable();
            $table->boolean('bill_water')->default(0)->nullable();
            $table->boolean('bill_electricity')->default(0)->nullable();

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
        Schema::dropIfExists('realestate_tenancy');
    }
};
