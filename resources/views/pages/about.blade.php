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

                    Real-Time Sports primarily focuses on delivering live NBA streams and will gradually evolve to deliver all sorts of sporting content as well as content from services like HBO, Netflix, Amazon, etc. The focal point of the platform is device availability and the ease of use. Our page is operational on all platforms: Windows, Android, IoS, SmartTV, Linux. If you have trouble viewing the streams, please let us know.

                    <br>
                    <br>

                    Pricing for the access to all NBA games right now stands at 8e for a monthly subscription and 30e for a season pass.

                    <br>
                    <br>

                    We are still in the beta phase, so any and all suggestions are welcomed. Feel free to contact us using the form on the appropriate page or by sending us an email to info@rtsports.us .
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
