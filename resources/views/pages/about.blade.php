@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">About us</div>

                <div class="panel-body" style="height:90%; color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 70; font-size: 17pt; text-align: center;">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        We are still in the beta phase, so any and all suggestions are welcomed. Feel free to contact us using the form on the appropriate page or by sending us an email to info@rtsports.us.
                        <br>
                        <br>
Real-Time Sports is a brand new sports streaming platform that provides high-quality streams for all sorts of sports. The main idea behind the platform is device availability. We designed the entire platform looking to avoid unnecessary plugins and programs, applications and hardware. The result is a sports streaming service that everyone can use regardless of the device and the operating system. Our service is operational on all platforms: Windows, Android, IoS, SmartTV, Linux. If you have trouble viewing the streams, please let us know.
<br><br>
The schedule for all streams can be found on the appropriate page and we intend to introduce other sports as well. You can also request specific event streaming and send us an email to requests@rtsports.us
<br><br>
If you are interested in getting a subscription to our service, send us an email and we will offer you the most competitive price for the desired package. For all information regarding pricing, contact us using the form on the appropriate page or by sending us an email to sales@rtsports.us.
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials/auth_check')
@endsection
