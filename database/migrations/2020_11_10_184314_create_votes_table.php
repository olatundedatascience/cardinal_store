<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//https://themewagon.com/theme-categories/admin-dashboard/
class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('date_casted')->default(now());
            $table->unsignedBigInteger('casted_for');
            $table->unsignedBigInteger('casted_position');
           // $table->primary('id');
            $table->unsignedBigInteger('casted_by');
            $table->unsignedBigInteger('sum_of_votes');
           // $table->foreign('casted_for')->references('sharesholders')->on('id');
           // $table->foreign('casted_by')->references('users')->on('id');
            //$table->foreign('casted_position')->references('positions')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
