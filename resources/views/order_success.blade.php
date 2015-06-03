@extends('layouts.master')

@section('title', 'Success')

@section('header')

@stop

@section('content')
<div class="container">
   U heeft {!! $amount_tickets!!} ticket(s) gekocht voor een bedrag van {!! $total_price !!}
</div>

@stop