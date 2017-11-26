<style type="text/css">
    @media only screen and (max-width: 1500px) {
    #kvadrat{
        min-height: 200px;
    }
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

    <div id="kvadrat" style="margin: 0 auto;  width: 100%; max-width: 800px; height: 160px; margin-bottom: -20px;">
            <a  href="/game{{ $theStream->id }}"><img src="pics/game{{ $theStream->id }}.png" style="width:100%; height:100%">@if($theStream->Live())<div id="live_stream"><b>&#9673;LIVE</b></div>@endif</a>
    </div><br>

@endforeach