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
            <li class="tab active" style="margin-left: 170px"><a href="#login">Forgot Password</a></li>
        </ul>

        <div class="tab-content">
            <div id="login">
                @if (!empty($message))
                    <p style="font-style: italic;color:rgb(255, 0, 0)">{{ $message }}</p>

                @endif
                <form action="{{ url('forgotpas') }}" method="post">
                    @csrf
                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input name="email" type="email"required autocomplete="off"/>
                    </div>

                    <button class="button button-block">Send Code</button>

                </form>

            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->

</body>
