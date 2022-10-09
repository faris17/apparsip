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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->text('maksud_tujuan');
            $table->string('tempat');
            $table->string('tanggal_perjalan');
            $table->string('tanggal_surat_tugas');
            $table->foreignId('nama_persetujuan')->nullable()->constrained("pegawais")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('persetujuan_id')->nullable()->constrained("persetujuans")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('template_id')->nullable()->constrained("templates")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('pegawai_id')->nullable()->constrained("pegawais")->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('transaksis');
    }
};
