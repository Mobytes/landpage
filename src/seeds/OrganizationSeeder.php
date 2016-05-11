<?php

use Faker\Factory as Faker;
use Mobytes\Landpage\Objective\Repo\Objective;
use Mobytes\Landpage\Organization\Repo\Organization;
use Mobytes\Landpage\TypeMedia\Repo\TypeMedia;
use Mobytes\Landpage\TypePublication\Repo\TypePublication;

class OrganizationSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

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
        //

    }

}