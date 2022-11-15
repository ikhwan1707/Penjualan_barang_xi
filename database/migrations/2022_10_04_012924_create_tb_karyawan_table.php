<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_karyawans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_karyawan', 100);
            $table->string('jenkel_karyawan', 15);
            $table->string('no_hp_karyawan', 15);
            $table->string('email_karyawan', 50);
            $table->text('alamat_karyawan');
            $table->string('password');
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
        Schema::dropIfExists('tb_karyawans');
    }
}
