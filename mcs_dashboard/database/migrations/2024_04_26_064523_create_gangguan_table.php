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

            $table->unsignedBigInteger('data_mcs_id');
            $table->foreign('data_mcs_id')->references('id')->on('data_mcs')->onDelete('cascade');
            
            $table->bigInteger('no_mcs')->nullable();
            $table->string('pic');
            $table->bigInteger('no_hp_pic');
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
