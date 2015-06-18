<?php namespace Manifesto\Http\Controllers;

use Manifesto\Http\Requests;
use Manifesto\Http\Controllers\Controller;

use Manifesto\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{

    public function order($id)
    {
        $tickets = DB::table('tickets')->where('eventid', $id)->count();

        return view('order')->with(['tickets' => $tickets, 'eventid' => $id]);
    }

    public function buy(Request $request)
    {
        //assign variables
        $save = $request->input('save');
        $order = $request->input('order');
        $eventid = $request->input('eventid');
        $email = $request->input('email');
        $amount_tickets = $request->input('amount_tickets');

        //if-statement cluster fuck
        if ($order == 'order') {
            $exist = DB::table('customers')->where('email', $email)->count();
            if ($exist == 0) {
                DB::table('customers')->insert(array(
                    'email' => $email,
                ));
                $id = DB::table('customers')->where('email', $email)->pluck('id');
                if (DB::table('tickets')->where([
                        'reserved' => 0,
                        'klantid' => 0,
                        'eventid' => $eventid
                    ])->take($amount_tickets)->count() >= $amount_tickets
                ) {
                    $tickets = DB::table('tickets')->where([
                        'klantid' => 0,
                        'eventid' => $eventid
                    ])->take($amount_tickets)->get();
                    foreach ($tickets as $ticket) {
                        DB::table('tickets')->where('id', $ticket->id)->update(['klantid' => $id]);
                    }
                } else {
                    return redirect("order/" . "$eventid")->with([
                        'message' => 'Not enough tickets',
                        'eventid' => $eventid
                    ]);
                }
            } else {
                $id = DB::table('customers')->where('email', $email)->pluck('id');
                if (DB::table('tickets')->where([
                        'reserved' => 0,
                        'klantid' => 0,
                        'eventid' => $eventid
                    ])->take($amount_tickets)->count() >= $amount_tickets
                ) {
                    $tickets = DB::table('tickets')->where([
                        'klantid' => 0,
                        'eventid' => $eventid
                    ])->take($amount_tickets)->get();
                    foreach ($tickets as $ticket) {
                        DB::table('tickets')->where('id', $ticket->id)->update(['klantid' => $id]);
                    }
                } else {
                    return redirect("order/" . "$eventid")->with([
                        'message' => 'Not enough tickets',
                        'eventid' => $eventid
                    ]);
                }

            }
            //MOAAAR STATEMENTS
            $ticket_price = DB::table('tickets')->where('eventid', $eventid)->pluck('prijs');
            $total_price = $amount_tickets * $ticket_price;

            return view('order_success')->with(['total_price' => $total_price, 'amount_tickets' => $amount_tickets]);

        } elseif ($save == 'save') {
            $exist = DB::table('customers')->where('email', $email)->count();
            if ($exist == 0) {
                DB::table('customers')->insert(array(
                    'email' => $email,
                ));
                $id = DB::table('customers')->where('email', $email)->pluck('id');
                if (DB::table('tickets')->where([
                        'klantid' => 0,
                        'eventid' => $eventid
                    ])->take($amount_tickets)->count() >= $amount_tickets
                ) {
                    $tickets = DB::table('tickets')->where([
                        'reserved' => 0,
                        'klantid' => 0,
                        'eventid' => $eventid
                    ])->take($amount_tickets)->get();
                    foreach ($tickets as $ticket) {
                        DB::table('tickets')->where('id', $ticket->id)->update(['reserved' => $id]);
                    }
                } else {
                    return redirect("order/" . "$eventid")->with([
                        'message' => 'Not enough tickets',
                        'eventid' => $eventid
                    ]);
                }
            } else {
                $id = DB::table('customers')->where('email', $email)->pluck('id');
                if (DB::table('tickets')->where([
                        'klantid' => 0,
                        'eventid' => $eventid
                    ])->take($amount_tickets)->count() >= $amount_tickets
                ) {
                    $tickets = DB::table('tickets')->where([
                        'reserved' => 0,
                        'klantid' => 0,
                        'eventid' => $eventid
                    ])->take($amount_tickets)->get();
                    foreach ($tickets as $ticket) {
                        DB::table('tickets')->where('id', $ticket->id)->update(['reserved' => $id]);
                    }
                } else {
                    return redirect("order/" . "$eventid")->with([
                        'message' => 'Not enough tickets',
                        'eventid' => $eventid
                    ]);
                }
            }
            $ticket_price = DB::table('tickets')->where('eventid', $eventid)->pluck('prijs');
            $total_price = $amount_tickets * $ticket_price;

            return view('order_success')->with(['total_price' => $total_price, 'amount_tickets' => $amount_tickets]);
        }

        return redirect("order/" . "$eventid")->with(['message' => 'Fail', 'eventid' => $eventid]);
    }

    public function order_success()
    {
        return view('order_success'); //return the order_success view if the order is completed.
    }

    public function get_saved_tickets(Request $request)
    {
        $email = $request->input('email');
        $id = DB::table('customers')->where('email', $email)->pluck('id');
        $tickets = DB::table('tickets')->where(['klantid' => 0, 'reserved' => $id])->get();

        return view('get_saved_tickets')->with(['tickets' => $tickets, 'email' => $email]);
    }
}
