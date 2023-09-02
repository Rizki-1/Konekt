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
        Schema::create('dashboardusercontrollers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('namamenu')->references('id')->on('penjuals')->cascadeOnDelete();
            $table->string('quantity');
            $table->string('fotobukti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboardusercontrollers');
    }
};
