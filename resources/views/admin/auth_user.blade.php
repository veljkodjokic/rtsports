@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Authenticated Users</div>

                <div class="panel-body" style="height:90% color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 70; font-size: 18pt; text-align: left;  overflow-x: scroll;">

                    <table style="border-collapse: collapse; width: 100%;">
                      <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Payment</th>
                      </tr>
                      @foreach($users as $user)
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>@if($user->status) Verified @else Not verified @endif</td>
                          <td>@if($user->paid) Paid @else Not paid @endif</td>
                        </tr>
                      @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@include('partials/auth_check')
@endsection
