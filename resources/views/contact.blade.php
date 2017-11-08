@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Schedule</div>

                <div class="panel-body" style="height:90%">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Coming soon
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
