@extends('layouts.app')

@section('content')

<div class="side_players_left">@include('partials.channel_meni_content')</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="border-bottom: 10px;">
                    <div style="float: left; width: 33%; text-align: center; position: relative;">
                        @if($theStream->id != 1)<a href="/game{{ ($theStream->id)-1 }}"><< Previous channel</a> 
                        @else First channel
                        @endif</div>
                    <div style="float: left; width: 33%; text-align: center; position: relative;">Channel #{{ $theStream->id }}</div>
                    <div style="float: left; width: 33%; text-align: center; position: relative;">
                        @if($theStream->id != App\Stream::count())<a href="/game{{ ($theStream->id)+1 }}">Next cahnnel >></a>
                        @else Last channel
                        @endif</div>
                </div>

                <div class="panel-body" style="height:90%">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <video id="video" width="100%" height="50%" style="margin:0 auto;" controls preload="none" src="{{ $theStream->source }}"></video>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="side_players_bottom">@include('partials.channel_meni_content')</div>

<div name="border-shadow">
    <div name="border-line" class="n&*Y7hUH78hpI&H&8">
        <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<script>
  if(Hls.isSupported()) {
    var video = document.getElementById('video');
    video.src = '';
    var hls = new Hls();
    hls.loadSource('{{ $theStream->source }}');
    hls.attachMedia(video);
    hls.on(Hls.Events.MANIFEST_PARSED,function() {
      video.play();
  });
 }
else if (video.canPlayType('application/vnd.apple.mpegurl')) {
    video.addEventListener('canplay',function() {
    video.play();
  });
}
</script>
    </div>
</div>

@if(Session::has('trl'))
<script type="text/javascript">
        swal ( "Warning!" ,  "You have a trial subscription, our services will only be available for 48h." ,  "warning" )
</script>
@endif

@include('partials/auth_check')
@endsection
