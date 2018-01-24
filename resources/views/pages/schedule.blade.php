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
    font-size: 17pt; 
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

                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <table style="border-collapse: collapse; width: 100%; ">
                      @if(\Auth::user()->admin)
                      {!! Form::open(['url'=>'/admin/add_event', 'method'=>'POST']) !!}
                      {!! Form::hidden('sport','nba') !!}
                      <tr>
                        <th>NBA</th>
                      </tr>
                      <tr>
                        <td>{!! Form::text('day','',['id'=>'day', 'style'=>'max-width:150px;', 'placeholder'=>'Date']) !!}</td>
                        <td>{!! Form::text('time','',['id'=>'hour', 'style'=>'max-width:150px;', 'placeholder'=>'Time']) !!}</td>
                        <td>{!! Form::select('team1',$teams,['id'=>'team1', 'style'=>'max-width:150px;', 'placeholder'=>'Visiting Team']) !!}</td>
                        <td>@</td>
                        <td>{!! Form::select('team2',$teams,['id'=>'team2', 'style'=>'max-width:150px;', 'placeholder'=>'Home Team']) !!}</td>
                        <td>{!! Form::select('live',[1=>'live',0=>'replay'],['id'=>'live', 'style'=>'max-width:100px;']) !!}</td>
                        <td>ON</td>
                        <td>{!! Form::select('stream',$range,['style'=>'max-width:150px;', 'placeholder'=>'']) !!}</td>
                        <td>{!! Form::submit('ADD',['style'=>'color:green;']) !!}</td>
                      </tr>
                      {!! Form::close() !!}

                      {!! Form::open(['url'=>'/admin/add_event', 'method'=>'POST']) !!}
                      {!! Form::hidden('sport','nhl') !!}
                      <tr>
                        <th>NHL</th>
                      </tr>
                      <tr>
                        <td>{!! Form::text('day','',['id'=>'day1', 'style'=>'max-width:150px;', 'placeholder'=>'Date']) !!}</td>
                        <td>{!! Form::text('time','',['id'=>'hour', 'style'=>'max-width:150px;', 'placeholder'=>'Time']) !!}</td>
                        <td>{!! Form::select('team1',$teams1,['id'=>'team1', 'style'=>'max-width:150px;', 'placeholder'=>'Visiting Team']) !!}</td>
                        <td>@</td>
                        <td>{!! Form::select('team2',$teams1,['id'=>'team2', 'style'=>'max-width:150px;', 'placeholder'=>'Home Team']) !!}</td>
                        <td>{!! Form::select('live',[1=>'live',0=>'replay'],['id'=>'live', 'style'=>'max-width:100px;']) !!}</td>
                        <td>ON</td>
                        <td>{!! Form::select('stream',$range,['style'=>'max-width:150px;', 'placeholder'=>'']) !!}</td>
                        <td>{!! Form::submit('ADD',['style'=>'color:green;']) !!}</td>
                      </tr>
                      {!! Form::close() !!}

                      {!! Form::open(['url'=>'/admin/add_event', 'method'=>'POST','enctype' => 'multipart/form-data']) !!}
                      {!! Form::hidden('sport','ufc') !!}
                      <tr>
                        <th>UFC</th>
                      </tr>
                      <tr>
                        <td colspan="9">
                          <table style="border-collapse: collapse; width: 100%; ">
                            <tr>
                              <td>{!! Form::text('day','',['id'=>'day2', 'style'=>'max-width:150px;', 'placeholder'=>'Date']) !!}</td>
                              <td>{!! Form::text('time','',['id'=>'hour', 'style'=>'max-width:150px;', 'placeholder'=>'Time']) !!}</td>
                              <td>{!! Form::text('title','',['id'=>'title', 'style'=>'width:300px;', 'placeholder'=>'Title']) !!}</td>
                              <td style="overflow: hidden; max-width: 100px;">{!! Form::file('cover','',['id'=>'cover', 'style'=>'max-width:150px;', 'placeholder'=>'Select cover']) !!}</td>
                              <td colspan="2">{!! Form::select('live',[1=>'live',0=>'replay'],['id'=>'live', 'style'=>'max-width:100px;']) !!}</td>
                              <td>ON</td>
                              <td>{!! Form::select('stream',$range,['style'=>'max-width:150px;', 'placeholder'=>'']) !!}</td>
                              <td>{!! Form::submit('ADD',['style'=>'color:green;']) !!}</td>
                            </tr>
                          </table>
                        </td>
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
                      $sport=$event->sport;
                      if($sport == 'nba' || $sport == 'nhl'){
                      $team1=App\Team::where('team',$event->team1)->get()[0]['name'];
                      $team2=App\Team::where('team',$event->team2)->get()[0]['name'];

                      $png1=App\Team::where('team',$event->team1)->get()[0]['team'];
                      $png2=App\Team::where('team',$event->team2)->get()[0]['team'];
                      }
                      @endphp
                      @if($event->Relevant())
                        <tr>
                          <td>{{ $weekday }} {{ $date }}</td>
                          <td>{{ $hour }}</td>
                          @if($sport == 'ufc')
                              <td style="text-align: center;">{{ $event->team1 }}</td>
                              <td colspan="2"><img src="/pics/ufc/{{ $event->team2 }}" style="width: 200px; height: 70px;"></td>
                          @else
                            <td style="text-align: center;"><img @if($sport == 'nhl') src="/pics/nhl_teams/{{ $png1 }}.png" @else src="/pics/teams/{{ $png1 }}.png" @endif><br>{{ $team1 }}</td>
                            <td style="font-weight: 50; font-size: 25pt;">@</td>
                            <td style="text-align: center;"><img @if($sport == 'nhl') src="/pics/nhl_teams/{{ $png2 }}.png" @else src="/pics/teams/{{ $png2 }}.png" @endif><br>{{ $team2 }}</td>
                          @endif
                          <td style="text-align: left; color: red;">@if($event->live) LIVE @else REPLAY @endif</td>
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
<script type="text/javascript">
  $(function() {
    $( "#day1" ).datepicker({
      changeMonth: true,
      changeYear: true,
      format: 'yyyy-m-d'
    });
  });
</script> 
<script type="text/javascript">
  $(function() {
    $( "#day2" ).datepicker({
      changeMonth: true,
      changeYear: true,
      format: 'yyyy-m-d'
    });
  });
</script>  
@include('partials/auth_check')
@endsection
