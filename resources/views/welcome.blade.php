
<!doctype html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Open+Sans:wght@300;400&display=swap"
        rel="stylesheet">
    <title>Atlobs</title>

</head>

<body>
    <!-- start navbar -->
    <nav class=" w-100 shadow sticky-top bg-white">
        <div class="d-flex justify-content-between p-3 align-items-center container ">
            <div>
                <a href="">
                    <img src="images/logo.png" alt="Company Logo" height="48" width="100px">

                </a>
            </div>
            <div>
                <div class="d-flex position-relative align-items-center">
                    

                    <div class="d-flex align-items-center login-button mx-5">
                        <a href="{{ route('login') }}" class="custom-link">تسجيل الدخول <i class="ms-1 gg-chevron-down "></i></a>
                    </div>
                    <div id="subMenu">
                        <span class="hamLine"></span>
                        <span class="hamLine"></span>
                        <span class="hamLine"></span>
                    </div>
                    <div id="fullPageMenu" class="visually-hidden">
                        <div class="anton d-flex align-items-center position-fixed  start-0 blurOverlay">
                            <div class="container">
                                <div class="my-4"><a href="{{ route('login') }}" class="custom-link"> <i><i
                                                class="fa-solid fa-heart ms-2 fa-xl"></i></i><span>المفضلة</span></a>
                                </div>
                                <div class="my-4"><a href="{{ route('login') }}" class="custom-link"><i
                                            class="fa-solid fa-pen-to-square ms-2 fa-xl"></i>المدونة </a></div>
                                <div class="my-4"><a href="{{ route('login') }}" class="custom-link"> <i
                                            class="fa-solid fa-money-bill-trend-up ms-2 fa-xl "></i>الحساب البنكى</a>
                                </div>
                                <div class="my-4"><a href="{{ route('login') }}" class="custom-link"><i
                                            class="fa-solid fa-file-lines ms-2 fa-xl"></i>
                                        الشروط والاحكام</a></div>

                                <div class="my-4"><a href="{{ route('login') }}" class="custom-link"><i
                                            class="fa-solid fa-users ms-2 fa-xl"></i>من نحن
                                    </a></div>
                                
                                </div>
                                <div class="side-navbar-content">
                                    <div class="my-4">
                                    </div>
                                    <div class="my-4">
                                        <div class="d-flex align-items-center login-button ">
                                            <a href="{{ route('login') }}" class="custom-link text-white">تسجيل الدخول <i
                                                    class="ms-1 gg-chevron-down "></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </nav>
    <!-- end navbar -->
    <!-- start slider -->
    <div id="carouselExampleIndicators" class="carousel slide home-slider" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/slider.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/slider.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/slider.png" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <!-- end slider -->
    <!-- start categories -->
    <section class="categories -5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="bg-white p-5 text-center people-category ">
                        <h3 class="mb-4">الأفراد</h3>
                        <a href="{{ route('login') }}" class="">
                            <div class="card text-center px-3 category-offer w-75 m-auto">
                                <img src="images/order.png" width="100" height="100" class=" m-auto mt-3"
                                    alt="...">
                                <div class="card-body">
                                    <h4 class="card-text fw-bold">اطلب طلبك</h4>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('login') }}" class="">
                            <div class="card text-center px-3 category-offer mt-4 w-75 m-auto">
                                <img src="images/gift.png" width="100" height="100" class=" m-auto mt-3"
                                    alt="...">
                                <div class="card-body">
                                    <h4 class="card-text fw-bold"> عرض الطلبات</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="p-5 text-center company-category ">
                        <h3 class="mb-4">الشركات والمؤسسات</h3>
                        <a href="{{ route('login') }}" class="">
                            <div class="card text-center px-3 category-offer w-75 m-auto">
                                <img src="images/order.png" width="100" height="100" class=" m-auto mt-3"
                                    alt="...">
                                <div class="card-body">
                                    <h4 class="card-text fw-bold">اطلب طلبك</h4>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('login') }}" class="">
                            <div class="card text-center px-3 category-offer mt-4 w-75 m-auto">
                                <img src="images/gift.png" width="100" height="100" class=" m-auto mt-3"
                                    alt="...">
                                <div class="card-body">
                                    <h4 class="card-text fw-bold"> عرض الطلبات</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- end categories -->

    <nav>
        <div class="container">
            <div class="position-fixed text-uppercase  pt-2 start-0 text-center bottom-0 w-100" role=navigation>
                <div class="container">
                    <div class=" p-3 shadow-lg  bottom-navbar">
                        <div class="d-flex align-items-center justify-content-around">
                            <div class="navLink navLinkActive"><a href={{ route('login') }}>
                                    <div class="mb-2"><i class="fa-solid fa-house-chimney-window fa-xl"></i></div>
                                    <div class=navLabel>الرئيسية</div>
                                </a></div>
                            <div class=navLink><a href={{ route('login') }}>
                                    <div class="mb-2"><i class="fa-solid fa-cart-shopping fa-xl"></i></div>
                                    <div class=navLabel>طلباتي</div>
                                </a></div>

                            <div class=navLink><a href={{ route('login') }}>
                                    <div class="mb-2"><i class="fa-regular fa-message fa-xl"></i></div>
                                    <div class=navLabel>رسائلي</div>
                                </a></div>
                            <div class=navLink><a href="{{ route('login') }}">
                                    <img src="images/user.png" width="40px" height="40">
                                    <div class=navLabel>حسابي</div>
                                </a></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/b4c05b8dbd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
    <script></script>

</body>

</html>
