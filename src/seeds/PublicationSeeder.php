<?php

class PublicationSeeder extends Seeder
{

    public function run()
    {

        $type_pub = Mobytes\Landpage\TypePublication\Repo\TypePublication::create(
            array(
                'description' => 'Noticias',
            )
        );

        Mobytes\Landpage\TypePublication\Repo\TypePublication::create(
            array(
                'description' => 'Publicaciones',
            )
        );

        Mobytes\Landpage\TypePublication\Repo\TypePublication::create(
            array(
                'description' => 'Proyectos',
            )
        );

        $type_media = Mobytes\Landpage\TypeMedia\Repo\TypeMedia::create(
            array(
                'description' => 'fotos',
            )
        );

        Mobytes\Landpage\TypeMedia\Repo\TypeMedia::create(
            array(
                'description' => 'video',
            )
        );

        //
        $org = Mobytes\Landpage\Organization\Repo\Organization::create(
            array(
                'nombre'=>'Cepco',
                'ruc'=>'34353535345',
                'direccion'=>'jr jr jr.',
                'vision'=>'vision',
                'mision'=>'mision',
            )
        );

        Mobytes\Landpage\ObjectiveRepository\Repo\Objective::create(
            array(
                'organization_id' => $org->id,
                'description' => 'objetivo1',
            )
        );

        Mobytes\Landpage\ObjectiveRepository\Repo\Objective::create(
            array(
                'organization_id' => $org->id,
                'description' => 'objetivo2',
            )
        );
        //

        foreach (range(1, 10) as $i) {
            $pub = Mobytes\Landpage\Publication\Repo\Publication::create(
                array(
                    'type_publication_id' => $type_pub->id,
                    'titulo' => 'titulo',
                    'subtitulo' => 'subtitulo',
                    'contenido' => 'contenido',
                    'tags' => 'tags',
                    'url_file' => 'http://lorempixel.com/200/200/business/'.$i.'/',
                )
            );

            foreach (range(1, 5) as $index) {
                Mobytes\Landpage\Media\Repo\Media::create(
                    array(
                        'publication_id'=>$pub->id,
                        'type_media_id'=>$type_media->id,
                        'description'=>'media '.$i,
                        'url_media'=>'http://lorempixel.com/400/200/nature/'.$i.'/',
                        'flag_main'=> 0,
                    )
                );
            }
        }
    }

}