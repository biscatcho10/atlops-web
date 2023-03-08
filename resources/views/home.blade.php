{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}



@extends('layouts.app')

@section('content')
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
@endsection

@section('categories')
    <section class="categories -5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="bg-white p-5 text-center people-category ">
                        <h3 class="mb-4">الأفراد</h3>

                        @if (auth()->user()->type == '0')
                            <a href="{{ route('categoriess') }}" class="">
                                <div class="card text-center px-3 category-offer w-75 m-auto">
                                    <img src="images/order.png" width="100" height="100" class=" m-auto mt-3"
                                        alt="...">
                                    <div class="card-body">
                                        <h4 class="card-text fw-bold">اطلب طلبك</h4>
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('home') }}" class="">
                                <div class="card text-center px-3 category-offer w-75 m-auto">
                                    <img src="images/order.png" width="100" height="100" class=" m-auto mt-3"
                                        alt="...">
                                    <div class="card-body">
                                        <h4 class="card-text fw-bold">اطلب طلبك</h4>
                                    </div>
                                </div>
                            </a>
                        @endif


                        <a href="{{ route('peopleOrders') }}" class="">
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
                        @if (auth()->user()->type == '1')
                            <a href="{{ route('categoriess') }}" class="">
                                <div class="card text-center px-3 category-offer w-75 m-auto">
                                    <img src="images/order.png" width="100" height="100" class=" m-auto mt-3"
                                        alt="...">
                                    <div class="card-body">
                                        <h4 class="card-text fw-bold">اطلب طلبك</h4>
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('home') }}" class="">
                                <div class="card text-center px-3 category-offer w-75 m-auto">
                                    <img src="images/order.png" width="100" height="100" class=" m-auto mt-3"
                                        alt="...">
                                    <div class="card-body">
                                        <h4 class="card-text fw-bold">اطلب طلبك</h4>
                                    </div>
                                </div>
                            </a>
                        @endif

                        <a href="{{ route('companyOrders') }}" class="">

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
@endsection

@section('scripts')
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>

    <script>
        // import {
        //     initializeApp
        // } from "https://www.gstatic.com/firebasejs/9.17.1/firebase-app.js";
        // import {
        //     getAnalytics
        // } from "https://www.gstatic.com/firebasejs/9.17.1/firebase-analytics.js";

        var firebaseConfig = {
            apiKey: "AIzaSyBqT1-GkH853dHjTUFobaK87mwFH48hAa4",
            authDomain: "atlopsnotification.firebaseapp.com",
            projectId: "atlopsnotification",
            storageBucket: "atlopsnotification.appspot.com",
            messagingSenderId: "826378549870",
            appId: "1:826378549870:web:5a560e2e7dcfa80808847f",
            measurementId: "G-0D6PR39XLN"
        };

        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function startFCM() {
            messaging
                .requestPermission()
                .then(function() {
                    return messaging.getToken()
                })
                .then(function(response) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route('store.token') }}',
                        type: 'POST',
                        data: {
                            token: response,
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            // alert('Token stored.');
                        },
                        error: function(error) {
                            alert(error);
                        },
                    });
                }).catch(function(error) {
                    alert(error);
                });
        }

        messaging.onMessage(function(payload) {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };

            new Notification(title, options);
            // $("#refresh_div").load(window.location.href + "#refresh_div");
        });
    </script>
    {{-- FCM key : AAAAwGf_-m4:APA91bEY2ISTK0yqCd_C8jkFS5n-BRVnzKBaOZ3KYHWr4M2cuFbEDgc9tPrelBo3eeuAR3C1wapC-DzTaB_WkLMuSFSWouyv-9uQKJ_nEZz4BDkl3Wk5xVovnw9GQCv2Ig-BXxu_SmOW --}}

    {{-- sender_id : 826378549870 --}}

    <script>
        $(document).ready(function(e) {

            startFCM();

        });
    </script>
@endsection
