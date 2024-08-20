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
        Schema::create('buku', function (Blueprint $table) {
            $table->bigIncrements('id_buku');
            $table->text('kode_buku');
            $table->string('nama_buku');
            $table->string('penerbit')->nullable();
            $table->integer('rak')->nullable();
            $table->integer('stok_buku')->nullable();
            $table->text('foto_buku')->nullable();
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
        Schema::dropIfExists('buku');
    }
};
