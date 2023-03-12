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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->unsignedBigInteger('id_desa');
            $table->date('tgl_pengaduan');
            $table->char('nik', 16);
            $table->char('judul_laporan');
            $table->text('isi_laporan');
            $table->string('foto');
            $table->string('lokasi');
            $table->enum('status', ['0', 'proses', 'selesai']);
            $table->unsignedBigInteger('id_kategori');

            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('masyarakat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
};
