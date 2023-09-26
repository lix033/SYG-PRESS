<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>LOGIN RECEPT PRESS</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'><link rel="stylesheet" href="{{ asset('themesing/stylelogin.css') }}">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" action="{{ route('connexion.action.recep') }}" method="POST">
				@foreach ($errors->all() as $error)
				<div class="alert alert-danger">{{ $error }}</div>
				@endforeach
				@csrf
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" placeholder="Identifiant" name="identifiant">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" placeholder="Mot de passe" name="password">
				</div>
				<button class="button login__submit">
					<span class="button__text">Se connecter</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">
				<h3>log in RECEPT</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
<!-- partial -->
  
</body>
</html>
