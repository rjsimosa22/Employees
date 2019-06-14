<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>SITAWEB</title>

        <!-- Ccs -->
        <link href="css/util.css" rel="stylesheet" type="text/css">
        <link href="css/main.css" type="text/css" rel="stylesheet">
        
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600">
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" id="bootstrap-css">
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">      
                <div class="login100-more" style="background-image: url('img/banner.svg');"></div>
        
                <div class="wrap-login100">
                    <table border='0px' width='100%'>
                        <tr height='300px'><td valign='top'><img src="img/logo.svg" width="310px"></td></tr>

                        <tr height='300px' style="background:#fff;" align="center" valing='top'>
                            <td valign='top'>
                                <div class="login-form">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                        <span><i class="fa fa-window-minimize" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                    </div>
                                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="USUARIO" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                                    </div>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="CLAVE" autocomplete="current-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                                </div>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-black col-md-11">{{ __('INGRESAR') }} </button>
                                    </form>
                                </div>
                        
                                <br>
                                <p style="font-size:17px;color:#333;">Sistema de Gestión de Talleres <br/> Automotrices</p>   
                            </td>   
                        </tr>
                    </table>    
                </div>
            </div>
        </div>
    </body>   
</html>