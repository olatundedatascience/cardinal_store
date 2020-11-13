<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->dateTime('date_casted')->default(now());
            $table->unsignedBigInteger('casted_for');
            $table->unsignedBigInteger('casted_position');
           // $table->primary('id');
            $table->unsignedBigInteger('casted_by');
            $table->unsignedBigInteger('sum_of_votes');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votes', function (Blueprint $table) {
            //
        });
    }
}
