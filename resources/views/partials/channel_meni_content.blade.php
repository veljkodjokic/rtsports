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
        <div id="kvadrat" style="margin: 0 auto;  width: 100%; max-width: 800px; height: 160px; margin-bottom: -20px;">
            <a id="game-link" href="/game{{$theStream->id}}">
                <div id="team-left">
                    <div id="team-logo" style="margin-bottom: 15px;"><img src="/pics/teams/{{ $event['team1'] }}.png" style="max-width:100%;
  max-height:100%;" id="logo-img"></div>
                    <div id="team-name">{{ $name1 }}</div>
                </div>
                <div id="game-info">
                    <div id="game-time" @if($stream->Live()) style="color: red;" @endif>{{ $time }}<raw style="font-size: 15pt; font-weight: 15;"> UTC +1</raw></div>
                    <div id="game-date" @if($stream->Live()) style="color: red;" @endif>{{ $day }}</div>
                    <div id="game-live"> @if(!$event->live) REPLAY @endif</div>
                </div>
                <div id="team-rigth">
                    <div id="team-logo" style="margin-bottom: 15px;"><img src="/pics/teams/{{ $event['team2'] }}.png" style="max-width:100%;
  max-height:100%;" id="logo-img"></div>
                    <div id="team-name">{{ $name2 }}</div>
                </div>
            </a>
        </div>
        <br>
    @endif

@endforeach

@if($stream->id!=4)
    <div id="kvadrat" style="margin: 0 auto;  width: 100%; max-width: 800px; height: 160px; margin-bottom: -20px;">
        <a href="/game4">
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
