<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama');
            $table->char('nik');
            $table->char('no_kk');
            $table->char('nik_adat');
            $table->string('tempat');
            $table->date('tanggal_lahir');
            $table->string('id_jk');
            $table->string('status_kk');
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->string('nam_tem');
            $table->string('tem_bag');
            $table->string('foto');
            $table->string('keterangan');
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
        Schema::dropIfExists('keluargas');
    }
}
