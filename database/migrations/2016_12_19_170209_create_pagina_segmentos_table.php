<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginaSegmentosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagina_segmentos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pagina_id')->unsigned();
            $table->foreign('pagina_id')->references('id')->on('paginas');
            $table->string('titulo', 150);
            $table->string('slug', 150);
            $table->text('texto');
            $table->string('credito', 75)->default('Divulgação');
            $table->string('legenda', 150);
            $table->string('imagem_capa', 255);
            $table->string('imagem_pagina', 255);
            $table->integer('status')->default(1);
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
		Schema::drop('pagina_segmentos');
	}

}
