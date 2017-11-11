@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Schedule</div>

                <div class="panel-body" style="height:90% color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 70; font-size: 18pt; text-align: left;">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        
                        Saturday: 
                        <ul>
                            <li>01.00 Clippers @ Pelicans on Channel 1</li>
                        
                            <li>02.00 Kings @ Knicks on Channel 2</li>
            
                            <li>02.30 Lakers @ Bucks on Channel 3</li>
            
                            <li>03.00 Magic @ Nuggets on Channel 1 (After Clippers @ Pelicans)</li>
                        </ul>
                        
                        
                        Sunday: 
                        <ul>
                            <li>21.30 Raptors @ Celtic on Channel 1</li>
                        
                            <li>22.00 Heat @ Pistons on Channel 2</li>
                        
                            <li>00.00 Rockets @ Pacers Channel 3</li>
                        
                            <li>01.00 Mavericks @ Thunder on Channel 1</li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
