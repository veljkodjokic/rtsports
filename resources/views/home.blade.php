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
                                <a  href="/game{{$stream->id}}"><img src="pics/game{{ $stream->id }}.png" style="width:100%; height:100%;"></a>
                            </tag>
                        </div>
                    @endforeach

                    <div id="kvadrat">
                        <tag>
                            <a  href="#game4"><img src="pics/coming.png" style="width:100%; height:100%"></a>
                        </tag>
                    </div>
                </div>
            </div>
        </div>
</div>
@include('partials/auth_check')

@endsection
