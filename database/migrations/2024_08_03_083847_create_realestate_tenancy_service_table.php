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
            $table->foreignId('tenancy_id')->nullable()->constrained('realestate_tenancy')->onDelete('set null');
            $table->double('amount', 8, 2)->nullable();
            $table->dateTime('billing_date')->nullable();

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
        Schema::dropIfExists('realestate_tenancy_service');
    }
};
