<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPenyewaanIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        // Schema::table('persetujuan', function (Blueprint $table) {
        //     $table->unsignedBigInteger('penyewaan_id')->nullable();
        //     $table->foreign('penyewaan_id')->references('id')->on('penyewaan');
        // });
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
}
