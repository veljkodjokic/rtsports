@extends('layouts.app')

@section('content')
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Schedule</div>

                <div class="panel-body" style="height:90% color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 70; font-size: 18pt; text-align: left; overflow-x: scroll;">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table style="border-collapse: collapse; width: 100%; ">
                      @if(\Auth::user()->admin)
                      {!! Form::open(['url'=>'/admin/add_event', 'method'=>'POST']) !!}
                      <tr>
                        <td>{!! Form::date('day','',['id'=>'day', 'style'=>'max-width:150px;', 'placeholder'=>'Date']) !!}</td>
                        <td>{!! Form::text('time','',['id'=>'hour', 'style'=>'max-width:150px;', 'placeholder'=>'Time']) !!}</td>
                        <td>{!! Form::text('team1','',['id'=>'team1', 'style'=>'max-width:150px;', 'placeholder'=>'HomeTeam']) !!}</td>
                        <td>@</td>
                        <td>{!! Form::text('team2','',['id'=>'team2', 'style'=>'max-width:150px;', 'placeholder'=>'VisitingTeam']) !!}</td>
                        <td>ON</td>
                        <td>{!! Form::select('stream',['1'=>'1','2'=>'2','3'=>'3'],['style'=>'max-width:150px;', 'placeholder'=>'']) !!}</td>
                        <td>{!! Form::submit('ADD',['style'=>'color:green;']) !!}</td>
                      </tr>
                      {!! Form::close() !!}
                      @endif

                      @foreach($events as $event)
                      @php
                      $stream=$event->stream()->first();

                      $weekMap = [
                          0 => 'Nedelja',
                          1 => 'Ponedeljak',
                          2 => 'Utorak',
                          3 => 'Sreda',
                          4 => 'Cetvrtak',
                          5 => 'Petak',
                          6 => 'Subota',
                      ];
                      $dayOfTheWeek = \Carbon\Carbon::parse($event->day)->dayOfWeek;
                      $hour = \Carbon\Carbon::parse($event->time)->format('H:i');
                      $weekday = $weekMap[$dayOfTheWeek];
                      $date = \Carbon\Carbon::parse($event->day)->format('d. M');
                      @endphp

                        <tr>
                          <td>{{ $weekday }} {{ $date }}</td>
                          <td>{{ $hour }}</td>
                          <td>{{ $event->team1 }}</td>
                          <td>@</td>
                          <td>{{ $event->team2 }}</td>
                          <td>ON</td>
                          <td>Channel #{{ $stream->id }}</td>
                      @if(\Auth::user()->admin)

                          {!! Form::open(['url'=>'/admin/del_event', 'method'=>'POST']) !!}
                          {!! Form::hidden('id', $event->id ) !!}
                          <td>{!! Form::submit('DEL',['style'=>'color:red;']) !!}</td>
                          {!! Form::close() !!}
                      @endif
                        </tr>
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
