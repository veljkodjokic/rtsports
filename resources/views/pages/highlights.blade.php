@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Videos & Highlights  {!! Form::text('requirement',null,['class' => 'form-control','placeholder'=> 'Search videos','id'=>'search_bar','onkeydown'=>'down()','onkeyup'=>'up()','style'=>'width:30%; float:right; margin-top:-7px;']) !!}</div>
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

<script>
        var timer;
        function up()
        {
            timer = setTimeout(function()
            {
                var keywords = $('#search_bar').val();
                    $.post('/search_videos', {keywords: keywords}, function(markup)
                    {
                        $('.panel-body').html(markup);
                    });
            }, 500);
        }
        function down()
        {
            clearTimeout(timer);
        }
    </script>
@include('partials/auth_check')

@endsection
