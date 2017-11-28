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
                <div class="panel-heading">All User Login Logs</div>
                <div class="panel-body" id="inflate-content">
                  <div style="margin-left: 60%; position: relative;">
                    @if(\Auth::user()->admin)
                        {!! Form::submit('ORDER ASC',['style'=>'color:green;', 'onclick'=>'asc()']) !!}
                        {!! Form::submit('ORDER DESC',['style'=>'color:green;', 'onclick'=>'desc()']) !!}
                    @endif
                    </div>
                    <table style="border-collapse: collapse; width: 100%;">
                      <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Date and Time</th>
                        <th>IP</th>
                      </tr>
                      @foreach($logs->reverse() as $log)
                      @php
                        $user=\App\User::find($log->user);
                      @endphp
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ \Carbon\Carbon::parse($log->time)->diffForHumans() }}</td>
                          <td>{{ $log->ip }}</td>
                        </tr>
                      @endforeach
                    </table>
                  </div>
                </div>
            </div>
       
    </div>
</div>

<script type="text/javascript">
  function asc()
  {
    $.post('/admin/search_logsa', function(markup)
    {
        $('#inflate-content').html(markup);
    });
  };

  function desc()
  {
    $.post('/admin/search_logsd', function(markup)
    {
        $('#inflate-content').html(markup);
    });
  };
</script>

@include('partials/auth_check')
@endsection
