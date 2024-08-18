<!DOCTYPE html>
<html lang="en">

<head>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/login/style.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{ asset('css/login/app.js') }}"></script>
    
</head>

<body>
    <div class="form">

        <ul class="tab-group">
            {{-- <li class="tab"><a href="#signup">Sign Up</a></li> --}}
            <li class="tab active" style="margin-left: 170px"><a href="#login">Log In</a></li>
        </ul>
        @if (Session::get('success'))
			<div class="alert alert-error" role="alert" style="color: red">
			{{session::get('success')}}
			</div>
		@endif
        <div class="tab-content">
            <div id="login">
                <h1>Welcome Back!</h1>
                
                <form action="{{ url('loginpost') }}" method="post">
                    @csrf
                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input name="email" type="email"required autocomplete="off"/>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Password<span class="req">*</span>
                        </label>
                        <input name="password" type="password"required autocomplete="off"/>
                    </div>

                    <p class="forgot"><a href="#">Forgot Password?</a></p>

                    <button class="button button-block">Log In</button>

                </form>

            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->

</body>
