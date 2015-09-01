<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrganization extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('organizations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('nombre');
            $table->string('ruc');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('vision');
            $table->string('mision');
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
		Schema::drop('organizations');
	}

}
