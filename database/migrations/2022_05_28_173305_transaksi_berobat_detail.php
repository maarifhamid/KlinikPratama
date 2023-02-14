<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiBerobatDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_berobat_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_berobat_id');
            $table->foreignId('lab_id');
            $table->bigInteger('harga');
            $table->bigInteger('jumlah');
            $table->bigInteger('sub_total');
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
        Schema::dropIfExists('transaksi_berobat_detail');
    }
}
