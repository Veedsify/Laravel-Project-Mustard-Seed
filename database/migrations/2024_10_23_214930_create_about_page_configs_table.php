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
        Schema::create('about_page_configs', function (Blueprint $table) {
            $table->id();
            $table->string('short_title')->nullable();
            $table->string('title')->nullable();
            $table->string('main_image')->nullable();
            $table->text('content')->nullable();
            $table->string('donation_title')->nullable();
            $table->text('donation_content')->nullable();
            $table->string('volunteer_title')->nullable();
            $table->text('volunteer_content')->nullable();
            $table->string('read_more_title')->nullable();
            $table->string('read_more_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_page_configs');
    }
};
