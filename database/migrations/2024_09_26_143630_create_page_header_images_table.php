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
        Schema::create('page_header_images', function (Blueprint $table) {
            $table->id();
            $table->string('home_page_header_image')->nullable();
            $table->string('about_page_header_image')->nullable();
            $table->string('campaigns_page_header_image')->nullable();
            $table->string('donations_page_header_image')->nullable();
            $table->string('blogs_page_header_image')->nullable();
            $table->string('volunteers_page_header_image')->nullable();
            $table->string('faq_page_header_image')->nullable();
            $table->string('privacy_page_header_image')->nullable();
            $table->string('terms_page_header_image')->nullable();
            $table->string('contact_page_header_image')->nullable();
            $table->string('jobs_page_header_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_header_images');
    }
};
