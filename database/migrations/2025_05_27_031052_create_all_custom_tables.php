<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jenis_akun', function (Blueprint $table) {
            $table->id();
            $table->string('jenisAkun', 100);
        });

        Schema::create('akun', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100);
            $table->string('password', 100);
            $table->string('namaPengguna', 100);
            $table->text('fotoProfil');
            $table->string('nomorTelepon', 100);
            $table->foreignId('jenis_akun_id')->constrained('jenis_akun');
        });

        Schema::create('akun_komunitas', function (Blueprint $table) {
            $table->foreignId('akun_id')->constrained('akun');
            $table->text('portofolio');
        });

        Schema::create('campaign', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akun_id')->constrained('akun');
            $table->string('nama', 100);
            $table->dateTime('waktu');
            $table->dateTime('waktu_diperbarui');
            $table->text('deskripsi');
            $table->string('lokasi', 100);
            $table->string('kontak', 100);
            $table->integer('kuota_partisipan');
        });

        Schema::create('campaign_ditandai', function (Blueprint $table) {
            $table->foreignId('akun_id')->constrained('akun');
            $table->foreignId('campaign_id')->constrained('campaign');
        });

        Schema::create('gambar_campaign', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained('campaign');
            $table->text('gambar');
            $table->boolean('isCover')->default(false);
        });

        Schema::create('komentar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akun_id')->constrained('akun');
            $table->foreignId('campaign_id')->constrained('campaign');
            $table->string('komentar', 280);
            $table->dateTime('waktu');
        });

        Schema::create('komentar_disukai', function (Blueprint $table) {
            $table->foreignId('komentar_id')->constrained('komentar');
            $table->foreignId('akun_id')->constrained('akun');
        });

        Schema::create('partisipan_campaign', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akun_id')->constrained('akun');
            $table->foreignId('campaign_id')->constrained('campaign');
            $table->string('nama', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('nomorTelepon', 100)->nullable();
            $table->string('ktp', 100)->nullable();
        });

        Schema::create('session', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akun_id')->constrained('akun');
            $table->dateTime('waktu');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('session');
        Schema::dropIfExists('partisipan_campaign');
        Schema::dropIfExists('komentar_disukai');
        Schema::dropIfExists('komentar');
        Schema::dropIfExists('gambar_campaign');
        Schema::dropIfExists('campaign_ditandai');
        Schema::dropIfExists('campaign');
        Schema::dropIfExists('akun_komunitas');
        Schema::dropIfExists('akun');
        Schema::dropIfExists('jenis_akun');
    }
};
