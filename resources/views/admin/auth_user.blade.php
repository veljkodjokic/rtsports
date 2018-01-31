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
                          <td>@if($user->Paid()) <a href="#" onclick="rem_sub('{{ $user->email }}')" style="color:red;"> @if($user->getSub()->type == 0) Trial @elseif($user->getSub()->type == 1) Monthly @else Season Pass @endif</a> @else <a href="#" onclick="add_sub('{{ $user->email }}')" @if($user->payment) style="color:orange;" @else style="color:green;" @endif>Not paid </a>@endif</td>
                          {!! Form::open(['url'=>'/admin/del_user', 'method'=>'POST']) !!}
                          {!! Form::hidden('id', $user->id ) !!}
                          <td>{!! Form::submit('DEL',['style'=>'color:red;']) !!}</td>
                          {!! Form::close() !!}
                        </tr>
                      @endforeach
                    </table>

                </div>
            </div>
      
    </div>
</div>

@if(Session::has('usr_del'))
<script type="text/javascript">
        swal ( " " ,  "You have successfully deleted a user!" ,  "success" )
</script>
@endif

@include('partials.add_sub')

@include('partials/auth_check')
@endsection
