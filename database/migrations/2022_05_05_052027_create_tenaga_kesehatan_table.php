<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateTenagaKesehatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenaga_kesehatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profesi_id');
            $table->string('nama_pegawai',30);
            $table->enum('jenis_kelamin', array('Laki-Laki','Perempuan'));
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('spesialis')->nullable();
            $table->bigInteger('no_telp');
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
        Schema::dropIfExists('tenaga_kesehatan');
    }
}
