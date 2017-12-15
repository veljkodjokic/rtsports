@if(Session::has('sucs_email'))
<script type="text/javascript">
        swal ( " " , "You successfully changed your email address!" ,  "success" )
</script>
@endif

@if(Session::has('err_email'))
<script type="text/javascript">
        swal ( "Whoops!" , "Email adresses you entered don't match!" ,  "error" )
</script>
@endif

@if(Session::has('sucs_name'))
<script type="text/javascript">
        swal ( " " , "You successfully changed your username!" ,  "success" )
</script>
@endif

@if(Session::has('pass_edited'))
<script type="text/javascript">
        swal ( " " , "You successfully changed your password!" ,  "success" )
</script>
@endif

@if(Session::has('err_name'))
<script type="text/javascript">
        swal ( "Whoops!" , "Usernames you entered don't match!" ,  "error" )
</script>
@endif

@if(Session::has('err_pass'))
<script type="text/javascript">
        swal ( "Whoops!" , "There seems to be a problem with the password you entered. Password must be at least 6 characters long." ,  "error" )
</script>
@endif

@if(Session::has('pass_fail'))
<script type="text/javascript">
        swal ( "Whoops!" , "The password you entered is incorrect!" ,  "error" )
</script>
@endif

@if(Session::has('fail_email'))
<script type="text/javascript">
        swal ( "Whoops!" , "The email address you entered is already in use!" ,  "error" )
</script>
@endif