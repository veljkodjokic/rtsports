@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" >My subscriptions</div>

                <div class="panel-body" style="height:90% color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100; font-size: 40pt; text-align: center;">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Coming soon
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials/auth_check')
@endsection
