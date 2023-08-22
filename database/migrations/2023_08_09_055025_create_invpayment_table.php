<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvpaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invpayment', function (Blueprint $table) {
            $table->id();
            $table->string('no_project');
            $table->string('pic_client');
            $table->string('no_invoice');
            $table->string('no_po');
            $table->string('date_invoice');
            $table->string('amount_invoice');
            $table->string('payment_in');
            $table->date('due_date');
            $table->date('paid_date');
            $table->string('deduction');
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
        Schema::dropIfExists('invpayment');
    }
}
