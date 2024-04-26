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
        Schema::create('data_mcs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('no_mcs');
            $table->string('nama');
            $table->string('satuan');
            $table->string('kategori');
            $table->date('tgl_aktif');
            $table->string('paket_data');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_mcs');
    }
};
