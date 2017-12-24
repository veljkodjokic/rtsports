@foreach($searchVideos as $video)

                    @php
                        $url= Illuminate\Support\Str::substr($video->get_permalink(), 32);
                    @endphp
                        <a href="/highlights/{{ $url }}"><b style="font-size: 15pt;">{{ $video->get_title() }}</b></a>
                        <i class="fa fa-youtube-play" style="font-size:30px;color:red"></i><br>
                        {{ $video->get_date() }}<br><br>
                    @endforeach