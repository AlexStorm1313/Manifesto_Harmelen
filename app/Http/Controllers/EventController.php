<?php namespace Manifesto\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Manifesto\Event;
use Manifesto\Http\Requests;
use Manifesto\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Manifesto\User;
use Manifesto\Zaal;

class EventController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = Event::all();
        return view('events_show')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $zalen = Zaal::all()->lists('zaal_naam');
        return view('event_create')->with('zalen', $zalen);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        DB::table('events')
            ->insert($request->except('_method', '_token', 'prijs'));
        $id = DB::table('events')->where('naam', $request->input('naam'))->pluck('id');
        $count = 0;
        while ($count != $request->input('aantalkaarten')) {

            DB::table('tickets')->insert(array(
                'klantid' => 0,
                'eventid' => $id,
                'prijs' => $request->input('prijs'),
                'ticket_number' => Str::random(15),
            ));
            $count++;
        }
        return redirect('events_show');
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
        $event = Event::find($id);

        return view('event_edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update($id, Request $request)
    {
        DB::table('events')
            ->where('id', $id)
            ->update($request->except('_method', '_token'));
        return redirect('event/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Event::destroy($id);
        DB::table('tickets')->where('eventid', $id)->delete();

        return redirect('events_show');
    }

}
