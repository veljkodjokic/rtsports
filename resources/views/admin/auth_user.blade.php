@extends('layouts.app')

@section('content')

<style type="text/css">
  .panel-body {
    height:90%; 
    color: #636b6f;
    font-family: 'Raleway', sans-serif;
    font-weight: 70; 
    font-size: 18pt; 
    text-align: left; 
    overflow-x: scroll;
  }

    @media only screen and (max-width: 1000px) {
    .panel-body {
    font-size: 11pt;
    font-weight: 35;
  }
}
  </style>

<div class="container">
    <div class="row">
      
            <div class="panel panel-default">
                <div class="panel-heading">All Authenticated Users</div>

                <div class="panel-body">

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
                          <td>@if($user->Paid()) Paid @else Not paid @endif</td>
                        </tr>
                      @endforeach
                    </table>

                </div>
            </div>
      
    </div>
</div>
@include('partials/auth_check')
@endsection
