@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Resend Verification Email</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/resend">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Resend
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(Session::has('alrd'))
<script type="text/javascript">
        swal ( "Oops!" ,  "The email address you entered is already verified" ,  "error" )
</script>
@endif
@if(Session::has('nope'))
<script type="text/javascript">
        swal ( "Oops!" ,  "The email address you entered doesn't match our records" ,  "error" )
</script>
@endif
@if(Session::has('succs'))
<script type="text/javascript">
        swal ( " " , "An email has been resent to your address with the activation link enclosed in it. In order to activate your account, please click on that link. If you do not see the email, check the spam box just in case your carrier mistook it as a spam" ,  "success" )
</script>
@endif
@endsection
