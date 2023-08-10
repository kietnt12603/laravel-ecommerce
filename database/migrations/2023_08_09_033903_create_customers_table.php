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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('user')->unique()->nullable();
            $table->string('pass')->nullable();
            $table->string('name')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('address')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('code')->nullable();
            $table->boolean('verify')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
