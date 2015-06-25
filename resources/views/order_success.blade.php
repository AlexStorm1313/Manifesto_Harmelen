@extends('layouts.master')

@section('title', 'Success')

@section('header')

@stop

@section('content')
    <div class="container">
        U heeft {!! $amount_tickets!!} ticket(s) gekocht voor een bedrag van {!! $total_price !!}
        <td><a href="/agenda">
                <button class="btn btn-success pull-right">Agenda</button>
            </a></td>
    </div>

@stop