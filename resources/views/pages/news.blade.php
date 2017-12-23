@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">News</div>
                <div class="panel-body" style="height:90%;">
                    <div style="width: 90%; border: 3px solid #3186DB; position: relative; margin: 0 auto; border-radius: 10px; font-size: 15pt; text-align: center;"><b>{{ $feed->get_description() }}</b></div><br> 
                    @php 
                        $feed=$feed->get_items(); 
                    @endphp

                    @for($i = 0; $i < 30; $i++)

                    @if($i < 10)
                        <a href="{{ $feed[$i]->get_permalink() }}"><b style="font-size: 15pt;">{{ $feed[$i]->get_title() }}</b></a><br>
                        {{ $feed[$i]->get_description() }}<br>
                        {{ $feed[$i]->get_date() }}<br><br>
                    @endif

                        <a href="{{ $feed1[$i]->get_permalink() }}"><b style="font-size: 15pt;">{{ $feed1[$i]->get_title() }}</b></a><br>
                        {{ $feed1[$i]->get_description() }}<br>
                        {{ $feed1[$i]->get_date() }}<br><br>
                    @endfor
                </div>
            </div>
        </div>
</div>
@include('partials/auth_check')

@endsection
