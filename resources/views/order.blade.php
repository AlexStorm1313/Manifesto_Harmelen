@extends('layouts.master')

@section('title', 'Order')

@section('header')

@stop

@section('content')
    {!! Form::open(array('action' => 'OrderController@buy')) !!}
    {!! Form::hidden('eventid', $eventid) !!}
    <div class="form-group">
        {!! Form::label('Email') !!}
        {!! Form::email('email', null, array('required',
                  'class'=>'form-control',
                  'placeholder'=>'Email')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Amount of tickets') !!}
        {!! Form::select('amount_tickets', array(1 => '1', 2 => '2', 3 => '3', 4 => '4'), array('required',
                  'class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('order',
      array('name' => 'order', 'class'=>'btn'))!!}

    </div>
    <div class="form-group">
        {!! Form::submit('save',
      array('name' => 'save', 'class'=>'btn'))!!}

    </div>
    {!! Form::close() !!}

@stop