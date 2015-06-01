<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function order($id)
    {
        $tickets = DB::table('tickets')->where('eventid', $id)->get();
        return view('order')->with('tickets', $tickets);
    }

}
