@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Authenticated Users</div>

                <div class="panel-body" style="height:90% color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 70; font-size: 18pt; text-align: left;">
                <ul>
                    @foreach($users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials/auth_check')
@endsection
