<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersetujuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persetujuan', function (Blueprint $table) {
            $table->unsignedBiginteger('user_id')->unsigned();
            $table->unsignedBiginteger('penyewaan_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('penyewaan_id')->references('id')->on('penyewaan');

            $table->date('tanggal_buat')->nullable();
            $table->date('tanggal_setuju')->nullable();
            $table->tinyInteger('status')->default(0);

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
        Schema::dropIfExists('persetujuan');
    }
}
