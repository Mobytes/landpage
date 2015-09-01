<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationsDb extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        //publication
        Schema::table('publication',function(Blueprint $table){
            $table->foreign('type_publication_id')->references('id')->on('type_publication')->onDelete('cascade');
        });

        //media
        Schema::table('media',function(Blueprint $table){
            $table->foreign('publication_id')->references('id')->on('publication')->onDelete('cascade');
            $table->foreign('type_media_id')->references('id')->on('type_media')->onDelete('cascade');
        });

        //objectives
        Schema::table('objectives',function(Blueprint $table){
            $table->foreign('organization_id')->references('id')->on('organization')->onDelete('cascade');
        });
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        //publication
        Schema::table('publication',function(Blueprint $table){
            $table->dropForeign('publication_type_publication_id');
        });

        //media
        Schema::table('media',function(Blueprint $table){
            $table->dropForeign('media_publication_id');
            $table->dropForeign('media_type_media_id');
        });

        //objectives
        Schema::table('objectives',function(Blueprint $table){
            $table->dropForeign('objectives_organization_id');
        });
	}

}
