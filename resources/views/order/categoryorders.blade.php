@extends('layouts.app')

@section('head_script')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dselect.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
@endsection

@section('content')
    <section class="mt-5">
        <div class="container">
            <div class="owl-carousel owl-theme owl-categories">

                @foreach ($allcategoris as $category)
                    <a href="{{ route('peopleOrders',['id'=>$category->id]) }}">
                        <div class="categories-item">
                            <img src="images/{{ $category->category_image }}" alt="categories" width="70px"
                                height="25px">
                            <p> {{ $category->category_name }} </p>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </section>
    <section class="orders">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <div class="filter-sidebar wow fadeInRight h-100 bg-white" data-wow-duration="0.72s"
                        data-wow-delay="0.7s">
                        <button type="button" id="sidebarCollapse" class="btn btn-secondary">
                            <i class="fas fa-align-left"></i>
                            <span class="text-center"> الفلترة </span>
                        </button>
                        <nav id="sidebar">
                            <div class="sidebar-header d-flex align-items-center justify-content-center py-3">
                                <i class="fa-solid fa-filter mx-2"></i>

                                <h6 class="text-center text-white m-0">الفلترة</h6>
                            </div>
                            <form action="">
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-starts">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapseOne">
                                                القسم الرئيسي
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="panelsStayOpen-starts">
                                            <div class="accordion-body">

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="star1">
                                                        <label class="form-check-label" for="star1">
                                                            {{ $category->id }} </label>
                                                    </div>
                                                

                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-sizes">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree"
                                                aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                                القسم الفرعي
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="panelsStayOpen-sizes">
                                            <div class="accordion-body">

                                                @foreach ($subcategoris as $subcategory)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="secondary-service" id="secondary-service1">
                                                        <label class="form-check-label" for="secondary-service1">
                                                            {{ $subcategory->subcategory_name }} </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-color">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive"
                                                aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                                خدمات اضافية
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
                                            aria-labelledby="panelsStayOpen-color">
                                            <div class="accordion-body">

                                                @foreach ($services as $service)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="size4">
                                                        <label class="form-check-label" for="size4">
                                                            {{ $service->service_name }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </form>
                        </nav>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row ">
                        <div class="col-md-4 mb-3">
                            <select class="form-select">
                                <option value="">التصنيف</option>
                                <option value="1">الأحدث</option>
                                <option value="2">الأقدم</option>
                            </select>
                        </div>


                        <div class="col-md-4 mb-3" hidden>
                            <select name="country" class="form-select" onclick="console.log($(this).val())"
                                onchange="console.log('change is firing')" id="city-search">
                                <option value="" disabled selected>المدينة </option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->country_name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3" hidden>
                            <select name="country-search" class="form-select" id="country-search">
                                <option value="" selected>الدولة</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <select name="Section" class="form-select" onclick="console.log($(this).val())"
                                onchange="console.log('change is firing')" id="city-search">
                                <option value="" selected disabled>المدينة</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-4 mb-3 ">
                            <select id="product" name="product" class="form-select" id="country-search">
                                <option value="" selected>الدولة</option>
                            </select>
                        </div>

                    </div>

                    @foreach ($orders as $order)
                    <div class="col-md-12 my-2">
                        <div class="card mb-3 order-card">
                            <div class="row g-0">
                                <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                    <a href="orderDetails.html">
                                        <img src='{{ asset( $order->photo_path . $order->photo_name[0]) }}' class=" rounded-circle img-fluid img-fluid"
                                            alt="..." width="120px" height="120px">
                                    </a>
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="orderDetails.html">
                                                <h5 class="card-title"> {{ $order->orderName }} </h5>
                                            </a>
                                            <button>
                                                <i class="fa-solid fa-heart fa-2xl"></i>
                                            </button>

                                        </div>
                                        <small class="text-secondary fw-bold">{{ $order->town }}</small>
                                        <p class="text-dark">{{ $order->town }}</p>
                                        <div class="d-flex justify-content-between more-details">
                                            <p class="price fw-bold">السعر المتوقع: {{ $order->startPrice }} ألف - {{ $order->endPrice }} ألف</p>
                                            <strong class="text-secondary">تم النشر فى {{ $order->date }}</strong>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    {{-- <div class="col-md-12 my-2">
                        <div class="card mb-3 order-card">
                            <div class="row g-0">
                                <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                    <img src="images/car.png" class=" rounded-circle img-fluid m-2" alt="..."
                                        width="120px" height="120px">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">سيارة ديجيتال </h5>
                                            <button>
                                                <i class="fa-solid fa-heart fa-2xl"></i>

                                            </button>

                                        </div>
                                        <small class="text-secondary fw-bold">مكة المكرمة، حي شرق</small>
                                        <p class="text-dark">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                            توليد هذا النص من مولد النص العربى، حيث يمكنك أن</p>
                                        <div class="d-flex justify-content-between more-details">
                                            <p class="price fw-bold">السعر المتوقع: 100 ألف - 120 ألف</p>
                                            <strong class="text-secondary">تم النشر بتوقيت 10 مارس 2022</strong>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <div class="card mb-3 order-card">
                            <div class="row g-0">
                                <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                    <img src="images/car.png" class=" rounded-circle img-fluid" alt="..."
                                        width="120px" height="120px">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">سيارة ديجيتال </h5>
                                            <button>
                                                <i class="fa-regular fa-heart fa-2xl"></i>
                                            </button>

                                        </div>
                                        <small class="text-secondary fw-bold">مكة المكرمة، حي شرق</small>
                                        <p class="text-dark">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                            توليد هذا النص من مولد النص العربى، حيث يمكنك أن</p>
                                        <div class="d-flex justify-content-between more-details">
                                            <p class="price fw-bold">السعر المتوقع: 100 ألف - 120 ألف</p>
                                            <strong class="text-secondary">تم النشر بتوقيت 10 مارس 2022</strong>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <div class="card mb-3 order-card">
                            <div class="row g-0">
                                <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                    <img src="images/car.png" class=" rounded-circle img-fluid" alt="..."
                                        width="120px" height="120px">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">سيارة ديجيتال </h5>
                                            <button>
                                                <i class="fa-solid fa-heart fa-2xl"></i>

                                            </button>

                                        </div>
                                        <small class="text-secondary fw-bold">مكة المكرمة، حي شرق</small>
                                        <p class="text-dark">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                            توليد هذا النص من مولد النص العربى، حيث يمكنك أن</p>
                                        <div class="d-flex justify-content-between more-details">
                                            <p class="price fw-bold">السعر المتوقع: 100 ألف - 120 ألف</p>
                                            <strong class="text-secondary">تم النشر بتوقيت 10 مارس 2022</strong>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <div class="card mb-3 order-card">
                            <div class="row g-0">
                                <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                    <img src="images/car.png" class=" rounded-circle img-fluid img-fluid" alt="..."
                                        width="120px" height="120px">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">سيارة ديجيتال </h5>
                                            <button>
                                                <i class="fa-regular fa-heart fa-2xl"></i>
                                            </button>

                                        </div>
                                        <small class="text-secondary fw-bold">مكة المكرمة، حي شرق</small>
                                        <p class="text-dark">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                            توليد هذا النص من مولد النص العربى، حيث يمكنك أن</p>
                                        <div class="d-flex justify-content-between more-details">
                                            <p class="price fw-bold">السعر المتوقع: 100 ألف - 120 ألف</p>
                                            <strong class="text-secondary">تم النشر بتوقيت 10 مارس 2022</strong>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <div class="card mb-3 order-card">
                            <div class="row g-0">
                                <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                    <img src="images/car.png" class=" rounded-circle img-fluid" alt="..."
                                        width="120px" height="120px">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">سيارة ديجيتال </h5>
                                            <button>
                                                <i class="fa-solid fa-heart fa-2xl"></i>

                                            </button>

                                        </div>
                                        <small class="text-secondary fw-bold">مكة المكرمة، حي شرق</small>
                                        <p class="text-dark">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                            توليد هذا النص من مولد النص العربى، حيث يمكنك أن</p>
                                        <div class="d-flex justify-content-between more-details">
                                            <p class="price fw-bold">السعر المتوقع: 100 ألف - 120 ألف</p>
                                            <strong class="text-secondary">تم النشر بتوقيت 10 مارس 2022</strong>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

    </section>
@endsection

@section('scripts')
    {{-- <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/b4c05b8dbd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/dselect.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script> --}}
    <script>
        dselect(document.querySelector('#city-search'), {
            search: true
        })
        dselect(document.querySelector('#country-search'), {
            search: true
        })
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        })
    </script>

    {{-- script for countries and towns --}}
    <script>
        $(document).ready(function() {
            $('select[name="Section"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('country') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="product"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            $('select[name="country"]').on('change', function() {
                var countryId = $(this).val();
                if (countryId) {
                    $.ajax({
                        url: "{{ URL::to('country') }}/" + countryId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="countrysearch"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="countrysearch"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script> --}}

@endsection
