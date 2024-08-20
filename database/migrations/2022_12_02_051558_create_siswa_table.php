<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->bigIncrements('id_siswa');
            $table->text('nis')->nullable();
            $table->string('barcode')->nullable();
            $table->string('nama_siswa')->nullable();
            $table->enum('jenis_kelamin', ['p', 'l'])->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->text('kelas')->nullable();
            $table->text('foto')->nullable();
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
        Schema::dropIfExists('siswa');
    }
};
