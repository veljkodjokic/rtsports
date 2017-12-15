@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/account">My Account</a> > Finances</div>
                <div class="panel-body">

                    FINANCES

                </div>
            </div>
        </div>
</div>
@include('partials/auth_check')

@endsection
