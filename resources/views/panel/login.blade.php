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


<html lang="en">

<head>
    @include('includes/meta_tags')
</head>

<body>
    <div class="container">
        <div class="border d-flex vh-100 justify-content-center align-items-center flex-column">
            <form action='/post/login' method="POST" class="w-25">
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
