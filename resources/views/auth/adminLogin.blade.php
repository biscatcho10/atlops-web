<!doctype html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Open+Sans:wght@300;400&display=swap"
        rel="stylesheet">
    <title>Atlob</title>

</head>

<body class="body-forms">

    <section class="login py-5 forms">
        <div class="container">
            <h2 class="text-center my-5 text-white fw-bold">مرحبـًا بك في
                أطلبس

            </h2>
            <div class="row">
                <div class="col-lg-7 col-md-4 empty"></div>
                <div class="col-lg-5 col-md-8 form-cont ">
                    <form method="POST" action="{{ route('save.admin.login') }}" class="bg-white p-5 login-form form-body">
                        @csrf
                        <h5 class="modal-title w-100 fw-bold mb-4">تسجيل الدخول</h5>

                        <div class="modal-body ">
                            <div class="mb-3">
                                <label class="mb-3 fw-bold">البريد الالكتروني</label>
                                <input type="email" name="email" class="form-control" id="Username">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="mb-3 input-box">
                                <label class="mb-3 fw-bold">كلمة المرور </label>
                                <input type="password" name="password" class="form-control password id_password"
                                    id="" placeholder="">
                                <i class="eye-show fas fa-eye-slash togglePassword" id=""></i>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="mb-2" style="direction: ltr;">
                                <label class="form-check-label" for="remember">
                                    <a href="forgetPassword.html" class="fw-bold forget-password">هل نسيت كلمة المرور؟
                                    </a>
                                </label>
                            </div>
                        </div>

                        <div class="text-center log m-auto mb-3 mt-4">
                            <button type="submit" class="btn py-2"> تسجيل الدخول </button>
                        </div>
                        <div class="text-center or m-auto mb-3 mt-4">
                            <h6><span>أو</span></h6>

                        </div>
                        <a href="https://www.google.com/intl/ar_eg/chrome/" target="_blank">
                            <div class="d-flex login-google m-auto mb-3 mt-4 align-items-center justify-content-center">
                                <img src="images/chromel.png" width="35" height="35">
                                <p class="mx-2 mb-0 fw-bold">تسجيل الدخول بواسطة جوجل</p>
                            </div>
                        </a>
                        <a href="https://www.facebook.com/" target="_blank">
                            <div class="d-flex login-facebook m-auto mb-3  align-items-center justify-content-center">
                                <i class="fa-brands fa-facebook"></i>
                                <p class="mx-2 mb-0 fw-bold">تسجيل الدخول بواسطة فيسبوك</p>
                            </div>
                        </a>

                        <p class="text-center text-secondary"> ليس لديك حساب؟
                            <a href="register" class="fw-bold">انشاء حساب</a>
                        </p>
                    </form>
                </div>
            </div>

        </div>


    </section>
    <div class="container">
        <img src="images/Team work-bro.png" width="600px" height="600px" class="team-work">
    </div>


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/b4c05b8dbd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>
