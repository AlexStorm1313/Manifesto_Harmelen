<?php namespace Manifesto\Console;

use DateInterval;
use DateTime;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Manifesto\Customer;

class Kernel extends ConsoleKernel
{

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'Manifesto\Console\Commands\Inspire',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
            ->hourly();

        $schedule->call(function()
        {
            $today_date = new DateTime();
            $date_for = $today_date->add(new DateInterval('P1D'));
            $date_for_event = $date_for->format('Y-m-d');
            $available_events = DB::table('events')->where(
                ['datum' => $date_for_event],
                ['aantalkaarten', '>', 0])->get();
            $users = Customer::all();
            foreach ($users as $user) {
                Mail::send('email.info', ['user' => $user, 'available_events' => $available_events],
                    function ($m) use ($user) {
                        $m->to($user->email, $user->name)->subject('Events');
                    });
            }

        })->everyFiveMinutes();
    }

}
