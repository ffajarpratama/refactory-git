<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaMkuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_mkuliah', function (Blueprint $table) {
            $table->unsignedBigInteger('mahasiswa_id')->nullable();
            $table->unsignedBigInteger('mkuliah_id')->nullable();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreign('mkuliah_id')->references('id')->on('mkuliah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa_mkuliah');
    }
}
