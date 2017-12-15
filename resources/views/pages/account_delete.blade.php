@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/account">My Account</a> > Delete</div>

                <div class="panel-body">
                    <form class="form-horizontal" id="myForm" method="POST" action="/delete_acc">
                        {{ csrf_field() }}

                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6" style="margin-bottom: 10px;">
                                <input id="email" type="email" class="form-control" name="email" required autofocus>
                            </div><br>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" id="send" onclick="are_you()" class="btn btn-primary" style="background-color: #f44242; color: black">
                                    DELETE ACCOUNT
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	document.getElementById("send").addEventListener("click", function(event){
    event.preventDefault()
	});
	function are_you()
	{
		swal({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!',
		  cancelButtonText: 'No, cancel!',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: false,
		  reverseButtons: true
		}).then((result) => {
		  if (result.value) {
		  	 document.getElementById("myForm").submit(); 
		  } else if (result.dismiss === 'cancel') {
		    swal(
		      'Cancelled',
		      'Your account is safe :)',
		      'error'
		    )
		  }
		})
	}
</script>

@if ($errors->any())
    <script type="text/javascript">
    	swal ( "There seems to be a problem with your input." ," @foreach ($errors->all() as $error) {{ $error }} @endforeach ",  "error");
    </script>
@endif

@if(Session::has('email_err'))
<script type="text/javascript">
        swal ( "There seems to be a problem with your input." ,  "The email address you entered does not belong to your account." ,  "error" )
</script>
@endif

@if(Session::has('email_pass'))
<script type="text/javascript">
        swal ( "Password is incorrect" ,  " " ,  "error" )
</script>
@endif

@include('partials/auth_check')

@endsection
