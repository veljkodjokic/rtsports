@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="border-bottom: 10px;"></div>

                <div class="panel-body" style="height:90%">
        
                    <iframe width="100%" height="500" style="margin:0 auto;" src="{{ $video }}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>

                </div>
            </div>
        </div>
    </div>
</div>

@include('partials/auth_check')
@endsection
