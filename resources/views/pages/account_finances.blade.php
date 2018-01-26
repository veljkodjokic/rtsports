@extends('layouts.app')

@section('content')
<style type="text/css">
    .card-container{
        width:200px;
        height:200px;
        position: relative;
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
                <div class="panel-heading"><a href="/account">My Account</a> > Finances</div>
                <div class="panel-body">
                	<div style="width: 90%; border: 3px solid orange; position: relative; margin: 0 auto; border-radius: 10px; font-size: 15pt; text-align: center;"><b>Make sure to fund your subscription with a paypal account that uses the same email address as your on platform account or to contact us through our <a href="/contact">Contact Us</a> page using the "Sales and Accounting" tag and send us the paypal account details so we can link your payment to your account.</b></div>
                	<table>
                	  <tr>
                        <th style="text-align: center; font-size: 20pt;">Methods</th>
                        <th></th>
                      </tr>
                      <tr>
                        <td rowspan=2><div class="card-container">
                        <div id="card">
                            <img src="/pics/paypal.png" class="img-card">
                        </div>
                    </div></td>

                        <td style="font-size: 20pt; text-align: center;"><b><a href="https://www.paypal.me/RTSports/9.99">Monthly Subscription $9.99/m</a></b></td>
                      </tr>
                      <tr>
                      	<td style="font-size: 20pt; text-align: center;"><b><a href="https://www.paypal.me/RTSports/29.99">Season Pass $29.99</a></b></td>
                      </tr>

                      <tr>
                        <td rowspan=3>
                            <div class="card-container">
                                <div id="card">
                                    <img src="/pics/bitcoin.png" class="img-card">
                                </div>
                            </div>
                        </td>

                        <td style="font-size: 20pt;"><b style="color: black">BTC: 3CG5Nb6QmMvzRFrxs85m1qzUyGmE7yx8f7</b><a href="#" style="font-size: 15pt" onclick="btc()"> Scan the QR code</a></td>
                      </tr>
                      <tr>
                        <td style="font-size: 20pt;"><b style="color: black">ETH: 0xd7accbb54d30004dc2ecec05898aea99ef3bc846</b><a href="#" href="#" style="font-size: 15pt" onclick="eth()"> Scan the QR code</a></td>
                      </tr>
                      <tr>
                        <td style="font-size: 20pt;"><b style="color: black">XPR:  rE1sdh25BJQ3qFwngiTBwaq3zPGGYcrjp1<br>XPR Destination Tag: 37069</b><a href="#" href="#" style="font-size: 15pt" onclick="xpr()"> Scan the QR code</a></td>
                      </tr>
                	</table>
                    

                </div>
            </div>
        </div>
</div>
@include('partials/auth_check')

<script type="text/javascript">
    function btc(){
        swal({
            width: 350,
            padding: 350,
            background: 'url(https://rtsports.us/pics/btcqr.png)'
        });
    }

    function eth(){
        swal('eth');
    }

    function xpr(){
        swal('xpr');
    }
</script>

@endsection
