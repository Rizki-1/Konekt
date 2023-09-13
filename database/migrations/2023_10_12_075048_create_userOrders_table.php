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
            $table->foreignId('namamenu_id')->references('id')->on('barangpenjuals')->cascadeOnDelet();
            $table->integer('jumlah');
            $table->string('foto')->nullable();
            $table->text('catatan')->nullable();
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
