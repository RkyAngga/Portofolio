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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('full_name');
            $table->string('headline');
            $table->text('bio_short')->nullable();
            $table->longText('about_me')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('resume_url')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
