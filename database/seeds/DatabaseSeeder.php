<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('EventsTableSeeder');
    }
}

class EventsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('events')->delete();

        DB::table('events')->insert(array(
            'artiest' => 'Arrow Smith',
            'naam' => 'Rocked Up',
            'begintijd' => '2015-03-01 22:00:00',
            'eindtijd' => '2015-03-02 03:00:00',
            'aantalkaarten' => 150,
            'prijs' => 25.75,
        ));

        DB::table('events')->insert(array(
            'artiest' => 'Snoop Dogg',
            'naam' => '#420',
            'begintijd' => '2015-03-03 13:00:00',
            'eindtijd' => '2015-03-05 14:00:00',
            'aantalkaarten' => 150,
            'prijs' => 89.90,
        ));
    }

}
