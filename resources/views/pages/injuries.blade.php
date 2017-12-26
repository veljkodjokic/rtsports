@extends('layouts.app')

@section('content')
<style type="text/css">

</style>
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Player Reports</div>
                <div class="panel-body" style="height:90%;">
                    <div style="width: 90%; border: 3px solid #3186DB; position: relative; margin: 0 auto; border-radius: 10px; font-size: 15pt; text-align: center;"><b>{{ $feed->get_description() }}</b></div><br>

                    <a href="https://www.cbssports.com/nba/injuries" style="font-size: 20pt;"><img src="https://slack-imgs.com/?c=1&o1=wi75.he75.si&url=http%3A%2F%2Fsports.cbsimg.net%2Fimages%2Fcbss%2Fui5%2Fcbssportsv2_200x200.png"> <b> Full Injury List</b></a> <br><br>

                    @foreach($feed->get_items() as $item)
                        <a href="{{ $item->get_permalink() }}"><b style="font-size: 15pt;">{{ $item->get_title() }}</b></a><br>
                        {{ $item->get_description() }}<br>
                        {{ $item->get_date() }}<br><br>
                    @endforeach
                </div>
            </div>
        </div>
</div>
@include('partials/auth_check')

@endsection
