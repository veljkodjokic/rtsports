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
                <div class="panel-heading">Edit Stream Sources</div>

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table style="border-collapse: collapse; width: 100%; ">
                      @foreach($streams as $stream)
                      {!! Form::open(['url'=>'/admin/edit_stream', 'method'=>'POST']) !!}
                      <tr>
                        <td>{{ $stream->id }}.</td>
                        {!! Form::hidden('id',$stream->id) !!}
                        <td>{!! Form::text('source',$stream->source,['id'=>'source','style'=>'width:90%', 'placeholder'=>'Date']) !!}</td>
                        <td>{!! Form::submit('Update',['style'=>'color:green;']) !!}</td>
                      </tr>
                      {!! Form::close() !!}
                      @php $zid=$stream->id; @endphp
                      @endforeach
                      <tr>
                        {!! Form::open(['url'=>'/admin/add_stream', 'method'=>'POST']) !!}
                        <td>{{ $zid+1 }}</td>
                        <td>{!! Form::text('source',' ',['id'=>'source','style'=>'width:90%', 'placeholder'=>'Stream Source']) !!}</td>
                        <td>{!! Form::submit('Add',['style'=>'color:green;']) !!}</td>
                        {!! Form::close() !!}
                      </tr>
                    </table>
                </div>
            </div>
    </div>
</div> 

@if(Session::has('succs'))
<script type="text/javascript">
        swal ( " " ,  "Source updated successfully" ,  "success" )
</script>
@endif

@if(Session::has('add_src'))
<script type="text/javascript">
        swal ( " " ,  "Stream added successfully" ,  "success" )
</script>
@endif

@include('partials/auth_check')
@endsection
