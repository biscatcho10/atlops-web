{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}




<!doctype html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Open+Sans:wght@300;400&display=swap"
        rel="stylesheet">
    <title>Atlob</title>

</head>

<body class="body-forms">
    <section class="register py-5 forms ">
        <div class="container">
            <h2 class="text-center my-5 text-white fw-bold">مرحبـًا بك في
                أطلبس
            </h2>
            <div class="row">
                <div class="col-lg-7 col-md-4 empty"></div>
                <div class="col-lg-5 col-md-8 form-cont ">
                    <form method="POST" action="{{ route('register.custom') }}" enctype="multipart/form-data"
                        class="bg-white p-5 register-form form-body mb-5">
                        @csrf
                        <h5 class="modal-title w-100 fw-bold mb-4"> إنشاء حساب جديد</h5>

                        {{-- <div class="d-flex justify-content-center align-items-center con-image mb-2">
                            <div class=" add-image d-flex justify-content-center align-items-center">
                                <img id="preview-image-before-upload" src="images/publisher.png" alt="preview image"
                                    style="max-height: 120px; border-radius: 50%">
                                <i class="fa-solid fa-user text-white" style="font-size: 55px;"></i>
                                <div class="cam d-flex align-items-center justify-content-center ">
                                    <label for="upload-photo"><i class="fa-solid fa-camera fa-xl"></i></label>
                                    <input type="file" name="photo" id="image">
                                </div>
                            </div>
                        </div> --}}

                        <div class="d-flex justify-content-center align-items-center con-image mb-2">
                            <div class=" add-image d-flex justify-content-center align-items-center">
                                <img id="preview-image-before-upload" style="max-height: 120px; border-radius: 50%">
                                <i class="fa-solid fa-user text-white" style="font-size: 55px;"></i>
                                <div class="cam d-flex align-items-center justify-content-center ">
                                    <label for="upload-photo"><i class="fa-solid fa-camera fa-xl"></i></label>
                                    <input type="file" name="photo" id="image">
                                </div>
                            </div>
                        </div>


                        @if ($errors->has('photo'))
                            <span class="text-danger">{{ $errors->first('photo') }}</span>
                        @endif



                        <div class="row">
                            <div class="col-lg-6 mb-3 ">
                                <label class="mb-3 fw-bold"> الاسم الأول</label>
                                <input type="text" name="firstName" class="form-control" id="">
                                @if ($errors->has('firstName'))
                                    <span class="text-danger">{{ $errors->first('firstName') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6 mb-3 ">
                                <label class="mb-3 fw-bold"> الاسم الأخير</label>
                                <input type="text" name="lastName" class="form-control" id="">
                                @if ($errors->has('lastName'))
                                    <span class="text-danger">{{ $errors->first('lastName') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-3 fw-bold">البريد الالكتروني</label>
                                <input type="email" name="email" class="form-control" id="">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-3 fw-bold"> رقم الجوال</label>
                                <input type="text" name="phone" class="form-control" id="">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-3 fw-bold"> تاريخ الميلاد</label>
                                <div class="input-group date" id="datepicker">
                                    <input type="text" class="form-control" name="date" id="date" />
                                    <span class="input-group-append date-span-parent">
                                        <span class="input-group-text  d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                                @if ($errors->has('date'))
                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12 mb-3 input-box">
                                <label class="mb-3 fw-bold">كلمة المرور </label>
                                <input type="password" name="password" class="form-control password id_password"
                                    id="" placeholder="">
                                <i class="eye-show fas fa-eye-slash togglePassword" id=""></i>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12 mb-3  input-box">
                                <label class="mb-3 fw-bold"> تأكيد كلمة المرور</label>
                                <input type="password" name="password" class="form-control password id_password"
                                    id="" placeholder="">
                                <i class="eye-show fas fa-eye-slash togglePassword" id=""></i>
                            </div>
                            <div class="col-md-12 mb-3 input-box">
                                <label class="mb-3 fw-bold"> نبذة عن المستخدم </label>
                                <div class="form-floating">
                                    <textarea name="userDetails" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                </div>
                            </div>
                            <label class="mb-3 fw-bold"> نوع المستخدم</label>
                            @if ($errors->has('type'))
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif
                            <div class="col-md-6">
                                <input type="radio" name="type" value="0" class="me-3  form-check-input"
                                    id="info_gender">
                                <label class="">أفراد
                                </label>
                            </div>
                            <div class="col-md-8 mb-3">
                                <input type="radio" name="type" value="1" class="me-3  form-check-input"
                                    id="info_gender">
                                <label class="">شركات ومؤسسات
                                </label>
                            </div>



                            <label class="mb-3 fw-bold"> طريقة التواصل</label>
                            @if ($errors->has('communication'))
                                <span class="text-danger">{{ $errors->first('communication') }}</span>
                            @endif
                            <div class="col-md-6">
                                <input type="radio" name="communication" value="عن طريق الهاتف"
                                    class="me-3  form-check-input" id="info_gender">
                                <label class=""> عن طريق الهاتف
                                </label>
                            </div>
                            <div class="col-md-8">
                                <input type="radio" name="communication" value="بواسطة الرسائل النصية"
                                    class="me-3  form-check-input" id="info_gender">
                                <label class="">بواسطة الرسائل النصية
                                </label>
                            </div>
                        </div>


                        <div class="text-center log m-auto mb-3 mt-4">
                            <button type="submit" class="btn py-2"> إنشاء حساب </button>
                        </div>
                        <p class="text-center text-secondary"> هل لديك حساب؟
                            <a href="login" class="fw-bold"> تسجيل دخول</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $('#datepicker').datepicker();
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $('#image').change(function() {

                let reader = new FileReader();
                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>

</body>

</html>
