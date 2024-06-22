<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Регистрация администраторов</title>
    <!-- loader-->
    <link href=" {{ asset('/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('/assets/js/pace.min.js') }}"></script>
    <!--favicon-->
    <link rel="icon" href="{{ asset('/assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('/assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="{{ asset('/assets/css/app-style.css') }}" rel="stylesheet" />
</head>

<body class="bg-theme bg-theme1">
    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->
    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="loader-wrapper">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="card card-authentication1 mx-auto my-5">
            <div class="card-body">
                <div class="card-content p-2">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/logo-icon.png') }}" alt="logo icon">
                    </div>
                    <div class="card-title text-uppercase text-center py-3">Войти</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Имя</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" id="exampleInputUsername" name="name"
                                    value="{{ old('name') }}" required autofocus autocomplete="username"
                                    class="form-control input-shadow" placeholder="Введите Имя">
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>

                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Aдрес электронной почты</label>
                            <div class="position-relative has-icon-right">
                                <input type="email" id="exampleInputUsername" name="email"
                                    value="{{ old('email') }}" required autofocus autocomplete="username"
                                    class="form-control input-shadow" placeholder="Введите адрес электронной почты">
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>

                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword" class="sr-only">Пароль</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" id="exampleInputPassword" name="password" required
                                    autocomplete="current-password" class="form-control input-shadow"
                                    placeholder="Введите Пароль">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>

                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword" class="sr-only">Подтвердите Пароль</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" id="exampleInputPassword" name="password_confirmation" required
                                    autocomplete="current-password" class="form-control input-shadow"
                                    placeholder="Подтвердите Пароль">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-light btn-block">Войти</button>
                    </form>
                </div>
            </div>
            <div class="card-footer text-center py-3">

                <p class="text-warning mb-0">Регистрировались? <a href="{{ route('login') }}">Нажмите
                        здесь</a>
                </p>
            </div>
        </div>

        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

    </div><!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }} "></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }} "></script>

    <!-- sidebar-menu js -->
    <script src="{{ asset('/assets/js/sidebar-menu.js') }} "></script>

    <!-- Custom scripts -->
    <script src="{{ asset('/assets/js/app-script.js') }} "></script>

</body>

</html>
