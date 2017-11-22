@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">TV Shows</div>

                <div class="panel-body" style="height:90%">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($shows as $show)
                    <div id="show_program">
                        <tag>
                            <a  href="/shows/{{ $show->id }}"><img src="/pics/shows/{{ $show->cover }}" style="width:100%; height:100%"></a>
                        </tag>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</div>
@include('partials/auth_check')

@endsection
