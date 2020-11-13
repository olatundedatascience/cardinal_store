<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_candidates', function (Blueprint $table) {
            $table->id();
            $table->integer('shareholder_id');
            $table->integer('positions_id');
           // $table->foreign('shareholder_id')->references('shareholders')->on('id');
            //$table->foreign('positions_id')->references('positions')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_candidates');
    }
}
