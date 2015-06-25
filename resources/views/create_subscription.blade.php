@extends('layouts.master')

@section('title', 'Abonnementen')
@section('page_header', 'Abonnementen')
@section('abbonement', 'active')

@section('content')
    {!! Form::open(array('action' => 'SubscriptionController@store', 'method' => 'post')) !!}
    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', '', array('class' => 'form-control')) !!}
    </div>
    <p>{!! Form::submit('Bestel', array('class' => 'btn btn btn-default')) !!}</p>

    {!! Form::close() !!}
@stop