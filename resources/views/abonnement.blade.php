@extends('layouts.master')

@section('title', 'Abonnementen')
@section('page_header', 'Abonnementen')
@section('abbonement', 'active')

@section('content')
    <div class="container">
        <div class="event_container">
            <div class="event_header">
                <span class="event_date">
                <div class="event_day"></div>
                <div class="event_day_date"></div>
                </span>
                <span class="event_title">
                    <div class="event_name">Maandkaart Manifesto Harmelen</div>
                    <div class="event_artist">---</div>
                </span>
            </div>
            <div class="event_info_container">
                <div class="event_info">
                    <span class="event_price">Prijs: </span><span>100,-</span>
                </div>
            </div>
            <a href="{{ URL::action('SubscriptionController@create') }}">
                <div class="buy_tickets_button">Kooop</div>
            </a>
        </div>
    </div>
@stop