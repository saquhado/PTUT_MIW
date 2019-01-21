<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternauteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internaute', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('numInt')->autoIncrement();
            $table->string('nomInt');
            $table->string('prenomInt');
            $table->string('telInt');
            $table->string('mailInt');
            $table->string('passwordInt');
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
        Schema::dropIfExists('internaute');
    }
}
