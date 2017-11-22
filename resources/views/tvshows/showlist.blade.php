@extends('layouts.app')

@section('content')

<style type="text/css">
    .organizovana{
        font-weight: 100;
        font-size: 30pt;
    }
    .neorganizovana{
        font-weight: 100;
        font-size: 20pt;
    }
</style>

<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $show->name }}</div>

                <div class="panel-body" style="height:90%">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table style="border-collapse: collapse; width: 100%; ">
                      @if(\Auth::user()->admin)
                      {!! Form::open(['url'=>'/admin/add_episode', 'method'=>'POST']) !!}
                      <tr>
                        <td>{!! Form::text('season','',['id'=>'season', 'style'=>'max-width:150px;', 'placeholder'=>'Season']) !!}</td>
                        <td>{!! Form::text('number','',['id'=>'number', 'style'=>'max-width:150px;', 'placeholder'=>'Episode']) !!}</td>
                        <td>{!! Form::text('source','',['id'=>'source', 'style'=>'max-width:150px;', 'placeholder'=>'Source']) !!}</td>
                        <td>{!! Form::hidden('show', $show->id ,['id'=>'show']) !!}</td>
                        <td>{!! Form::submit('ADD',['style'=>'color:green;']) !!}</td>
                      </tr>
                      {!! Form::close() !!}
                    </table>
                      @endif

                    <div class="organizovana">
                        @foreach($epse as $season)
                            {{ $season }}. Season
                            <ul class="neorganizovana"> 
                            @php
                                $eps = $episodes->where('season',$season);
                            @endphp
                            @foreach($eps as $episode)
                                <a href="/shows/{{ $show->id }}/{{ $episode->number }}"><li>{{ $show->name }} - Episode {{ $episode->number }}</li></a>  
                            @endforeach                              
                            </ul>
                        @endforeach
                    </div>

                </div>
            </div>
    </div>
</div>
@include('partials/auth_check')

@endsection
