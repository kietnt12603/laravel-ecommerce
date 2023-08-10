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
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable(); // Đảm bảo cột product_id có thể là NULL
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('SET NULL');
            $table->unsignedBigInteger('attr_id')->nullable();
            $table->foreign('attr_id')->references('id')->on('attributes')->onUpdate('RESTRICT')->onDelete('SET NULL');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attributes');
    }
};
