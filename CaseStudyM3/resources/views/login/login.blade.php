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
<body class="img js-fullheight" style="background-image: url({{asset('image/shop_img_10.jpg')}});">
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <img src="{{asset('assets/img/apple-icon.png')}}">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <form action="{{route('users.confirm')}}" class="signin-form" method="post">
                        @csrf
                        @if(session()->has('login-error'))
                            <div class="alert alert-danger text-center">
                                {{session()->get('login-error')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="email" class="form-control border-success" placeholder="Username" name="email" required>
                        </div>
                        <div class="form-group">
                            <input id="password-field" type="password" class="form-control border-success" placeholder="Password"
                                   name="password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary"><span style="color: white">Remember Me</span>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">

                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                            </div>
                            <div class="col-6">
                                <button type="button" onclick="" class="form-control btn btn-primary submit px-3">
                                    Register
                                </button>
                            </div>
                        </div>

                    </form>
                    <p class="w-100 text-center" style="color: white">&mdash; Or Sign In With &mdash;</p>
                    <div class="d-flex text-center row">
                        <div style="alignment: center" class="col-md-12">
                            <a href="#" class="px-2 py-2 mr-md-1 rounded">
                                <i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                            <a href="#" class="px-2 py-2 ml-md-1 rounded">
                                <i class="fa fa-twitter fa-3x" aria-hidden="true"></i></a>
                            <a href="#" class="px-2 py-2 ml-md-1 rounded">
                                <i class="fa fa-google fa-3x" aria-hidden="true"></i></a>
                        </div>
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
</html>

