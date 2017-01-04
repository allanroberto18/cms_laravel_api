<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaleConoscosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fale_conoscos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('assunto');
            $table->string('nome');
            $table->string('telefone');
            $table->string('email');
            $table->text('mensagem');
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
		Schema::drop('fale_conoscos');
	}

}
