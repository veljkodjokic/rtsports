@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        
            <div class="panel panel-default">
                <div class="panel-heading">All User Login Logs</div>

                <div class="panel-body" style="height:90% color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 70; font-size: 18pt; text-align: left; overflow-x: scroll;">

                    <table style="border-collapse: collapse; width: 100%;">
                      <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Date and Time</th>
                      </tr>
                      @foreach($logs->reverse() as $log)
                      @php
                        $user=\App\User::find($log->user);
                      @endphp
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ \Carbon\Carbon::parse($log->time)->diffForHumans() }}</td>
                        </tr>
                      @endforeach
                    </table>

                </div>
            </div>
       
    </div>
</div>
@include('partials/auth_check')
@endsection
