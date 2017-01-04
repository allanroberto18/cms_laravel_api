<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginaSegmentoCaracteristicasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagina_segmento_caracteristicas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pagina_segmento_id')->unsigned();
            $table->foreign('pagina_segmento_id')->references('id')->on('pagina_segmentos');
            $table->string('icone');
            $table->string('titulo', 50);
            $table->string('descricao', 130);
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
		Schema::drop('pagina_segmento_caracteristicas');
	}

}
