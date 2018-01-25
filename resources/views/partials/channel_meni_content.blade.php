<style type="text/css">
    @media only screen and (max-width: 1500px) {
    #kvadrat{
        min-height: 200px;
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
    font-size: 25px;
    color:#21ff00;
    top:5px;
	}
</style>
@foreach($streams as $theStream)

    @if($theStream->upNext())
    @php
        $event=$theStream->upNext();

        $team1=App\Team::where('team',$event['team1'])->get()->first();
        $team2=App\Team::where('team',$event['team2'])->get()->first();

        $name1=$team1['name'];
        $name2=$team2['name'];

        $time=Carbon\Carbon::parse($event['time'])->format('h:i');
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
        <br>
    @endif

@endforeach

@if($stream->id!=12)
    <div id="kvadrat" style="margin: 0 auto;  width: 100%; max-width: 800px; height: 160px; margin-bottom: -20px;">
        <a href="/game12">
            <img src="/pics/ufcpass.png" style="width: 100%; height: 100%;">
        </a>
    </div> 
@endif

@if($stream->id!=8)
    <div id="kvadrat" style="margin: 0 auto;  width: 100%; max-width: 800px; height: 160px; margin-bottom: -20px;">
        <a href="/game8">
            <img src="/pics/nbatv.png" style="width: 100%; height: 100%;">
        </a>
    </div> 
@endif

@if($stream->id!=4)
    <div id="kvadrat" style="margin: 0 auto;  width: 100%; max-width: 800px; height: 160px; margin-bottom: -20px;">
        <a href="/game4">
            <img src="/pics/nhltv.png" style="width: 100%; height: 100%;">
        </a>
    </div> 
@endif
