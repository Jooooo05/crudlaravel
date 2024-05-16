<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kel');
            $table->string('nama_kelurahan');
            $table->bigInteger('id_kecamatan')->unsigned(); // Menjadi unsigned agar sesuai dengan id pada table kecamatan
            $table->foreign('id_kecamatan')->references('id')->on('kecamatans')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('active')->default(false);
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelurahan');
    }
};
