@extends('layouts.master')

@section('title', 'Agenda')

@section('header')

@stop

@section('content')
    <table class="table">
        <h2>Events</h2>
        <thead>
        <tr>
            <th>Naam</th>
            <th>Artiest</th>
            <th>Begintijd</th>
            <th>Eindtijd</th>
            <th>Aantal kaarten</th>
            <th>Koop tickets</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->naam }}</td>
                <td>{{ $event->artiest }}</td>
                <td>{{ $event->begintijd }}</td>
                <td>{{ $event->eindtijd }}</td>
                <td>{{ $event->aantalkaarten }}</td>
                <td><a href="{{ URL::action('TicketController@edit', [$event->id]) }}">
                        <button class="btn">Koop</button>
                    </a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop