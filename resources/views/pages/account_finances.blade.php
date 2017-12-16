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

                        <td style="font-size: 20pt; text-align: center;"><b><a href="https://www.paypal.me/MarkoLipozencic/9.99">Monthly Subscription $9.99/m</a></b></td>
                      </tr>
                      <tr>
                      	<td style="font-size: 20pt; text-align: center;"><b><a href="https://www.paypal.me/MarkoLipozencic/29.99">Season Pass $29.99</a></b></td>
                      </tr>
                	</table>
                    

                </div>
            </div>
        </div>
</div>
@include('partials/auth_check')

@endsection
