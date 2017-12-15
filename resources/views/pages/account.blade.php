@extends('layouts.app')

@section('content')
<style type="text/css">
    .card-container{
        width:200px;
        height:250px;
        margin-left: 10%;
        position: relative;
    }

    .card-text{
        width:200px;
        height:50px;
        position: relative;
        text-align: center;
        font-size: 30px;
        white-space:nowrap;
    }

    .img-card{
        width:200px;
        height:200px;
    }

    #card{
        max-height: 200px;
        max-width:200px;
    }

    @media only screen and (max-width: 770px) {
        .card-container{
            margin: 0 auto;
        }
    }

    @media only screen and (min-width: 770px) {
        .card-container{
            display: inline-block;
        }
    }
}
</style>
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">My Account</div>
                <div class="panel-body">

                    <div class="card-container">
                        <div id="card">
                            <a href="/account/settings">
                                <img src="/pics/settings.png" class="img-card">
                                <div class="card-text"><b>Settings</b></div>
                            </a>
                        </div>
                    </div>

                    <div class="card-container">
                        <div id="card">
                            <a href="/account/finances">
                                <img src="/pics/dollar.png" class="img-card">
                                <div class="card-text"><b>Finances</b></div>
                            </a>
                        </div>
                    </div>

                    <div class="card-container">
                        <div id="card">
                            <a href="/account/delete">
                                <img src="/pics/trash.png" class="img-card">
                                <div class="card-text"><b style="font-size: 25px">Delete Account</b></div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
@include('partials/auth_check')

@endsection
