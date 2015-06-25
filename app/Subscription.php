<?php namespace Manifesto;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model {

    public function checkEvents()
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
    }

}
