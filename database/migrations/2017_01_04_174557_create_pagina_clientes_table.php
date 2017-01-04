<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginaClientesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagina_clientes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pagina_id')->unsigned();
            $table->foreign('pagina_id')->references('id')->on('paginas');
            $table->string('nome', 75);
            $table->string('imagem');
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
		Schema::drop('pagina_clientes');
	}

}
