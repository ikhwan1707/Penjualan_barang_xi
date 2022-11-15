<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pelanggans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_pelanggan', 100);
            $table->string('jenkel_pelanggan', 15);
            $table->string('no_hp_pelanggan', 15);
            $table->string('email_pelanggan', 50);
            $table->text('alamat_pelanggan');
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
        Schema::dropIfExists('tb_pelanggans');
    }
}
