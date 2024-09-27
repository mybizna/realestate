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
        Schema::create('realestate_unit_setup', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('unit_id')->nullable()->constrained('realestate_unit')->onDelete('set null');
            $table->double('amount', 8, 2)->nullable();

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
        Schema::dropIfExists('realestate_unit_setup');
    }
};
