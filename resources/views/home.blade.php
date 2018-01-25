@extends('layouts.app')

@section('content')
<style type="text/css">
    @media only screen and (max-width: 770px) {
        #kvadrat{
            margin: 0 auto;
            width: 80%;
            margin-bottom: 7px;
        }
    }

    @media only screen and (min-width: 770px) {
        #kvadrat{
            display: inline-block;
            width:49%;  
        }
    }

    #game-live{
    font-family: Calibri;
    display: inline-block;
    position: relative;
    float: left;
    text-align: center;
    font-size: 15pt;
    font-weight: 15;
    height: 33%;
    width:100%;
    color:red;
}

    #live_stream {
    position: absolute;
    right: 15px;
    font-weight: 100;
    font-size: 35px;
    color:#21ff00;
    top:5px;
}
</style>
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Channels @if(\Auth::user()->admin)<a href="/admin/edit_channels" style="float: right; color: green;">EDIT</a>@endif</div>

                <div class="panel-body" style="height:90%; background-color:#F0F0F0;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="kvadrat" style="vertical-align: top; margin-bottom: 7px;">
                        <a href="/game12">
                            <img src="/pics/ufcpass.png" style="width: 100%; height: 100%;">
                        </a>
                    </div>

                    <div id="kvadrat" style="vertical-align: top; margin-bottom: 7px;">
                        <a href="/game8">
                            <img src="/pics/nbatv.png" style="width: 100%; height: 100%;">
                        </a>
                    </div>

                    <div id="kvadrat" style="vertical-align: top">
                        <a href="/game4">
                            <img src="/pics/nhltv.png" style="width: 100%; height: 100%;">
                        </a>
                    </div>

                    @foreach($streams as $stream)

                    @if($stream->upNext())
                    @php
                        $event=$stream->upNext();

                        $team1=App\Team::where('team',$event['team1'])->get()->first();
                        $team2=App\Team::where('team',$event['team2'])->get()->first();

                        $name1=$team1['name'];
                        $name2=$team2['name'];

                        $time=Carbon\Carbon::parse($event['time'])->format('H:i');
                        $day=Carbon\Carbon::parse($event['day'])->format('m/d');
                    @endphp
                        <div id="kvadrat" @if($stream->Live()) style="font-color: red;" @endif @if($event->sport == 'ufc') title="{{ $event->team1 }} ON Channel #{{ $stream->id }}" @endif>
                            <a id="game-link" href="/game{{$stream->id}}">
                                @if(!($event->sport == 'ufc'))
                                <div id="team-left">
                                    <div id="team-logo"><img @if($event['sport'] == 'nhl') src="/pics/nhl_teams/{{ $event['team1'] }}.png" @else src="/pics/teams/{{ $event['team1'] }}.png" @endif style="max-width:90%; max-height:90%;" id="logo-img"></div>
                                    <div id="team-name">{{ $name1 }}</div>
                                </div>
                                <div id="game-info">
                                    <div id="game-channel">Channel #{{ $stream->id }}</div>
                                    <div id="game-time" @if($stream->Live()) style="color: red;" @endif>{{ $time }}<raw style="font-size: 15pt; font-weight: 15;"> UTC +1</raw></div>
                                    <div id="game-date" @if($stream->Live()) style="color: red;" @endif>{{ $day }}</div>
                                    <div id="game-live"> @if(!$event->live) REPLAY @endif</div>
                                </div>
                                <div id="team-rigth">
                                    <div id="team-logo"><img @if($event['sport'] == 'nhl') src="/pics/nhl_teams/{{ $event['team2'] }}.png" @else src="/pics/teams/{{ $event['team2'] }}.png" @endif style="max-width:200px; max-height:100px; " id="logo-img"></div>
                                    <div id="team-name">{{ $name2 }}</div>
                                </div>
                                @else
                                    <div id="logo-img"><img src="/mnt/ufc/{{ $event->team2 }}" style="width:100%; max-height:180px; position:relative; margin: 0 auto;"></div>
                                @endif
                            </a>
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
</div>
@include('partials/auth_check')

@endsection
