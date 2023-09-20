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
        Schema::create('pengemmbaliandanas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengembalian_id')->constrained('user_Orders');
            $table->string('user_id');
            $table->string('pengembalian_status');
            $table->string('foto_pengembalian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengemmbaliandanas');
    }
};
