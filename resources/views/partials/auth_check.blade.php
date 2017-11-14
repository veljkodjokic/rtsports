<script type="text/javascript">
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    
    $(document).ready(function(){
        setInterval(function(){
            $.ajax({ 
                type: 'POST', 
                url: '/check_exp', 
                success: function(data){
                    if(data == null){}

                    if(data == '/')
                        window.location='/';
                },
                error: function()
                {
                    window.location='/';
                }
});
    },1*60*1000);
});
    </script>