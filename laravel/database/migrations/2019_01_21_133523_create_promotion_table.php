<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('numPromo')->autoIncrement();
            $table->string('libellePromo');
            $table->string('description');
            $table->dateTime('dateDebPromo');
            $table->dateTime('dateFinPromo');
            $table->boolean('estActif');
            $table->string('photo1');
            $table->string('photo2');
            $table->string('photo3');
            $table->integer('codePromo');
            $table->integer('codeAvis');
            $table->integer('idMag');
            $table->foreign('idMag')->references('idMag')->on('magasin');
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
        Schema::dropIfExists('promotion');
    }
}
