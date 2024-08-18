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
            <li class="tab active"><a href="#login">Log In</a></li>
            <li class="tab"><a href="#signup">Sign Up</a></li>
            
        </ul>
        @if (Session::get('success'))
			<div class="alert alert-success" role="alert" style="color: red">
			{{session::get('success')}}
			</div>
		@endif
        
        <div class="tab-content">
        
            <div id="login" style="">
                <h1>Welcome Back!</h1>
                
                <form action="{{ url('loginpublic') }}" method="post">
                    @csrf
                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input name="email" type="email"required autocomplete="off" />
                    </div>
    
                    <div class="field-wrap">
                        <label>
                            Password<span class="req">*</span>
                        </label>
                        <input name="password" type="password"required autocomplete="off" />
                    </div>
    
                    <p class="forgot"><a href="/forgot">Forgot Password?</a></p>
    
                    <button class="button button-block">Log In</button>
    
                </form>
    
            </div>      
            
            <div id="signup" style="display: none">
                <h1>Sign Up for Free</h1>
                @if (Session::get('success'))
                    <div class="alert alert-success" role="alert">
                    {{session::get('success')}}
                    </div>
                @endif
                <form action="{{ url('signuppost') }}" method="post">
                @csrf
                        <div class="field-wrap">
                            <label>
                                Họ tên<span class="req">*</span>
                            </label>
                            <input name="hoTen" type="text" required autocomplete="off" />
                        </div>

                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input name="email" type="email"required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            Mật khẩu<span class="req">*</span>
                        </label>
                        <input name="password" type="password"required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            Số điện thoại<span class="req">*</span>
                        </label>
                        <input name="sdt" type="text"required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            <span class="req">*</span>
                        </label>
                        <input name="ngaySinh" type="date"required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            Địa chỉ<span class="req">*</span>
                        </label>
                        <input name="diaChi" type="text"required autocomplete="off" />
                    </div>
                    <button type="submit" class="button button-block">Đăng ký</button>

                </form>

            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->

</body>
