<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
Schema::create('profil_masjid', function (Blueprint $table) {
    $table->id();
    $table->string('nama')->nullable();
    $table->string('alamat')->nullable();
    $table->text('about_text_1')->nullable();
    $table->text('about_text_2')->nullable();
    $table->text('visi')->nullable();
    $table->text('misi')->nullable();
    $table->string('about_image')->nullable();
    $table->integer('capacity')->nullable();
    $table->integer('year')->nullable();
    $table->string('routine_activities')->nullable();
    $table->string('public_info')->nullable();
    $table->string('whatsapp')->nullable();
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('masjid_profiles');
    }
};
