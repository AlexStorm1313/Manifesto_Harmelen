@extends('layouts.master')

@section('title', 'Event')
@section('page_header', 'Edit Event')
@section('event', 'active')

@section('content')
    <div class="container">
        {!! Form::model($event, array('action' => array('EventController@update', $event->id), 'method' => 'patch')) !!}
        <div class="form-group">
            {!! Form::label('naam', 'Event naam') !!}
            {!! Form::text('naam', $event->naam, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('artiest', 'Artiest') !!}
            {!! Form::text('artiest', $event->artiest, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('begintijd', 'Begintijd') !!}
            {!! Form::text('begintijd' ,$event->begintijd,  array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('eindtijd', 'Eindtijd') !!}
            {!! Form::text('eindtijd' ,$event->eindtijd,  array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('zaal', 'Zaal') !!}
            {!! Form::text('zaal' ,$event->zaal,  array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('hidden', 'Hidden evenement') !!}
            {!! Form::select('hidden', array(1 => 'Ja', 0 => 'Nee'), $event->hidden,  array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('speciaalevenement', 'Speciaal evenement') !!}
            {!! Form::select('speciaalevenement', array(1 => 'Ja', 0 => 'Nee'), $event->speciaalevenement,  array('class' => 'form-control')) !!}
        </div>
        <p>{!! Form::submit('Save', array('class' => 'btn btn btn-default')) !!}</p>

        {!! Form::close() !!}
    </div>
@stop