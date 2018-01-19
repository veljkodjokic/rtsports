@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">RTSports FAQ</div>

                <div class="panel-body" style="height:90%; color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 70; font-size: 17pt;">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <b>What is RTSports?</b><br>

                        RTSports is a sports-centric Internet streaming service with the world's most popular live sports and entertainment content. The service offers access to NBA games, NHL GAMES and UFC fight cards via TVs, tablets, mobile devices, and desktop computers.<br><br>

                    <b>What sports can I watch with RTSports?</b><br>

                        With exclusive coverage from three major sports networks, fans can look to RTSports to offer up live events from the NBA, NHL and UFC as well as other sporting events that can be requested by the users. Full coverage of specials including the All-Star Weekend, Stanley Cup Playoffs, UFC events and PPV’s, original shows and other special content not available anywhere else on the Internet. <br><br>

                    <b>What other perks does RTSports offer?</b><br>

                        Any user can request a replay of any event, whether from this or from past seasons and the request will be granted within a 24-hour window at the most. Our team has dedicated personnel that tends to your requests and personalizes your experience in order to get the best possible quality.<br><br>

                    <b>How much does RTSports cost?</b><br>

                        All new users receive 48 hours of free access to RTSports content. After your trial has ended, you use PayPal or a credit card to fulfill the order on the package you select, which start at $9.99 per month. During this launching period, we decided to give a major discount to users subscribing to the entire season and offer a $29.99 one-time fee for the remainder of the season. <br><br>

                    <b>Do I have to sign a contract?</b><br>

                        No. RTSports is a service that values your anonymity. Furthermore, your subscription will not automatically renew until you choose to do so on your account in your profile.<br><br>

                    <b>What cards can I use to signup?</b><br>
    
                        We accept both credit card and debit card payments from Visa, MasterCard, Discover and American Express, and PayPal.<br><br>

                    <b>What devices can I watch RTSports on?</b><br>
                   
                        You can watch RTSports from your mac or windows computer, iPhone, iPad, Android Phone & Tablet. You can also watch on your television with Roku, Apple TV, Chromecast and Amazon Fire TV.<br><br>

                    <b>How many devices can I simultaneously watch on?</b><br>

                        RTSports can be actively streamed on multiple devices using the same IP address.<br><br>

                    <b>How can I cancel my subscription?</b><br>

                        Cancelling your RTSports subscription is very easy – you simply let it expire. There is no automatic extension and you can choose the appropriate duration of your subscription. No phone calls or emails required.<br><br>

                    <b>Is RTSports available in my region?</b><br>

                        The RTSports service is available only Across the Globe, although content and pricing differs per country.<br><br>

                </div>
            </div>
        </div>
    </div>
</div>
@include('partials/auth_check')
@endsection
