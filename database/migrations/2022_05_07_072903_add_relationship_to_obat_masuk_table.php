<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToObatMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('obat_masuk', function (Blueprint $table) {
            $table->foreign('obat_id')->references('id')->on('obat')->cascadeOnDelete();
            $table->foreign('supplier_id')->references('id')->on('supplier')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('obat_masuk', function (Blueprint $table) {
            //
        });
    }
}
