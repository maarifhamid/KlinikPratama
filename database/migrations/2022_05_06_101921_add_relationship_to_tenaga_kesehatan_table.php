<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToTenagaKesehatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenaga_kesehatan', function (Blueprint $table) {
            $table->foreign('profesi_id')->references('id')->on('profesi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tenaga_kesehatan', function (Blueprint $table) {
            $table->dropForeign('profesi_id');
        });
    }
}
