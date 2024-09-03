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
        Schema::create('volunteer_setting_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('volunteer_setting_id')->constrained()->onDelete('cascade');
            $table->longText('summary')->nullable();
            $table->string('school')->nullable();
            $table->string('degree')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('grade')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_setting_education');
    }
};
