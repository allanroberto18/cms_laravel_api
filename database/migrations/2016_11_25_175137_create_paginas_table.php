<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paginas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo')->default(1);
            $table->string('retranca', 50)->nullable();
            $table->string('titulo', 150);
            $table->string('slug', 150);
            $table->string('resumo', 300);
            $table->text('texto');
            $table->string('credito', 75)->default('Divulgação');
            $table->string('imagem', 255);
            $table->string('legenda', 150);
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
		Schema::drop('paginas');
	}

}
