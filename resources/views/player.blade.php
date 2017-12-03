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
                        @if($stream->id != 1)<a href="/game{{ ($stream->id)-1 }}"><< Previous channel</a> 
                        @else First channel
                        @endif</div>
                    <div style="float: left; width: 33%; text-align: center; position: relative;">Channel #{{ $stream->id }}</div>
                    <div style="float: left; width: 33%; text-align: center; position: relative;">
                        @if($stream->id != App\Stream::count())<a href="/game{{ ($stream->id)+1 }}">Next cahnnel >></a>
                        @else Last channel
                        @endif</div>
                </div>

                <div class="panel-body" style="height:90%">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <video id="video" width="100%" height="50%" style="margin:0 auto;" controls preload="none">
                        <source src="{{ $stream->source }}" type="application/x-mpegURL">
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="side_players_bottom">@include('partials.channel_meni_content')</div>

<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<video id="video"></video>
<script>
  if(Hls.isSupported()) {
    var video = document.getElementById('video');
    var hls = new Hls();
    hls.loadSource('{{ $stream->source }}');
    hls.attachMedia(video);
    hls.on(Hls.Events.MANIFEST_PARSED,function() {
      video.play();
  });
 }
</script>
@include('partials/auth_check')
@endsection
