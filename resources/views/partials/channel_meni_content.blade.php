<style type="text/css">
    @media only screen and (max-width: 990px){
        #team-name{
            font-size: 14pt;
        }
    }
    
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

    @media only screen and (max-width: 440px){
        #game-channel{
            font-size: 10pt;
        }
        #game-time{
            font-size: 10pt;
        }
        #game-live{
            font-size: 10pt;
        }
        #game-date{
            font-size: 10pt;
        }
        #team-name{
            font-size: 9pt;
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
@foreach($streams as $stream)

    @if($stream->upNext())
    @php
        $event=$stream->upNext();

        $team1=App\Team::where('team',$event['team1'])->get()->first();
        $team2=App\Team::where('team',$event['team2'])->get()->first();

        $name1=$team1['name'];
        $name2=$team2['name'];

        $time=Carbon\Carbon::parse($event['time'])->format('h:i');
        $day=Carbon\Carbon::parse($event['day'])->format('m/d');
    @endphp
        <div id="kvadrat" style="margin: 0 auto;  width: 100%; max-width: 1028px; height: 160px; margin-bottom: -20px;">
            <a id="game-link" href="/game{{$stream->id}}"> @if(!($event->sport == 'ufc'))
                <div id="team-left">
                    <div id="team-logo" style="margin-bottom: 15px;"><img @if($event['sport'] == 'nhl') src="/pics/nhl_teams/{{ $event['team1'] }}.png" @else src="/pics/teams/{{ $event['team1'] }}.png" @endif style="max-width:100%;
  max-height:100%;" id="logo-img"></div>
                    <div id="team-name">{{ $name1 }}</div>
                </div>
                <div id="game-info">
                    <div id="game-channel">Channel #{{ $stream->id }}</div>
                    <div id="game-time" @if($stream->Live()) style="color: red;" @endif>{{ $time }}<raw style="font-weight: 15;"> UTC +1</raw></div>
                    <div id="game-date" @if($stream->Live()) style="color: red;" @endif>{{ $day }}</div>
                    <div id="game-live"> @if(!$event->live) REPLAY @endif</div>
                </div>
                <div id="team-rigth">
                    <div id="team-logo" style="margin-bottom: 15px;"><img @if($event['sport'] == 'nhl') src="/pics/nhl_teams/{{ $event['team2'] }}.png" @else src="/pics/teams/{{ $event['team2'] }}.png" @endif style="max-width:100%;
  max-height:100%;" id="logo-img"></div>
                    <div id="team-name">{{ $name2 }}</div>
                </div> 
                @else
                    <div id="logo-img"><img src="/mnt/ufc/{{ $event->team2 }}" style="width:100%; max-height:180px; position:relative; margin: 0 auto;"></div>
                @endif
            </a>
        </div>
        <br>
        <br>
    @endif

@endforeach

@if($theStream->id!=12)
    <div id="kvadrat" class="calm center" style="margin: 0 auto;  width: 100%; max-width: 1028px; height: 160px; margin-bottom: -20px;">
        <a href="/game12">
            <img src="/pics/ufcpass.png" class="calm center" style="max-width: 100%; max-height: 100%;">
        </a>
    </div> 
    <br>
    <br>
@endif

@if($theStream->id!=8)
    <div id="kvadrat" class="calm center" style="margin: 0 auto;  width: 100%; max-width: 1028px; height: 160px; margin-bottom: -20px;">
        <a href="/game8">
            <img src="/pics/nbatv.png" class="calm center" style="max-width: 100%; max-height: 100%;">
        </a>
    </div> 
    <br>
    <br>
@endif

@if($theStream->id!=4)
    <div id="kvadrat" class="calm center" style="margin: 0 auto;  width: 100%; max-width: 1028px; height: 160px; margin-bottom: -20px;">
        <a href="/game4">
            <img src="/pics/nhltv.png" class="calm center" style="max-width: 100%; max-height: 100%;">
        </a>
    </div> 
    <br>
    <br>
@endif
