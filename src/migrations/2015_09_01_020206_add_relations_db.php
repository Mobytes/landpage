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
        Schema::table('publications',function(Blueprint $table){
            $table->foreign('type_publication_id')->references('id')->on('type_publications')->onDelete('cascade');
        });

        //media
        Schema::table('medias',function(Blueprint $table){
            $table->foreign('publication_id')->references('id')->on('publications')->onDelete('cascade');
            $table->foreign('type_media_id')->references('id')->on('type_medias')->onDelete('cascade');
        });

        //organizacion
        Schema::table('objectives',function(Blueprint $table){
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
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
        Schema::table('publications',function(Blueprint $table){
            $table->dropForeign('publications_type_publication_id');
        });

        //media
        Schema::table('medias',function(Blueprint $table){
            $table->dropForeign('medias_publication_id');
            $table->dropForeign('medias_type_media_id');
        });

        //organizacion
        Schema::table('objectives',function(Blueprint $table){
            $table->dropForeign('objectives_organization_id');
        });
	}

}
