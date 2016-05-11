<?php

use Faker\Factory as Faker;
use Mobytes\Landpage\Media\Repo\Media;
use Mobytes\Landpage\Publication\Repo\Publication;
use Mobytes\Landpage\Objective\Repo\Objective;
use Mobytes\Landpage\Organization\Repo\Organization;
use Mobytes\Landpage\TypeMedia\Repo\TypeMedia;
use Mobytes\Landpage\TypePublication\Repo\TypePublication;

class PublicationSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

    //region ORGANIZATION
        $type_pub =TypePublication::create(
            array(
                'description' => 'Noticias',
            )
        );

        TypePublication::create(
            array(
                'description' => 'Publicaciones',
            )
        );

        TypePublication::create(
            array(
                'description' => 'Proyectos',
            )
        );

        TypeMedia::create(
            array(
                'description' => 'fotos',
            )
        );

        TypeMedia::create(
            array(
                'description' => 'video',
            )
        );

        //
        $org = Organization::create(
            array(
                'nombre'=>'Cepco',
                'ruc'=>'34353535345',
                'direccion'=>$faker->streetAddress,
                'telefono'=>"042 534253",
                'vision'=>$faker->text(100),
                'mision'=>$faker->text(80),
            )
        );

        Objective::create(
            array(
                'organization_id' => $org->id,
                'description' => $faker->text(50),
            )
        );

        Objective::create(
            array(
                'organization_id' => $org->id,
                'description' => $faker->text(50),
            )
        );
    //endregion

        foreach (range(1, 500) as $i) {
            $pub = Publication::create(
                array(
                    'type_publication_id' => $faker->numberBetween(1, 3),
                    'titulo' => $faker->text(20),
                    'subtitulo' => $faker->text(15),
                    'contenido' => $faker->text(200),
                    'tags' => 'tags',
                    'url_file' => 'http://lorempixel.com/200/200/business/'.$faker->numberBetween(1, 10).'/',
                )
            );

            foreach (range(1, $faker->numberBetween(1, 5)) as $index) {
                Media::create(
                    array(
                        'publication_id'=>$pub->id,
                        'type_media_id'=>$faker->numberBetween(1, 2),
                        'description'=>$faker->text(100),
                        'url_media'=>'http://lorempixel.com/400/200/nature/'.$faker->numberBetween(1, 10).'/',
                        'flag_main'=> 0,
                    )
                );
            }
        }
    }

}