<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMedia extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('medias', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('publication_id')->unsigned();
            $table->integer('type_media_id')->unsigned();
            $table->string('description');
            $table->string('url_media');
            $table->integer('flag_main');
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
		Schema::drop('medias');
	}

}
