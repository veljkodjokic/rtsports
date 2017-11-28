@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                @if(Session::has('msg'))
                                    <script type="text/javascript">
                                        swal({
                                          title: "Good job!",
                                          text: "Congratulations {!!Session::get('msg')!!}.\nYou successfully verified your email address.",
                                          icon: "success",
                                          button: "Ok!",
                                        });
                                    </script>
                                @endif

                                @if(Session::has('err_ver'))
                                <script type="text/javascript">
                                        swal ( "Permission denied!" ,  "Please verify your email address" ,  "error" )
                                </script>
                                @endif

                                @if(Session::has('ver_first'))
                                <script type="text/javascript">
                                        swal ( "Thank you for joining the RTSports team" ,  "An email has been sent to your address with the activation link enclosed in it. In order to activate your account, please click on that link. If you do not see the email, check the spam box just in case your carrier mistook it as a spam" ,  "success" )
                                </script>
                                @endif