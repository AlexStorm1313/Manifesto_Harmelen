@extends('layouts.master')

@section('title', 'Agenda')
@section('agenda', 'active')

@section('header')

@stop

@section('content')
    <table class="table">
        <h2>Events</h2>
        <thead>
        <tr>
            <th>Naam</th>
            <th>Artiest</th>
            <th>Begintijd</th>
            <th>Eindtijd</th>
            <th>Aantal kaarten</th>
            <th>Koop tickets</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->naam }}</td>
                <td>{{ $event->artiest }}</td>
                <td>{{ $event->begintijd }}</td>
                <td>{{ $event->eindtijd }}</td>
                <td>{{ DB::table('tickets')->where(['eventid' => $event->id, 'klantid' => 0])->count() }}</td>
                <td><a href="{{ URL::action('OrderController@order', [$event->id]) }}">
                        <button class="btn">{!! DB::table('tickets')->where('eventid', $event->id)->pluck('prijs') !!}
                            ,-
                        </button>
                    </a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! Form::open(array('action' => 'OrderController@get_saved_tickets')) !!}
    <div class="form-group">
        {!! Form::label('Email') !!}
        {!! Form::email('email', null, array('required',
                  'class'=>'form-control',
                  'placeholder'=>'Email')) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('save',
      array('name' => 'save', 'class'=>'btn'))!!}

    </div>
    {!! Form::close() !!}
    @foreach($events as $event)
        <div class="event_container">
            <div class="event_header">
                <span class="event_date">
                <div class="event_day">Do</div>
                <div class="event_day_date">11 jul</div>
                </span>
                <span class="event_title">
                    <div class="event_name">{!! $event->naam !!}</div>
                    <div class="event_artist">{!! $event->artiest !!}</div>
                </span>
            </div>
            <div class="event_info_container">
                <div class="event_info">
                    <span class="event_zaal">Zaal: </span><span>Yolo zaal</span>
                    <span class="event_time">Tijd: </span><span>20:00</span>
                    <span class="event_price">Prijs: </span><span>{!! DB::table('tickets')->where('eventid', $event->id)->pluck('prijs') !!}
                        ,-</span>
                </div>
            </div>
            <a href="{{ URL::action('OrderController@order', [$event->id]) }}">
                <div class="buy_tickets_button">Kooop</div>
            </a>
        </div>
    @endforeach
@stop