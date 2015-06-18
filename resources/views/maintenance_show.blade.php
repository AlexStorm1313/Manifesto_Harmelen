@extends('layouts.master')

@section('title', 'Maintenance')
@section('page_header', 'Maintenance')
@section('maintenance', 'active')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Naam</th>
                <th>Beschrijving</th>
                <th>Datum</th>
                <th>Duur</th>
                <th>Weken</th>
                <th>Verwijder</th>
            </tr>
            </thead>
            <tbody>
            @foreach($maintenances as $maintenance)
                <tr>
                    <td>{!! DB::table('maintenances')->where('id', $maintenance->maintenance_id)->pluck('name'); !!}</td>
                    <td>{!! DB::table('maintenances')->where('id', $maintenance->maintenance_id)->pluck('description'); !!}</td>
                    <td>{!! $maintenance->date!!}</td>
                    <td>{!! DB::table('maintenances')->where('id', $maintenance->maintenance_id)->pluck('duration'); !!}</td>
                    <td>{!! DB::table('maintenances')->where('id', $maintenance->maintenance_id)->pluck('time_before'); !!}</td>
                    <td>{!! Form::open(array('route' => array('maintenance.destroy', $maintenance->id), 'method' => 'delete')) !!}
                        <button type="submit" class="btn btn-danger">Delete</button>
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <td><a href="{!! URL::action('MaintenanceController@create') !!}">
                <button class="btn btn-success pull-right">Create</button>
            </a></td>
    </div>
@stop