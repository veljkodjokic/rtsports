@extends('layouts.app')

@section('content')
<style type="text/css">
    @media only screen and (max-width: 770px) {
        #kvadrat{
            margin: 0 auto;
            width: 80%; 
        }
    }

    @media only screen and (min-width: 770px) {
        #kvadrat{
            display: inline-block;
            width:49%; 
        }
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
                <div class="panel-heading">Channels</div>

                <div class="panel-body" style="height:90%">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($streams as $stream)
                        <div id="kvadrat">
                            <tag>
                                <a  href="/game{{$stream->id}}"><img src="pics/game{{ $stream->id }}.png" style="width:100%; height:100%;">@if($stream->Live())<div id="live_stream"><b>&#9673;LIVE</b></div>@endif</a>
                            </tag>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</div>
@include('partials/auth_check')

@endsection
