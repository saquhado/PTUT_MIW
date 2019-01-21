<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdhesionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adhesion', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('numPromo');
            $table->integer('numInt');
            $table->integer('idAvis');
            $table->primary(['numPromo', 'numInt']);
            $table->foreign('numPromo')->references('numPromo')->on('promotion');
            $table->foreign('numInt')->references('numInt')->on('internaute');
            $table->foreign('idAvis')->references('idAvis')->on('avis');
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
        Schema::dropIfExists('adhesion');
    }
}
