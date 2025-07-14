<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
        */
        public function up()
    {
        Schema::create('jurnal_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('tempat');
            $table->date('tanggal');
            $table->time('mulai_pukul');
            $table->time('selesai_pukul');
            $table->text('kegiatan');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_kegiatans');
    }
};
