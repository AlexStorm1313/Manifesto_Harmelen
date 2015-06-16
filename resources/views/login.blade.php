@extends('layouts.master')

@section('title', 'Login')
@section('page_header', 'Login')

@section('header')

@stop

@section('content')
    <div class="container">
        {!! Form::open(array('url' => 'login')) !!}
        <!-- if there are login errors, show them here -->
        <p style="color: red; margin-top: 20px;">
            {!! $errors->first('email') !!}
            {!! $errors->first('password') !!}
        </p>

        <div class="form-group">
            {!! Form::label('email', 'Email Address') !!}
            {!! Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) !!}
        </div>

        <p>{!! Form::submit('Submit!', array('class' => 'btn btn-default')) !!}</p>
        {!! Form::close() !!}
    </div>
@stop