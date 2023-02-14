<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ObatMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat_masuk', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk');
            $table->foreignId('supplier_id');
            $table->foreignId('obat_id');
            $table->string('keterangan');
            $table->integer('jumlah_masuk');
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
        Schema::dropIfExists('obat_masuk');
    }
}
