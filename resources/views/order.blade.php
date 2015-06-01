@extends('layouts.master')

@section('title', 'Order')

@section('header')

@stop

@section('content')
    @foreach($tickets as $ticket)
        {{ $ticket->eventid }}
    @endforeach
@stop