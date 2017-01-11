<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('videos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('video_categoria_id')->unsigned();
            $table->foreign('video_categoria_id')->references('id')->on('video_categorias');
            $table->string('titulo', 255);
            $table->string('slug', 255);
            $table->text('resumo')->nullable();
            $table->string('link', 255);
            $table->integer('largura')->default(1280);
            $table->integer('altura')->default(720);
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
		Schema::drop('videos');
	}

}
