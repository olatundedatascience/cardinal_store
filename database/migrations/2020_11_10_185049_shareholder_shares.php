<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShareholderShares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shareholder_shares', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('units');
            $table->unsignedBigInteger('shares_id');
            $table->unsignedBigInteger('shareholder_id');
            $table->foreign('shareholder_id')->references('shareholders')->on('id');
            $table->foreign('shares_id')->references('shares')->on('id');
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
