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
        Schema::create('volunteer_setting_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('volunteer_setting_id')->constrained()->onDelete('cascade');
            $table->longText('summary')->nullable();
            $table->string('name')->nullable();
            $table->integer('level')->default('1');
            $table->integer('max_level')->default('100');
            $table->string('experience')->nullable();
            $table->string('years')->nullable();
            $table->string('proficiency')->nullable();
            $table->string('interest')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_setting_skills');
    }
};
