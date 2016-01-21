<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTambayPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tambay_points', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('duration');
            $table->integer('point');
            $table->integer('member_id')->unsigned();
            $table->foreign('member_id')
                  ->references('id')->on('members')
                  ->onDelete('cascade');
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
        Schema::drop('tambay_points');
    }
}
