@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading" >My subscriptions</div>

                <div class="panel-body" style="height:90% color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100; font-size: 25pt; text-align: center;">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($subs))
                        <table style="border-collapse: collapse; overflow-x: scroll; width: 100%;">
                            <tr>
                              <th>Paid on</th>
                              <th>Ends on</th>
                              <th>Type</th>
                            </tr>
                            @foreach($subs as $sub)
                            <tr>
                              <td>{{ $sub->paid_at->toDateString() }}</td>
                              <td>{{ $sub->out_at->toDateString() }}</td>
                              <td>@if($sub->type == 0) <b style="color:green;">TRIAL</b> @elseif($sub->type==1) <b style="color:gold;">Mounthly</b> @else <b style="color:red;">Season Pass</b> @endif</td>
                            </tr>
                            @endforeach
                        </table>
                    @else
                    @endif
                    @if(count($arch))
                    <br>
                        <b style="text-align: center; font-size: 30pt"> Archived Substriptions </b>
                        <table style="border-collapse: collapse; overflow-x: scroll; width: 100%;">
                            <tr>
                              <th>Paid on</th>
                              <th>Ends on</th>
                              <th>Type</th>
                            </tr>
                            @foreach($arch as $sub)
                            <tr>
                              <td>{{ $sub->paid_at->toDateString() }}</td>
                              <td>{{ $sub->out_at->toDateString() }}</td>
                              <td>@if($sub->type == 0) <b style="color:green;">TRIAL</b> @elseif($sub->type==1) <b style="color:gold;">Mounthly</b> @else <b style="color:red;">Season Pass</b> @endif</td>
                            </tr>
                            @endforeach
                        </table>
                    @endif
                    @if(!count($arch) && !count($subs))
                        <b style="text-align: center; font-size: 35pt"> No records Found </b>
                    @endif
                </div>
            </div>
    </div>
</div>
@include('partials/auth_check')
@endsection
