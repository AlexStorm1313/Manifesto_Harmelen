@extends('layouts.master')

@section('title', 'Events')
@section('page_header', 'Events')
@section('event', 'active')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Naam</th>
                <th>Artiest</th>
                <th>Begintijd</th>
                <th>Eindtijd</th>
                <th>Aantal</th>
                <th>Wijzig</th>
                <th>Verwijder</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->naam }}</td>
                    <td>{{ $event->artiest }}</td>
                    <td>{{ $event->begintijd }}</td>
                    <td>{{ $event->eindtijd }}</td>
                    <td>{{ DB::table('tickets')->where(['eventid' => $event->id, 'klantid' => 0])->count() }}</td>
                    <td>{!! Form::open(array('route' => array('event.edit', $event->id), 'method' => 'get')) !!}
                        <button type="submit" class="btn">Edit</button>
                        {!! Form::close() !!}</td>
                    <td>{!! Form::open(array('route' => array('event.destroy', $event->id), 'method' => 'delete')) !!}
                        <button type="submit" class="btn btn-danger">Delete</button>
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <td><a href="{{ URL::action('EventController@create') }}">
                <button class="btn btn-success pull-right">Create</button>
            </a></td>
    </div>
@stop