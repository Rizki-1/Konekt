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
        Schema::create('user_Orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barangpenjual_id')->constrained()->onUpdate('cascade');
            $table->string('toko_id');
            $table->string('user_id');
            $table->integer('jumlah');
            $table->string('foto')->nullable();
            $table->string('catatan')->nullable();
            $table->string('metodepembayaran');
            $table->string('totalharga');
            $table->string('adminstatus');
            $table->string('pembelianstatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userOrders');
    }
};
