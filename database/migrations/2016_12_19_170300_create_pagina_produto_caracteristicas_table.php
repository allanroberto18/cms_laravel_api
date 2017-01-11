<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginaProdutoCaracteristicasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagina_produto_caracteristicas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pagina_produto_id')->unsigned();
            $table->foreign('pagina_produto_id')->references('id')->on('pagina_produtos');
            $table->string('icone');
            $table->string('titulo', 50);
            $table->string('descricao', 130);
            $table->integer('posicao')->default(1);
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
		Schema::drop('pagina_produto_caracteristicas');
	}

}
