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
        Schema::create('gangguan', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_data_mcs');
            $table->foreign('id_data_mcs')->references('id')->on('data_mcs')->onDelete('cascade');
            
            $table->integer('no_mcs');
            $table->string('pic');
            $table->integer('no_hp_pic');
            $table->string('ket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gangguan');
    }
};
