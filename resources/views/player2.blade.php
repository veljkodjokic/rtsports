@extends('layouts.app')

@section('content')
<div class="side_players_left">@include('partials.channel_meni_content2')</div>

<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Channel 2</div>

                <div class="panel-body" style="height:90%">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <video id="video" width="100%" height="50%" controls>
                        <source src="https://www.rtsportsbackend.work/hls/stream1.m3u8" type="application/x-mpegURL">
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="side_players_bottom">@include('partials.channel_meni_content2')</div>
<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>

<script>
  if(Hls.isSupported()) {
    var video = document.getElementById('video');
    var hls = new Hls();
    hls.loadSource('https://www.rtsportsbackend.work/hls/stream1.m3u8');
    hls.attachMedia(video);
    hls.on(Hls.Events.MANIFEST_PARSED,function() {
      video.play();
  });
 }
</script>
@include('partials/auth_check')
@endsection