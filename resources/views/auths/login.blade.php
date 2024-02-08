<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link href="{{asset('/css/card.css')}}" rel="stylesheet">

</head>
<body>
{{--        @if ((str_contains($_GET['url'],'posts')||str_contains($_GET['url'],'profile'))&&!session('loginedEmail') )--}}
{{--           @dd("hello")--}}
{{--@endif--}}
{{--@dd(session())--}}
@if($errors->any()||isset($_GET['loginError'])||isset($_GET['verified']))
        <div class="container" id="container" style="border: 2px solid red;margin-top:426px">
    @else
        <div class="container" id="container"style="margin-top:426px">

@endif

    <div class="form-container sign-up-container">
        <form action="{{route('register.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>Create Account</h1>
            <div class="social-container">
                <a href="{{route('google.redirect')}}" class="social"><i class="fab fa-facebook-f"><img src="{{asset('prog_images/icons/gmail.svg')}}"></i></a>
                <a href="{{route('github.redirect')}}" class="social"><i class="fab fa-google-plus-g"><img src="{{asset('prog_images/icons/github.svg')}}"></i></a>
                <a href="{{route('linkedin.redirect')}}" class="social"><i class="fab fa-linkedin-in"><img src="{{asset('prog_images/icons/linkedin.svg')}}"></i></a>
            </div>
            <span>or use your email for registration</span>
            <input type="text" placeholder="Name" name = "name" value="{{old('name')}}"/>
            <input type="email" placeholder="Email" name = "email" value="{{old('email')}}"/>
            <input type="password" placeholder="Password" name ="password" value="{{old('password')}}"/>
            <input type="file" name ="image"/>
            <button type="submit">Sign Up</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="{{route('login.process')}}" method="POST">
            @csrf
            <h1>Sign in</h1>
            <div class="social-container">
                <a href="{{route('google.redirect')}}" class="social"><i class="fab fa-facebook-f"><img src="{{asset('prog_images/icons/gmail.svg')}}"></i></a>
                <a href="{{route('github.redirect')}}" class="social"><i class="fab fa-google-plus-g"><img src="{{asset('prog_images/icons/github.svg')}}"></i></a>
                <a href="{{route('linkedin.redirect')}}" class="social"><i class="fab fa-linkedin-in"><img src="{{asset('prog_images/icons/linkedin.svg')}}"></i></a>
            </div>
            <span>or use your account</span>
            <input type="email" placeholder="Email" name = "email"/>
            <input type="password" placeholder="Password" name ="password"/>
            <a href="#">Forgot your password?</a>
            <button type="submit">Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>
<div style="float: left; margin-left: 80px;width: 20%;height: fit-content;padding-top: 60px">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div style="float: left; margin-left: 80px;width: 20%;height: fit-content;padding-top: 60px">
    @if (isset($_GET['loginError']))
        <div class="alert alert-danger">
            <ul>
                    <li>Email And Password Are Not Correct</li>
            </ul>
        </div>
    @endif
</div>

<div style="float: left; margin-left: 80px;width: 20%;height: fit-content;padding-top: 60px">
    @if (isset($_GET['verified']))
        <div class="alert alert-danger">
            <ul>
                <li>You Haven't verified your email please check you email</li>
            </ul>
        </div>
    @endif
</div>

<script src = "{{asset('js/login.js')}}"></script>
</body>
</html>



