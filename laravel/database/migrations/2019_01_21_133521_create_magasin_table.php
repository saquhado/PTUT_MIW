<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagasinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magasin', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('idMag')->autoIncrement();
            $table->string('nomMag');
            $table->string('adresseMag');
            $table->string('telMag');
            $table->string('mailMag');
            $table->string('SIRET');
            $table->string('photoInt');
            $table->string('photoExt');
            $table->float('latMag');
            $table->float('longMag');
            $table->string('INSEE');
            $table->string('CP');
            $table->integer('numType');
            $table->integer('numCat')->nullable($value = true);
            $table->integer('numResp');
            $table->foreign('numResp')->references('numResp')->on('responsable');
            $table->foreign('numType')->references('numType')->on('type');
            $table->foreign('numCat')->references('numCat')->on('categorie');
            $table->foreign(['INSEE', 'CP'])->references(['INSEE', 'CP'])->on('ville');
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
        Schema::dropIfExists('magasin');
    }
}
