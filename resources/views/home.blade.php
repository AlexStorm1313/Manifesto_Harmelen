@extends('layouts.master')

@section('title', 'Home')

@section('header')

@stop

@section('content')
    <p>This is my body content.</p>
    {!! HTML::link('agenda', 'Agenda') !!}
@stop