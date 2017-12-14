@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My account</div>

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="text4"">E-mail:{{$user->email}}
                        {!! Form::open(['url'=>'edit_email',  'method'=>'POST' ,'id'=>'f_1']) !!}
                        {!! Form::email('email',null,['class' => 'form-control','placeholder'=> 'Enter new email']) !!}
                        {!! Form::email('email_confirmation',null,['class' => 'form-control','placeholder'=> 'Re-Enter new email']) !!}
                        {!! Form::submit('Edit', ['class'=>'btn1']) !!}
                        {!! Form::close() !!}
                    </div><br>
                    <div id="text4">Username:{{$user->name}}
                        {!! Form::open(['url'=>'edit_username',  'method'=>'POST', 'id'=>'f_2']) !!}
                        {!! Form::text('username',null,['class' => 'form-control','placeholder'=> 'Enter new username']) !!}
                        {!! Form::text('username_confirmation',null,['class' => 'form-control','placeholder'=> 'Re-Enter new username']) !!}
                        {!! Form::submit('Edit', ['class'=>'btn1']) !!}
                        {!! Form::close() !!}
                    </div><br>
                    <div id="text4">
                        Password
                        {!! Form::open(['url'=>'edit_pass',  'method'=>'POST', 'id'=>'f_3']) !!}
                        {!! Form::password('old_pass',['class' => 'form-control','placeholder'=> 'Enter current password']) !!}
                        {!! Form::password('password',['class' => 'form-control','placeholder'=> 'Enter new password']) !!}
                        {!! Form::password('password_confirmation',['class' => 'form-control','placeholder'=> 'Re-enter new password']) !!}
                        {!! Form::submit('Edit', ['class'=>'btn1']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials/acc_msgs')
@include('partials/auth_check')
@endsection
