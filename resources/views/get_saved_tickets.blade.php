@extends('layouts.master')

@section('title', 'Saved tickets')

@section('header')

@stop

@section('content')
    <table class="table">
        <h2>Uw gereserveerde tickets [{!! $email !!}]</h2>
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
        @foreach($tickets as $ticket)
            <tr>
                <td>{!! DB::table('events')->where(['id' => $ticket->eventid])->pluck('naam') !!}</td>
                <td>{!! DB::table('events')->where(['id' => $ticket->eventid])->pluck('artiest') !!}</td>
                <td>{!! DB::table('events')->where(['id' => $ticket->eventid])->pluck('begintijd') !!}</td>
                <td>{!! DB::table('events')->where(['id' => $ticket->eventid])->pluck('eindtijd') !!}</td>
                <td>
                <td><a href="{{ URL::action('OrderController@order', [$ticket->eventid]) }}">
                        <button class="btn">{!! DB::table('tickets')->where('eventid', $ticket->eventid)->pluck('prijs') !!}
                            ,-
                        </button>
                    </a></td>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop