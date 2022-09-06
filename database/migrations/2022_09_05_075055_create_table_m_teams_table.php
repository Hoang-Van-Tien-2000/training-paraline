<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_teams', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->integer('ins_id');
            $table->integer('upd_id')->nullable();
            $table->dateTime('ins_datetime');
            $table->dateTime('upd_datetime')->nullable();
            $table->char('del_flag', 1)->default('0')->comment('0/Active 1/Deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_teams');
    }
}