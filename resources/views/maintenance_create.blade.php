@extends('layouts.master')

@section('title', 'Maintenance')
@section('page_header', 'Create maintenance')
@section('maintenance', 'active')

@section('content')
    <div class="container">
        {!! Form::open(array('action' => array('MaintenanceController@store'), 'method' => 'post')) !!}
        <div class="form-group">
            {!! Form::label('date', 'Maintenance date') !!}
            {!! Form::text('date', '', array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('maintenance', 'Maintenance') !!}
            {!! Form::select('maintenance', array(1 => 'Mechanische controle', 2 => 'Visuele inspectie', 3 => 'Schoonmaak inspectie'), array('class' => 'form-control')) !!}
        </div>
        <p>{!! Form::submit('Create', array('class' => 'btn btn btn-default')) !!}</p>

        {!! Form::close() !!}
    </div>
@stop