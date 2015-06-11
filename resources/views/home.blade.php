@extends('layouts.master')

@section('title', 'Home')
@section('home', 'active')

@section('content')
    <div class="container">
        <div class="event_container">
            <div class="event_header">
                <span class="event_date">
                <div class="event_day">Do</div>
                <div class="event_day_date">11 jul</div>
                </span>
                <span class="event_title">
                    <div class="event_name">Jo jo en de Banjo Band</div>
                    <div class="event_artist">Snoop Dogg</div>
                </span>
            </div>
            <div class="event_info_container">
                <div class="event_info">
                    <span class="event_zaal">Zaal: </span><span>Yolo zaal</span>
                    <span class="event_time">Tijd: </span><span>20:00</span>
                    <span class="event_price">Prijs: </span><span>35,-</span>
                </div>
            </div>
            <div class="buy_tickets_button">
                KOOP DAN!!!1!11
            </div>
        </div>
    </div>
@stop