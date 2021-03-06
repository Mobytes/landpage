<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePublication extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('publications', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('type_publication_id')->unsigned();
            $table->string('titulo');
            $table->string('subtitulo');
            $table->text('contenido');
            $table->string('tags');
            $table->string('url_file');
            $table->timestamps();
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('publications');
	}

}
