<!DOCTYPE html>
<html lang="fr">
<head>
	<title>MADELIS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link rel="shortcut icon" href="{{asset("favicon.jpeg")}}" type="image/jpeg">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-template/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-template/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-template/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login-template/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-template/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-template/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login-template/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-template/css/util.css">
	<link rel="stylesheet" type="text/css" href="login-template/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}">
                        @csrf
					<span class="login100-form-title p-b-51">
						CONNEXION
                    </span>
                    @include('layouts.successError')
                    
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Votre username est obligatoire">
						<input class="input100" type="text" name="login" value="{{ old('username') ?: old('email') }}" placeholder="Username ou Email">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Votre mot de passe est obligatoire">
						<input class="input100" type="password" name="password" placeholder="Mot de passe">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						

						<div>
                            
                            @if (Route::has('password.request'))
                                <a class="txt1" href="{{ route('password.request') }}">
                                    Mot de passe oublié ?
                                </a>
                            @endif
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Connexion
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="login-template/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login-template/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login-template/vendor/bootstrap/js/popper.js"></script>
	<script src="login-template/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login-template/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login-template/vendor/daterangepicker/moment.min.js"></script>
	<script src="login-template/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login-template/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login-template/js/main.js"></script>

</body>
</html>