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
        Schema::create('notifikasipenjuals', function (Blueprint $table) {
            $table->id();
            $table->string('toko_id_notifikasi');
            $table->string('keterangan_penjual');
            $table->string('isi_penjual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasipenjuals');
    }
};
