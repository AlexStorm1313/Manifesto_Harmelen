<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{

    public function order($id)
    {
        $tickets = DB::table('tickets')->where('eventid', $id)->count();
        return view('order')->with(['tickets' => $tickets, 'eventid' => $id]);
    }

    public function buy(Request $request)
    {
        $email = $request->input('email');
        $amount_tickets = $request->input('amount_tickets');
        $eventid = $request->input('eventid');
        $exist = DB::table('customers')->where('email', $email)->count();
        if ($exist == 0) {
            DB::table('customers')->insert(array(
                'email' => $email,
            ));
            $id = DB::table('customers')->where('email', $email)->pluck('id');
            $tickets = DB::table('tickets')->where(['klantid' => 0, 'eventid' => $eventid])->take($amount_tickets)->get();
            foreach ($tickets as $ticket) {
                DB::table('tickets')->where('id', $ticket->id)->update(['klantid' => $id]);
            }
        } else {
            $id = DB::table('customers')->where('email', $email)->pluck('id');
            if (DB::table('tickets')->where(['klantid' => 0, 'eventid' => $eventid])->take($amount_tickets)->count() >= $amount_tickets) {
                $tickets = DB::table('tickets')->where(['klantid' => 0, 'eventid' => $eventid])->take($amount_tickets)->get();
                foreach ($tickets as $ticket) {
                    DB::table('tickets')->where('id', $ticket->id)->update(['klantid' => $id]);
                }
            } else {
                return redirect("order/" . "$eventid")->with(['message' => 'Not enough tickets', 'eventid' => $eventid]);
            }

        }
        $ticket_price = DB::table('tickets')->where('eventid', $eventid)->pluck('prijs');
        $total_price = $amount_tickets * $ticket_price;
        return view('order_success')->with(['total_price'=> $total_price, 'amount_tickets' => $amount_tickets]);
    }

    public function order_success()
    {
        return view('order_success');
    }

}
