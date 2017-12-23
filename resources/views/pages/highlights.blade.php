@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Videos & Highlights</div>
                <div class="panel-body" style="height:90%;">
                    @for($i = 0; $i < 15; $i++)

                    @php
                        $url= Illuminate\Support\Str::substr($feed[$i]->get_permalink(), 32);
                        $url1= Illuminate\Support\Str::substr($feed1[$i]->get_permalink(), 32);
                    @endphp
                        <a href="/highlights/{{ $url }}"><b style="font-size: 15pt;">{{ $feed[$i]->get_title() }}</b></a>
                        <i class="fa fa-youtube-play" style="font-size:30px;color:red"></i><br>
                        {{ $feed[$i]->get_date() }}<br><br>

                        <a href="/highlights/{{ $url1 }}"><b style="font-size: 15pt;">{{ $feed1[$i]->get_title() }}</b></a>
                        <i class="fa fa-youtube-play" style="font-size:30px;color:red"></i><br>
                        {{ $feed1[$i]->get_date() }}<br><br>
                    @endfor
                </div>
            </div>
        </div>
</div>
@include('partials/auth_check')

@endsection
