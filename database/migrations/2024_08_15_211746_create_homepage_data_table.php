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
        Schema::create('homepage_data', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->longText('footer_text');
            $table->string('home_banner_intro');
            $table->string('home_banner_title');
            $table->string('home_banner_description');
            $table->text('home_banner_image');
            $table->boolean('show_banner_experience');
            $table->string('banner_experience_title_1');
            $table->text('banner_experience_desc_1');
            $table->string('banner_experience_title_2');
            $table->text('banner_experience_desc_2');
            $table->string('banner_experience_title_3');
            $table->text('banner_experience_desc_3');
            $table->boolean('show_feature_section');
            $table->boolean('show_event_section');
            $table->boolean('show_upcoming_event_section');
            $table->boolean('show_blog_section');
            $table->boolean('show_testimonial_section');
            $table->boolean('show_faq_section');
            $table->boolean('show_gallery_section');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_data');
    }
};
