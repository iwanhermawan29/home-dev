<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>{{ $title }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center mb-9">


    <div class="row justify-content-center mb-9">
        <div class="col-lg-3 mb-5">

            <main class="form-signin  mb-5">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="/login" method="post" class=" mb-5">
                    @csrf
                    <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                    <h1 class="h3 mb-3 fw-normal">Please Login</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="Name" name="name" value="{{old('nama')}}">
                        <label for="floatingInput">Name</label>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="form-floating">
                        <input type="password" class="form-control  @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

                </form>
            </main>
        </div>
    </div>



</body>

</html>