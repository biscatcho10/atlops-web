@extends('layouts.app')

@section('content')
    <section class="create-order">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10">
                    <form class="bg-white p-5 mt-5 create-order-form" method="POST" action="{{ route('createOrder') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <h3 class="fw-bold">إنشاء طلب {{ $category->category_name }}</h3>
                        <p>قم بمليء تفاصيل طلبك ليتمكن الآخرين من رؤية منتجك</p>
                        <div class="progress mt-3">
                            <div class="progress-bar " role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="step">
                            <div class="row">
                                <h5 class="mt-3">تفاصيل الطلب</h5>

                                <div class="col-md-12 mb-3 ">
                                    <label class="mb-3 fw-bold"> صور الطلب </label>
                                    <div
                                        class="d-flex  align-items-center justify-content-between change-img mb-4 p-2 w-100">
                                        <div class="  d-flex justify-content-center align-items-center">
                                            <div class="d-flex justify-content-center align-items-center order-img-cont ms-3"
                                                id="order-img-cont">
                                                <img src="{{ asset('images/order.svg') }}" width="70px" height="70px"
                                                    class="rounded" id="imgOrder">
                                                <input type="file" name="photo[]" id="upload-photo">
                                            </div>
                                            <label for="upload-photo2"
                                                class="rounded-circle me-2 ms-4 more-imgs d-flex justify-content-center align-items-center d-none plus">
                                                <i class="fa-solid fa-plus fa-xl"></i>
                                            </label>
                                            <input type="file" name="photo[]" id="upload-photo2" class="d-none" multiple>
                                            <p class="mb-0 mx-2">ارفق صورة منتجك، لا تزيد عن 5 ميجا</p>

                                        </div>
                                        <label for="upload-photo" class="fw-bold label-img p-2 label-add-image">إرفاق
                                            صورة</label>

                                    </div>
                                    @if ($errors->has('photo'))
                                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-12 mb-3 ">
                                    <label class="mb-3 fw-bold"> اسم الطلب </label>
                                    <input type="text" name="orderName" class="form-control" id="">
                                    @if ($errors->has('orderName'))
                                        <span class="text-danger">{{ $errors->first('orderName') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3 ">
                                    <label class="mb-3 fw-bold">القسم الرئيسي</label>
                                    <input type="text" name="categoryName" value="{{ $category->category_name }}"
                                        class="form-control" id="" readonly>
                                    <input type="text" name="categoryId" value="{{ $category->id }}"
                                        class="form-control" id="" hidden>

                                </div>
                                <div class="col-md-6 mb-3 ">
                                    <label class="mb-3 fw-bold"> القسم الفرعي</label>
                                    <select name="subCategory" class="form-select" aria-label="Default select example">
                                        <option selected disabled>اختار القسم الفرعى لطلب {{ $category->category_name }}
                                        </option>
                                        @foreach ($subCategory as $subCateg)
                                            <option value="{{ $subCateg->subcategory_name }}">
                                                {{ $subCateg->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3 ">
                                    <select name="additionalService" class="form-select"
                                        aria-label="Default select example">
                                        <option selected disabled>اختار الخدمة الاضافية لطلب {{ $category->category_name }}
                                        </option>
                                        @foreach ($serviceCategory as $service)
                                            <option value="{{ $service->service_name }}">{{ $service->service_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3 ">
                                    <label class="mb-3 fw-bold">وصف طلب {{ $category->category_name }}</label>
                                    <div class="form-floating">
                                        <textarea name="orderDescription" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                            style="height: 100px"></textarea>
                                        <label for="floatingTextarea2"></label>
                                    </div>
                                    @if ($errors->has('orderDescription'))
                                        <span class="text-danger">{{ $errors->first('orderDescription') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3 ">
                                    <label class="mb-3 fw-bold"> بداية السعر المتوقع </label>
                                    <input type="text" name="startPrice" class="form-control" id=""
                                        placeholder="ادخل السعر">
                                    @if ($errors->has('startPrice'))
                                        <span class="text-danger">{{ $errors->first('startPrice') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3 ">
                                    <label class="mb-3 fw-bold"> نهاية السعر المتوقع</label>
                                    <input type="text" name="endPrice" class="form-control" id=""
                                        placeholder="ادخل السعر">
                                    @if ($errors->has('endPrice'))
                                        <span class="text-danger">{{ $errors->first('endPrice') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div id="userinfo" class="card-body p-4 step" style="display: none">
                            <div class="row">

                                <h5 class="my-3"> التواصل</h5>

                                <div class="col-md-6 mb-3 " hidden>
                                    <label class="mb-3 fw-bold"> المدينة</label>
                                    <select name="country" class="form-select" onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')" id="example-search">
                                        <option value="" selected>اختار المدينة</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country'))
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3 " hidden>
                                    <label class="mb-3 fw-bold"> الدولة</label>
                                    <select name="town" class="form-select" id="country-search">
                                        <option value="" selected>اختار الدولة</option>
                                    </select>
                                    @if ($errors->has('town'))
                                        <span class="text-danger">{{ $errors->first('town') }}</span>
                                    @endif
                                </div>



                                <div class="col-md-6 mb-3">
                                    <label class="mb-3 fw-bold"> الدولة</label>
                                    <select name="Section" class="form-select" onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')" id="example-search">
                                        <option value="" selected disabled>حدد الدولة</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('Section'))
                                        <span class="text-danger">{{ $errors->first('Section') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3 ">
                                    <label class="mb-3 fw-bold"> المدينة</label>
                                    <select id="product" name="product" class="form-select" id="country-search">
                                        <option value="" selected>اختار المدينة</option>
                                    </select>
                                    @if ($errors->has('product'))
                                        <span class="text-danger">{{ $errors->first('product') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-6 mb-3 ">
                                    <label class="mb-3 fw-bold"> رقم الجوال </label>
                                    <input type="text" value="{{ auth()->user()->phone }}" name="phone"
                                        class="form-control" id="" readonly>
                                </div>
                                <label class="mb-3 fw-bold">طريقة التواصل</label>
                                <div class="col-md-12 mb-3">

                                    <input type="radio" name="contact" value="mobile" class="form-check-input"
                                        id="info_gender">
                                    <label class=""> رقم الجوال
                                    </label>
                                </div>
                                <div class="col-md-12">

                                    <input type="radio" name="contact" value="email" class="form-check-input"
                                        id="info_gender">
                                    <label class=""> رسائل الموقع الالكتروني
                                    </label>
                                </div>

                            </div>

                        </div>

                        <div class="row  text-center">
                            <div class="col-md-6 my-2">
                                <button class="action back btn w-100" style="display: none" type="button">رجوع</button>
                            </div>
                            <div class="col-md-6 my-2">
                                <button class="action submit btn w-100" style="display: none" type="button"
                                    data-bs-toggle="modal" data-bs-target="#createOrderModal">إرسال الطلب</button>
                            </div>
                            <button class="action next btn w-75 m-auto py-2" type="button">التالي</button>

                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="createOrderModal" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content w-auto m-auto">

                                    <a href="peopleOrders.html">
                                        <button type="submit">
                                            <div class="modal-body">
                                                <h5>تم إنشاء منتجك بنجاح !</h5>
                                            </div>
                                        </button>
                                    </a>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>


        </div>
    </section>
@endsection


@section('scripts')
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/b4c05b8dbd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/dselect.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    {{-- script for preview images --}}
    <script>
        $(document).ready(function(e) {
            $('#upload-photo').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>

    {{-- script for countries and towns --}}
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
                            $('select[name="town"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="town"]').append('<option value="' +
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
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

    <script>
        var step = 1;
        $(document).ready(function() {
            stepProgress(step);
        });

        $(".next").on("click", function() {
            var nextstep = true;
            if (nextstep == true) {
                if (step < $(".step").length) {
                    $(".step").show();
                    $(".step")
                        .not(":eq(" + step++ + ")")
                        .hide();
                    stepProgress(step);
                }
                hideButtons(step);
            }
        });

        // ON CLICK BACK BUTTON
        $(".back").on("click", function() {
            if (step > 1) {
                step = step - 2;
                $(".next").trigger("click");
            }
            hideButtons(step);
        });

        // CALCULATE PROGRESS BAR
        stepProgress = function(currstep) {
            var percent = parseFloat(100 / $(".step").length) * currstep;
            percent = percent.toFixed();
            $(".progress-bar").css("width", percent + "%")
        };

        // DISPLAY AND HIDE "NEXT", "BACK" AND "SUMBIT" BUTTONS
        hideButtons = function(step) {
            var limit = parseInt($(".step").length);
            $(".action").hide();
            if (step < limit) {
                $(".next").show();
            }
            if (step > 1) {
                $(".back").show();
            }
            if (step == limit) {
                $(".next").hide();
                $(".submit").show();
            }
        };
        dselect(document.querySelector('#example-search'), {
            search: true
        })
        dselect(document.querySelector('#country-search'), {
            search: true
        })

        // upload order photos 
        $(function() {
            $("#upload-photo").change(function() {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    //alert(e.target.result);
                    $('#imgOrder').attr('src', e.target.result);
                }
                $(".label-add-image").addClass("d-none")
                $(".plus").removeClass("d-none")

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function() {
            $("#upload-photo2").change(function() {
                readURL2(this);
            });
        });


        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    //alert(e.target.result);
                    let orderImgCont = $("#order-img-cont")
                    orderImgCont.clone().insertAfter($("#order-img-cont"))
                    $('#imgOrder').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
