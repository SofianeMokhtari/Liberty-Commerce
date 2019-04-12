<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePanierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panier', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_produit')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->integer('nombre');
            $table->integer('prix');
            $table->integer('choice')->default('1');
            $table->timestamps();
        });



        Schema::table('panier', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });
        Schema::table('panier', function (Blueprint $table) {
            $table->foreign('id_produit')->references('id')->on('produit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panier');
    }
}
