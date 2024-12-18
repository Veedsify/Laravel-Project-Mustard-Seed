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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
            $table->integer('amount');
            $table->string('name');
            $table->string('email');
            $table->string('company_email');
            $table->string('phone')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('payment_method');
            $table->string('status');
            $table->string('payment_id');
            $table->string('payment_status')->default("pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
