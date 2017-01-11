<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoCategoriasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('video_categorias', function(Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('slug');
            $table->text('resumo')->nullable();
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
		Schema::drop('video_categorias');
	}

}
