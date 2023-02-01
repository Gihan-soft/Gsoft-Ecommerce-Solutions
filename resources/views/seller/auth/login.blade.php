
<!doctype html>
<html lang="en">

<head>
<title>Gsoft Ecommerce Solutions Seller Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="Gihan">

<link rel="icon" href="{{get_setting('favicon')}}" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/vendor/font-awesome/css/font-awesome.min.css')}}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('backend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/css/color_skins.css')}}">
</head>


<br>
<body class="theme-blue">
      
        
	<!-- WRAPPER -->
	<div id="wrapper">
       
		<div class="vertical-align-wrap">
			 <div class="col d-flex justify-content-center">
              
				<div class="auth-box">
                    <div class="top text-center">
                        <img src="{{asset(get_setting('logo'))}}" alt="Lucid">
                    </div>
                    <br>
					<div class="card">
                        <div class="header">
                            <p class="lead">Login to your seller account</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" method="POST"action="{{route('seller.login')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" placeholder="Email">
                                     @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                                     @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
        
	</div>
    <!-- END WRAPPER -->
    
 
</body>
</html>
