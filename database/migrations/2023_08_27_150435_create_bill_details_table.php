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
        Schema::create('bill_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_variant_id');
            $table->integer('quantity');
            $table->foreign('product_variant_id')
            ->references('id')
            ->on('product_variants')
            ->onDelete('cascade');
            $table->unsignedBigInteger('bill_id')->nullable();
            $table->foreign('bill_id')
            ->references('id')
            ->on('bills')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_details');
    }
};
