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
        Schema::create('pengajuandanapenjuals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penjual_id')->constrained('penjuallogins')->onUpdate('cascade')->nullable();
            $table->foreignId('userOrder_id')->constrained('user_Orders')->onUpdate('cascade');
            $table->foreignId('metodepembayaran_id')->constrained('pembayaranpenjuals')->onUpdate('cascade')->nullable();
            $table->string('keterangan_pengajuan')->nullable();
            $table->string('tujuan_pengajuan')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuandanapenjuals');
    }
};

