<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_id')->nullable();
            $table->foreign('from_id')->references('id')->on('users');
            $table->unsignedBigInteger('departement_id')->nullable();
            $table->foreign('departement_id')->references('id')->on('departement');
            $table->unsignedBigInteger('norek_id')->nullable();
            $table->foreign('norek_id')->references('id')->on('norek');
            $table->unsignedBigInteger('rujukan_id')->nullable();
            $table->foreign('rujukan_id')->references('id')->on('rujukan');
            $table->unsignedBigInteger('kpengajuan_id')->nullable();
            $table->foreign('kpengajuan_id')->references('id')->on('kpengajuan');
            $table->unsignedBigInteger('keperluan_id')->nullable();
            $table->foreign('keperluan_id')->references('id')->on('keperluan');
            $table->string('no_rf')->nullable()->unique();
            $table->string('tanggal_kebutuhan');
            $table->string('payment');
            $table->string('description');
            $table->string('description2')->nullable();
            $table->string('description3')->nullable();
            $table->string('description4')->nullable();
            $table->string('description5')->nullable();
            $table->string('description6')->nullable();
            $table->string('description7')->nullable();
            $table->string('description8')->nullable();
            $table->string('unit');
            $table->string('unit2')->nullable();
            $table->string('unit3')->nullable();
            $table->string('unit4')->nullable();
            $table->string('unit5')->nullable();
            $table->string('unit6')->nullable();
            $table->string('unit7')->nullable();
            $table->string('unit8')->nullable();
            $table->string('qty');
            $table->string('qty2')->nullable();
            $table->string('qty3')->nullable();
            $table->string('qty4')->nullable();
            $table->string('qty5')->nullable();
            $table->string('qty6')->nullable();
            $table->string('qty7')->nullable();
            $table->string('qty8')->nullable();
            $table->string('price');
            $table->string('price2')->nullable();
            $table->string('price3')->nullable();
            $table->string('price4')->nullable();
            $table->string('price5')->nullable();
            $table->string('price6')->nullable();
            $table->string('price7')->nullable();
            $table->string('price8')->nullable();
            $table->string('total');
            $table->string('total2')->nullable();
            $table->string('total3')->nullable();
            $table->string('total4')->nullable();
            $table->string('total5')->nullable();
            $table->string('total6')->nullable();
            $table->string('total7')->nullable();
            $table->string('total8')->nullable();
            $table->string('file')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('image6')->nullable();
            $table->string('image7')->nullable();
            $table->string('image8')->nullable();
            $table->string('b_admin')->nullable();
            $table->string('jumlah_total');
            $table->string('status')->nullable();
            $table->unsignedBigInteger('checked_by')->nullable();
            $table->foreign('checked_by')->references('id')->on('users');
            $table->date('checked_date')->nullable();
            $table->unsignedBigInteger('approve_by')->nullable();
            $table->foreign('approve_by')->references('id')->on('users');
            $table->date('approve_date')->nullable();
            $table->string('jumlah_dana')->nullable();
            $table->date('tgl_terima_dana')->nullable();
            $table->string('jumlah_pemakaian')->nullable();
            $table->string('tgl_pengembalian')->nullable();
            $table->string('balance')->nullable();
            $table->string('tgl_pembayaran')->nullable();
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
        Schema::dropIfExists('form');
    }
}