<?php namespace Manifesto\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Manifesto\Http\Requests;
use Manifesto\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Manifesto\Maintenance;
use Manifesto\Maintenance_Planner;

class MaintenanceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $maintenances = Maintenance_Planner::all();

        return view('maintenance_show')->with(array('maintenances' => $maintenances));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('maintenance_create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{
        $creator_id = Auth::user()->id;
        $date = $request->input('date');
        $maintenance_id = $request->input('maintenance');
        DB::table('maintenance__planners')->insert(array('creator_id' => $creator_id, 'date' => $date, 'maintenance_id' => $maintenance_id));
		return redirect('maintenance');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Maintenance_Planner::destroy($id);
        return redirect('maintenance');
    }

}
