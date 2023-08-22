<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form', function (Blueprint $table) {
            $table->string('j_assist')->nullable()->after('tanggal_kebutuhan');
            $table->string('j_traine_asesor')->nullable()->after('tanggal_kebutuhan');
            $table->string('j_peserta')->nullable()->after('tanggal_kebutuhan');
            $table->string('no_project')->nullable()->after('tanggal_kebutuhan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form', function (Blueprint $table) {
            //
        });
    }
}