<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvisTableForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('avis', function (Blueprint $table) {
            $table->integer('numPromo')->after('commentaire');
            $table->integer('numInt')->after('numPromo');
            $table->foreign(['numPromo', 'numInt'])->references(['numPromo', 'numInt'])->on('adhesion');
        });
    }
}
