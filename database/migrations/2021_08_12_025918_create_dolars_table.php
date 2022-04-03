<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDolarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dolars', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('arqueo_id');
            $table->double('ciend');
            $table->double('cincuentad');
            $table->double('viented');
            $table->double('diezd');
            $table->double('cincod');
            $table->double('dosd');
            $table->double('unod');
            $table->double('totald');

            $table->timestamps();

            //relation
            $table->foreign('arqueo_id')->references('id')->on('arqueos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dolars');
    }
}
