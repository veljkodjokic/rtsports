@extends('layouts.app')

@section('content')


</div>
<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $show->name }} Season {{ $episode->season }} Episode {{ $episode->number }}</div>

                <div class="panel-body" style="height:90%">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <video id="video" width="100%" height="50%" style="margin:0 auto;" src="https://rtsportsbackend.work/video/{{ $episode->source }}" type="video/mp4" controls></video>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials/auth_check')
@endsection
