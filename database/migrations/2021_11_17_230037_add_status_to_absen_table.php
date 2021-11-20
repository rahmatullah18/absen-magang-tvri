<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToAbsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absen', function (Blueprint $table) {
            $table->enum('status', ['Hadir', 'Izin', 'Sakit', 'Terlambat', 'Belum Dikonfirmasi'])->default('Belum Dikonfirmasi');
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
}
