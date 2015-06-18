<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

        $this->call('EventTableSeeder');
        $this->call('TicketTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('MaintenanceTableSeeder');
        $this->call('Maintenance_PlannerTableSeeder');
    }
}

class EventTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('events')->delete();

        DB::table('events')->insert(array(
            'id' => 13,
            'artiest' => 'Arrow Smith',
            'naam' => 'Rocked Up',
            'begintijd' => '2015-03-01 22:00:00',
            'eindtijd' => '2015-03-02 03:00:00',
            'zaal' => 'Up and away & Down to the road of fear',
            'zaalid' => 1,
            'speciaalevenement' => 0,
            'aantalkaarten' => 150,
        ));

        DB::table('events')->insert(array(
            'id' => 14,
            'artiest' => 'Snoop Dogg',
            'naam' => '#420',
            'begintijd' => '2015-03-03 13:00:00',
            'eindtijd' => '2015-03-05 14:00:00',
            'zaal' => 'Space down',
            'zaalid' => 2,
            'speciaalevenement' => 0,
            'aantalkaarten' => 150,
        ));
    }
}

class TicketTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tickets')->delete();

        $count = 0;
        while ($count != 7) {

            DB::table('tickets')->insert(array(
                'klantid' => 0,
                'eventid' => 13,
                'prijs' => 89.75,
                'ticket_number' => Str::random(15),
            ));
            $count++;
        }
        $count2 = 0;
        while ($count2 != 15) {

            DB::table('tickets')->insert(array(
                'klantid' => 0,
                'eventid' => 14,
                'prijs' => 25.75,
                'ticket_number' => Str::random(15),
            ));
            $count2++;
        }
    }
}

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(array(
            'name' => 'Alex Brasser',
            'username' => 'AlexStorm13',
            'email' => 'alexbrasser@gmail.com',
            'password' => Hash::make('alex13'),
        ));
    }
}

class MaintenanceTableSeeder extends Seeder{
    public function run()
    {
        DB::table('maintenances')->delete();
        DB::table('maintenances')->insert(array(
            'maintenance_id' => 1,
            'name' => 'Mechanische controle',
            'description' => 'De zaal word gecontroleerd op scheuren en breuken',
            'duration' => '24:00:00',
            'time_before' => '8',
        ));
        DB::table('maintenances')->insert(array(
            'maintenance_id' => 2,
            'name' => 'Visuele inspectie',
            'description' => 'De zaal word visueel gecontroleerd',
            'duration' => '02:00:00',
            'time_before' => '2',
        ));
        DB::table('maintenances')->insert(array(
            'maintenance_id' => 3,
            'name' => 'Schoonmaak inspectie',
            'description' => 'De zaal word gecontroleerd op hygiene',
            'duration' => '01:00:00',
            'time_before' => '1',
        ));
    }
}
class Maintenance_PlannerTableSeeder extends Seeder{
    public function run(){
        DB::table('maintenance__planners')->delete();
        DB::table('maintenance__planners')->insert(array(
            'date' => '2015-03-01 22:00:00',
            'creator_id' => 3,
            'maintenance_id' => 10
        ));
    }
}
