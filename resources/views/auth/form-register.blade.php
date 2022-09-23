<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('login/css/style.css')}}">

	</head>
	<body class="img js-fullheight" style="background-image: url({{asset('login/images/bg.jpg')}});">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Register</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	{{-- <h3 class="mb-4 text-center">Have an account?</h3> --}}
		      	<form action="{{ route('auth.postRegister') }}" method="POST" class="signin-form">
                    @csrf
		      		<div class="form-group">
		      			<input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Name" >
		      			{{-- <input type="hidden" name="phone" class="form-control" value="">
		      			<input type="hidden" name="avatar" class="form-control" >
		      			<input type="hidden" name="role_id" class="form-control" value="2"> --}}
                    </div>
                    @error('name')
                        <p class="text-warning ml-lg-3">{{$message}}</p>
                    @enderror
		      		<div class="form-group">
		      			<input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email" >
                          @error('email')
                        <p class="text-warning ml-lg-3">{{$message}}</p>
                    @enderror
		      		</div>

	            <div class="form-group">
	              <input id="password-field" name="password" value="{{old('password')}}" type="password" class="form-control" placeholder="Password" >
	              {{-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> --}}
                  @error('password')
                  <p class="text-warning ml-lg-3">{{$message}}</p>
              @enderror
	            </div>
                <div class="form-group">
                    <input type="password" name="confirm" value="{{old('confirm')}}" class="form-control" placeholder="Confirm Password" >
                    @error('confirm')
                    <p class="text-warning ml-lg-3">{{$message}}</p>
                @enderror
                </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3 smSignup">Sign Up</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="{{ route('auth.loginform') }}" style="color: #fff">Sign In</a>
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="{{ route('auth.loginGG') }}" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Google</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('login/js/jquery.min.js')}}"></script>
  <script src="{{asset('login/js/popper.js')}}"></script>
  <script src="{{asset('login/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('login/js/main.js')}}"></script>

	</body>

    {{-- <script>
        $(doucument).on('click', '.smSignup', function () {

        });
    </script> --}}
</html>
