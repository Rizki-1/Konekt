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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('toko_id');
            $table->unsignedBigInteger('barangpenjual_id');
            $table->integer('jumlah');
            $table->integer('totalHarga')->nullable();
            $table->timestamps();

            $table->foreign('barangpenjual_id')->references('id')->on('barangpenjuals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
