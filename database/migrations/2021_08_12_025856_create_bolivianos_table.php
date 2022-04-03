<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBolivianosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bolivianos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('arqueo_id');
            $table->double('docientos');
            $table->double('cien');
            $table->double('cincuenta');
            $table->double('veinte');
            $table->double('diez');
            $table->double('cinco');
            $table->double('dos');
            $table->double('uno');
            $table->double('cincuentacent');
            $table->double('veintecent');
            $table->double('diezcent');
            $table->double('totalbs');

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
        Schema::dropIfExists('bolivianos');
    }
}
