@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="kvadrat">
                        <tag>
                            <a  href="{{url('/game1')}}"><img src="pics/game1.jpg"></a>
                        </tag>
                    </div>

                    <div id="kvadrat">
                        <tag>
                            <a  href="{{url('/game2')}}"><img src="pics/game2.jpg"></a>
                        </tag>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
