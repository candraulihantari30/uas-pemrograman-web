<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempekansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempekans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anggota');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('periode');
            $table->string('nam_tem');
            $table->string('tem_bag');
            $table->string('ket');
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
        Schema::dropIfExists('tempekans');
    }
}
