@extends('layouts.app')

@section('content')

<div class="side_players_left">@include('partials.channel_meni_content')</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Channel {{ $stream->id }}</div>

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

<link href="//vjs.zencdn.net/5.8/video-js.min.css" rel="stylesheet">
<script src="//vjs.zencdn.net/5.8/video.min.js"></script>

<script type="text/javascript">
    var player = videojs('.video');
</script>
@include('partials/auth_check')
@endsection
