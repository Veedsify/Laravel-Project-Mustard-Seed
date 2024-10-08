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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->index();
            $table->string('username')->nullable()->unique();
            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();
            $table->string('role')->default('user');
            $table->longText('bio')->nullable();
            $table->string('location')->nullable();
            $table->string('password');
            $table->string('google_id')->nullable();
            $table->string('verification_token')->nullable();
            $table->boolean('admin_approved')->default(false);
            $table->text("password_reset_token")->nullable();
            $table->timestamp('email_verified_at')->nullable();
            // Relations between Admin, Donators, volunteers and userr
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('donator_id')->nullable();
            $table->unsignedBigInteger('volunteer_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
