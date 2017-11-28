@extends('layouts.app')

@section('content')
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
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

  .col-md-offset-2{
    margin-left: 0%;
  }
}
  </style>

<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Schedule</div>

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table style="border-collapse: collapse; width: 100%; ">
                      @if(\Auth::user()->admin)
                      {!! Form::open(['url'=>'/admin/add_event', 'method'=>'POST']) !!}
                      <tr>
                        <td>{!! Form::text('day','',['id'=>'day', 'style'=>'max-width:150px;', 'placeholder'=>'Date']) !!}</td>
                        <td>{!! Form::text('time','',['id'=>'hour', 'style'=>'max-width:150px;', 'placeholder'=>'Time']) !!}</td>
                        <td>{!! Form::text('team1','',['id'=>'team1', 'style'=>'max-width:150px;', 'placeholder'=>'Visiting Team']) !!}</td>
                        <td>@</td>
                        <td>{!! Form::text('team2','',['id'=>'team2', 'style'=>'max-width:150px;', 'placeholder'=>'Home Team']) !!}</td>
                        <td>ON</td>
                        <td>{!! Form::select('stream',$range,['style'=>'max-width:150px;', 'placeholder'=>'']) !!}</td>
                        <td>{!! Form::submit('ADD',['style'=>'color:green;']) !!}</td>
                      </tr>
                      {!! Form::close() !!}
                      @endif

                      @foreach($events as $event)
                      @php
                      $stream=$event->stream()->first();

                      $weekMap = [
                          0 => 'Sunday',
                          1 => 'Monday',
                          2 => 'Tuesday',
                          3 => 'Wednesday',
                          4 => 'Thursday',
                          5 => 'Friday',
                          6 => 'Saturday',
                      ];
                      $dayOfTheWeek = \Carbon\Carbon::parse($event->day)->dayOfWeek;
                      $hour = \Carbon\Carbon::parse($event->time)->format('H:i');
                      $weekday = $weekMap[$dayOfTheWeek];
                      $date = \Carbon\Carbon::parse($event->day)->format('d. M');
                      @endphp
                      @if($event->Relevant())
                        <tr>
                          <td>{{ $weekday }} {{ $date }}</td>
                          <td>{{ $hour }}</td>
                          <td>{{ $event->team1 }}</td>
                          <td>@</td>
                          <td>{{ $event->team2 }}</td>
                          <td style="text-align: left;">ON</td>
                          <td><a href="/game{{ $event->stream_id }}">Channel#{{ $stream->id }}</a></td>
                      @if(\Auth::user()->admin)

                          {!! Form::open(['url'=>'/admin/del_event', 'method'=>'POST']) !!}
                          {!! Form::hidden('id', $event->id ) !!}
                          <td>{!! Form::submit('DEL',['style'=>'color:red;']) !!}</td>
                          {!! Form::close() !!}
                      @endif
                        </tr>
                      @endif
                      @endforeach
                    </table>

                </div>
            </div>
    </div>
</div>

<script type="text/javascript">
  $(function() {
    $( "#day" ).datepicker({
      changeMonth: true,
      changeYear: true,
      format: 'yyyy-m-d'
    });
  });
</script>  
@include('partials/auth_check')
@endsection
