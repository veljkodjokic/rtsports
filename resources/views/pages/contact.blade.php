@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Contact us</div>

                <div class="panel-body" style="height:90%; color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100; font-size: 20pt; text-align: center;">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="about_us_content">
                        {!! Form::open(['url'=>'contact', 'method'=>'POST']) !!}
                        {!! Form::label('content','Your message') !!}
                        {!! Form::textarea('content','',['id'=>'about_content','style'=>'height: 200px;width: 99%;position: relative; resize:none;']) !!}
                        {!! Form::label('category','Category:') !!}
                        {!! Form::select('category',['General'=>'General','Sales and Accounting'=>'Sales and Accounting','Report a Problem'=>'Report a Problem']) !!} <br>
                        {!! Form::submit('SEND',['class'=>'btn1', 'id'=>'static_save']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                @if(Session::has('succs'))
                                    <script type="text/javascript">
                                        swal({
                                          title: "Thank you for contacting us",
                                          text: "We'll be sure to get back to you as soon as possible.",
                                          icon: "success",
                                          button: "Ok!",
                                        });
                                    </script>
                            @endif
            </div>
    </div>
</div>
@include('partials/auth_check')
@endsection
