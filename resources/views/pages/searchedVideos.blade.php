@if($searchVideos)
@foreach($searchVideos as $video)
	@php
	    $url= Illuminate\Support\Str::substr($video->get_permalink(), 32);
	@endphp
    <a href="/highlights/{{ $url }}"><b style="font-size: 15pt;">{{ $video->get_title() }}</b></a>
    <i class="fa fa-youtube-play" style="font-size:30px;color:red"></i><br>
    {{ $video->get_date() }}<br><br>
@endforeach
@else
	<p style="margin: auto 0; text-align: center; font-size: 40pt;">NO VIDEOS FOUND</p>
@endif