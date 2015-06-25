<?php namespace Manifesto\Http\Controllers;

use DateInterval;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Manifesto\Customer;
use Manifesto\Http\Requests;
use Manifesto\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Manifesto\User;

class SubscriptionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('abonnement');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('create_subscription');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $email = $request->input('email');
        $user_id = DB::table('customers')->where('email', $email)->pluck('id');
        $user = Customer::find($user_id);
        if (DB::table('subscriptions')->where('klantid', $user_id)->exists()) {
            return redirect('abonnement');
        } else {
            $datetime = new DateTime('tomorrow');
            DB::table('subscriptions')->insert(array(
                'ingangs_datum' => $datetime->format('Y-m-d'),
                'verloop_datum' => $datetime->add(new DateInterval('P30D')),
                'prijs' => 100,
                'klantid' => $user_id,
                'activated' => false,
                'token' => Str::random(15)
            ));
            $subscription = DB::table('subscriptions')->where('klantid', $user_id)->first();
            Mail::send('email.confirm', ['user' => $user, 'subscription' => $subscription], function ($m) use ($user) {
                $m->to($user->email, $user->name)->subject('Confirm subscription');
            });

            return redirect('/abonnement');
        }
    }

    public function confirmSubscription($id, $token)
    {
        if (User::find($id)->exists()) {
            DB::table('subscriptions')
                ->where('token', $token)
                ->update(['activated' => true]);
        } else {
            return redirect('abonnement');
        }

        return redirect('abonnement');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
