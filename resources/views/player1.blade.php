@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Channel 1</div>

                <div class="panel-body" style="height:90%">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <video id="video" width="100%" height="50%" style="margin:0 auto;" controls>
                        <source src="https://www.rtsportsbackend.work/hls/stream.m3u8" type="application/x-mpegURL">
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>

<script type="text/javascript">
    if(Hls.isSupported()) {
        var video = document.getElementById('video');
        var hls = new Hls();
        hls.loadSource('https://www.rtsportsbackend.work/hls/stream.m3u8');
        hls.attachMedia(video);
        hls.on(Hls.Events.MANIFEST_PARSED,function() {
            video.play();
        });
    }
</script>
@endsection
