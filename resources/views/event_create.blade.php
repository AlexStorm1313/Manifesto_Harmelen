@extends('layouts.master')

@section('title', 'Event')
@section('page_header', 'Create Event')
@section('event', 'active')

@section('content')
    <div class="container">
        {!! Form::open(array('action' => 'EventController@store', 'method' => 'post')) !!}
        <div class="form-group">
            {!! Form::label('naam', 'Event naam') !!}
            {!! Form::text('naam', '', array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('artiest', 'Artiest') !!}
            {!! Form::text('artiest', '', array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('aantalkaarten', 'Aantal kaarten') !!}
            {!! Form::input('number', 'aantalkaarten', '', array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('prijs', 'Prijs') !!}
            {!! Form::text('prijs' ,'',  array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('begintijd', 'Begintijd') !!}
            {!! Form::text('begintijd' ,'',  array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('eindtijd', 'Eindtijd') !!}
            {!! Form::text('eindtijd' ,'',  array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('zaal', 'Zaal') !!}
            {!! Form::text('zaal' ,'',  array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('hidden', 'Hidden evenement') !!}
            {!! Form::select('hidden', array(1 => 'Ja', 0 => 'Nee'), 0,  array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('speciaalevenement', 'Speciaal evenement') !!}
            {!! Form::select('speciaalevenement', array(1 => 'Ja', 0 => 'Nee'), 0,  array('class' => 'form-control')) !!}
        </div>
        <p>{!! Form::submit('Save', array('class' => 'btn btn btn-default')) !!}</p>

        {!! Form::close() !!}
    </div>
@stop