<?php namespace Mobytes\Landpage;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Eloquent::unguard();
        //$this->call('OrganizationSeeder');
        $this->call('PublicationSeeder');
    }

}
