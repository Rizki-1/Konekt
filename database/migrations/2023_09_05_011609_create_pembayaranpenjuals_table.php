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
        Schema::create('pembayaranpenjuals', function (Blueprint $table) {
            $table->id();
            $table->string('penjual_id');
            $table->enum('metodepembayaran', ['e-wallet','bank']);
            $table->string('tujuan');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaranpenjuals');
    }
};
