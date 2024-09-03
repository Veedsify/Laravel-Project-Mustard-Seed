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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->integer('quantity');
            $table->string('unit');
            $table->string('category');
            $table->string('image')->nullable();
            $table->boolean('condition')->default(0);
            $table->boolean('status')->default(0);
            $table->boolean('is_anonymous')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('volunteer_id')->references('id')->on('users')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
