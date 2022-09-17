<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWajibPajaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wajib_pajak', function (Blueprint $table) {
            $table->string('no_pelayanan', 50)->primary();
            $table->string('nama_wp');
            $table->string('no_hp');
            $table->longText('alamat_pemohon');
            $table->longText('alamat_objek_pajak');
            $table->double('luas_tanah', 15, 8);
            $table->double('luas_bangunan', 15, 8);
            $table->unsignedBigInteger('id_pelayanan');
            $table->foreign('id_pelayanan')
                    ->references('id')->on('jenis_pelayanan')
                    ->onUpdate('no action')
                    ->onDelete('no action');
            $table->unsignedBigInteger('id_status')->default(1);
            $table->foreign('id_status')
                    ->references('id')->on('status_files')
                    ->onUpdate('no action')
                    ->onDelete('no action');        
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
        Schema::dropIfExists('wajib_pajaks');
    }
}