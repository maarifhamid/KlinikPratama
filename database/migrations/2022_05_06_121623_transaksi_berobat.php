<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiBerobat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_berobat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->nullable();
            $table->foreignId('rekam_medis_id')->nullable();
            $table->bigInteger('total_item');
            $table->bigInteger('total_harga');
            $table->bigInteger('bayar');
            $table->bigInteger('diterima');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_berobat');
    }
}
