@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Channels</div>

                <div class="panel-body" style="height:90%">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="kvadrat" style="position:relative; width:70%; height:30%; margin:0 auto; ">
                        <tag>
                            <a  href="{{url('/game1')}}"><img src="pics/game1.png" style="width:100%; height:100%"></a>
                        </tag>
                    </div>

                    <div id="kvadrat" style="position:relative; width:70%; height:30%; margin:0 auto; ">
                        <tag>
                            <a  href="{{url('/game2')}}"><img src="pics/game2.png" style="width:100%; height:100%"></a>
                        </tag>
                    </div>

                    <div id="kvadrat" style="position:relative; width:70%; height:30%; margin:0 auto; ">
                        <tag>
                            <a  href="{{url('/game3')}}"><img src="pics/game3.png" style="width:100%; height:100%"></a>
                        </tag>
                    </div>

                    <div id="kvadrat" style="position:relative; width:70%; height:30%; margin:0 auto; ">
                        <tag>
                            <a  href="#game4"><img src="pics/coming.png" style="width:100%; height:100%"></a>
                        </tag>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials/auth_check')
@endsection
