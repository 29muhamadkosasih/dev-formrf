<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportpph23Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportpph23', function (Blueprint $table) {
            $table->id();
            $table->string('client');
            $table->string('no_invoice');
            $table->string('bruto');
            $table->string('payment_in');
            $table->date('paid_date');
            $table->string('pph23');
            $table->string('npwp');
            $table->string('masa_pajak');
            $table->string('no_bukpot');
            $table->date('tgl_pemotongan');
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
        Schema::dropIfExists('reportpph23');
    }
}