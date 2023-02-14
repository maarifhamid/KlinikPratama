<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kk', 30);
            $table->string('alamat',50);
            $table->string('rt_rw',30);
            $table->string('kelurahan',30);
            $table->string('nama_pasien',30);
            $table->bigInteger('no_identitas');
            $table->string('tempat_lahir',30);
            $table->date('tanggal_lahir');
            $table->integer('umur');
            $table->enum('jenis_kelamin', ['Laki-Laki','Perempuan']);
            $table->string('agama',10);
            $table->string('no_telp');
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
        Schema::dropIfExists('pasien');
    }
}
