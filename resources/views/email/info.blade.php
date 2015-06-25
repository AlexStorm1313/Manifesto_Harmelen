<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
{!! HTML::style('css/main.css') !!}
<div class="container">
    @foreach($available_events as $event)
        <div class="event_container">
            <div class="event_header">
                <span class="event_date">
                <div class="event_day">{!! date('D', strtotime($event->begintijd)) !!}</div>
                <div class="event_day_date">{!! date('j M', strtotime($event->begintijd)) !!}</div>
                </span>
                <span class="event_title">
                    {{--<span>{!! $event->aantalkaarten !!}</span>--}}
                    <div class="event_name">{!! $event->naam !!}</div>
                    <div class="event_artist">{!! $event->artiest !!}</div>
                </span>
            </div>
            <div class="event_info_container">
                <div class="event_info">
                    <span class="event_zaal">Zaal: </span><span>{!! $event->zaal !!}</span>
                    <span class="event_time">Tijd: </span><span>{!! date('H:i', strtotime($event->begintijd)) !!}</span>
                    <span class="event_price">Prijs: </span><span>{!! DB::table('tickets')->where('eventid', $event->id)->pluck('prijs') !!}
                        ,-</span>
                </div>
            </div>
            @if(DB::table('tickets')->where('eventid', $event->id)->count() > 0)
                <a href="{{ URL::action('OrderController@order', [$event->id]) }}">
                    <div class="buy_tickets_button">Kooop</div>
                </a>
            @elseif(DB::table('tickets')->where('eventid', $event->id)->count() <= 0)
                <a href="#">
                    <div class="buy_tickets_button">uitverkocht</div>
                </a> @endif
        </div>
</div>
@endforeach