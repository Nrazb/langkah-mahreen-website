<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bidang', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();
            $t->string('nama');
            $t->text('ringkas');
            $t->text('alasan');
            $t->timestamps();
        });
        Schema::create('simpul', function (Blueprint $t) {
            $t->id();
            $t->text('teks');
            $t->boolean('is_start')->default(false);
            $t->timestamps();
        });
        Schema::create('pilihan', function (Blueprint $t) {
            $t->id();
            $t->foreignId('simpul_id')->constrained('simpul')->cascadeOnDelete();
            $t->string('label');
            $t->unsignedBigInteger('next_simpul_id')->nullable();
            $t->json('skor')->nullable();
            $t->timestamps();
        });
        Schema::create('program', function (Blueprint $t) {
            $t->id();
            $t->foreignId('bidang_id')->constrained('bidang')->cascadeOnDelete();
            $t->string('judul');
            $t->text('keterangan')->nullable();
            $t->date('mulai');
            $t->date('selesai')->nullable();
            $t->boolean('is_contoh')->default(true);
            $t->timestamps();
        });
    }

    public function down(): void
    {
        foreach (['program', 'pilihan', 'simpul', 'bidang'] as $n) {
            Schema::dropIfExists($n);
        }
    }
};
