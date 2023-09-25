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
            $table->foreignId('penjual_id')->constrained('penjuallogins')->onUpdate('cascade');
            $table->foreignId('barangpenjual_id')->constrained('barangpenjuals')->onUpdate('cascade');
            $table->foreignId('metodepembayaran_id')->constrained('pembayaranpenjuals')->onUpdate('cascade');
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