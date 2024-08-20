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
        Schema::create('tentang_kami', function (Blueprint $table) {
            $table->bigIncrements('id_tentang_kami');
            $table->text('profil');
            $table->string('visi');
            $table->string('misi');
            $table->text('alamat');
            $table->string('email');
            $table->text('telepon');
            $table->text('maps');
            $table->text('jam_buka_1');
            $table->text('jam_buka_2');
            $table->text('foto');
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
        //
    }
};
