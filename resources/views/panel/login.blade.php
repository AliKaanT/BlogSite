{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Laravel</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/summernote-bs5.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/summernote-bs5.min.js') }}"></script>
</head>

<body>

    <form action="{{ url('login') }}" method="POST">
        @csrf
        <input type="text" name="email" id="email" placeholder="email">
        <input type="text" name="password" id="password" placeholder="password">
        <button type="submit">Gönder</button>
    </form>
</body>

</html> --}}
{{-- 

<html lang="en">

<head>
    @include('includes/meta_tags')
</head>

<body>
    <div class="container">
        <div class="border d-flex vh-100 justify-content-center align-items-center flex-column">
            <form action='/panel/login' method="POST" class="w-25">
                @csrf
                <div class="mb-2">
                    <label class="form-label" for="emailAddress">Email :</label>
                    <input name="email" class="form-control" id="emailAddress" type="email"
                        placeholder="example@mail.com" required />
                </div>
                <div class="mb-2">
                    <label class="form-label" for="password">Şifre :</label>
                    <input name="password" class="form-control" id="password" type="password" placeholder="***"
                        required />
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-success" id="submitButton" type="submit">Giriş Yap</button>
                    <a href="" class="text-muted ">Şifremi unuttum</a>
                </div>
            </form>
            @if (isset($errors))
                @foreach ($errors as $value)
                    <h2>{{ $value }}</h2>
                @endforeach
            @endif
        </div>
    </div>
</body>

</html>
 --}}

@include('panel.includes.header')

<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>
                            <form action='/panel/login' method="POST" class="user">
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input name="remember_me" type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            @if (isset($errors))
                                @foreach ($errors as $value)
                                    <h2>{{ $value }}</h2>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@include('panel.includes.footer');
