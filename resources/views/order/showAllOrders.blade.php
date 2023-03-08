@extends('layouts.app')

@section('content')
    <section class="my-orders my-5 orders">
        <div class="container">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item w-50" role="presentation">
                    <button class="nav-link w-100 py-3 fs-5 active fw-bold" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-ative-orders" type="button" role="tab"
                        aria-controls="pills-ative-orders" aria-selected="true">طلبات نشطة</button>
                </li>
                <li class="nav-item w-50" role="presentation">
                    <button class="nav-link w-100 py-3 fs-5 fw-bold" id="pills-ended-orders-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-ended-orders" type="button" role="tab"
                        aria-controls="pills-ended-orders" aria-selected="false">طلبات منتهية</button>
                </li>

            </ul>
            <div class="tab-content py-3" id="pills-tabContent">
                <!-- active orders -->
                <div class="tab-pane fade show active " id="pills-ative-orders" role="tabpanel"
                    aria-labelledby="pills-ative-orders-tab">
                    <ul class="nav nav-pills mb-3 w-75 m-auto" id="pills-tab" role="tablist">
                        <li class="nav-item w-50" role="presentation">
                            <button class="nav-link active w-100 py-3 fs-6" id="pills-people-orders-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-people-orders" type="button" role="tab"
                                aria-controls="pills-home" aria-selected="true">
                                تفاصيل طلب الأفراد</button>
                        </li>
                        <li class="nav-item w-50" role="presentation">
                            <button class="nav-link w-100 py-3 fs-6" id="pills-companies-orders-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-companies-orders" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false">تفاصيل طلب المؤسسات والشركات</button>
                        </li>
                    </ul>
                    <div class="tab-content w-75 m-auto" id="pills-tabContent">

                        <!-- people active orders -->
                        <div class="tab-pane fade show active" id="pills-people-orders" role="tabpanel"
                            aria-labelledby="pills-people-orders-tab">
                            <div class="row  justify-content-center">

                                @foreach ($user_orders as $order)
                                    <div class="col-sm-10 col-xs-10 my-2">
                                        <div class="row bg-white order-card mx-2">
                                            <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                                <a href="{{ route('orderdetails', ['id' => $order->id]) }}">
                                                    <img src='{{ asset($order->photo_path . $order->photo_name[0]) }}'
                                                        class=" rounded-circle img-fluid img-fluid" alt="..."
                                                        width="120px" height="120px">

                                                </a>
                                            </div>
                                            <div class="col-md-10 d-flex align-items-center">
                                                <div class="card-body pt-3 ">
                                                    <div class="d-flex justify-content-between align-items-end">
                                                        <a href="{{ route('orderdetails', ['id' => $order->id]) }}">
                                                            <h5 class="card-title">{{ $order->orderName }}</h5>
                                                        </a>
                                                        <a href="{{ route('endOrder', ['id' => $order->id]) }}"
                                                            class="text-dark fw-bold">
                                                            إنهاء الطلب
                                                        </a>

                                                    </div>
                                                    <small class="text-secondary fw-bold">{{ $order->country_name }} ,
                                                        {{ $order->town_name }}</small>
                                                    <p class="text-dark">{{ $order->orderDescription }}</p>
                                                    <div class="d-flex justify-content-between more-details">
                                                        <p class="price fw-bold">السعر المتوقع: {{ $order->startPrice }} ألف
                                                            - {{ $order->endPrice }} ألف</p>
                                                        <p class="type  fw-bold">النوع: أفراد</p>
                                                        <strong class="text-secondary">{{ $order->date }}</strong>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <!-- companies active orders -->
                        <div class="tab-pane fade" id="pills-companies-orders" role="tabpanel"
                            aria-labelledby="pills-companies-orders-tab">
                            <div class="row justify-content-center">

                                @foreach ($company_orders as $order)
                                    <div class="col-sm-10 col-xs-10 my-2">
                                        <div class="row bg-white order-card mx-2">
                                            <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                                <a href="orderDetails.html">
                                                    <img src='{{ asset($order->photo_path . $order->photo_name[0]) }}'
                                                        class=" rounded-circle img-fluid img-fluid" alt="..."
                                                        width="120px" height="120px">

                                                </a>
                                            </div>
                                            <div class="col-md-10 d-flex align-items-center">
                                                <div class="card-body pt-3 ">
                                                    <div class="d-flex justify-content-between align-items-end">
                                                        <a href="orderDetails.html">
                                                            <h5 class="card-title">{{ $order->orderName }}</h5>
                                                        </a>
                                                        <a href="{{ route('endOrder', ['id' => $order->id]) }}"
                                                            class="text-dark fw-bold">
                                                            إنهاء الطلب
                                                        </a>

                                                    </div>
                                                    <small class="text-secondary fw-bold">{{ $order->country_name }} ,
                                                        {{ $order->town_name }}</small>
                                                    <p class="text-dark">{{ $order->orderDescription }}</p>
                                                    <div class="d-flex justify-content-between more-details">
                                                        <p class="price fw-bold">السعر المتوقع: {{ $order->startPrice }}
                                                            ألف - {{ $order->endPrice }} ألف</p>
                                                        <p class="type  fw-bold">النوع: شركات ومؤسسات</p>
                                                        <strong class="text-secondary">{{ $order->date }}</strong>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ended orders -->
                <div class="tab-pane fade" id="pills-ended-orders" role="tabpanel"
                    aria-labelledby="pills-ended-orders-tab">
                    <div class="row  justify-content-center">

                        @foreach ($ended_user_order as $order)
                            <div class="col-sm-10 col-xs-10 my-2">
                                <div class="row bg-white order-card mx-2">
                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                        <a href="orderDetails.html">
                                            <img src='{{ asset($order->photo_path . $order->photo_name[0]) }}'
                                                class=" rounded-circle img-fluid img-fluid" alt="..." width="120px"
                                                height="120px">

                                        </a>
                                    </div>
                                    <div class="col-md-10 d-flex align-items-center">
                                        <div class="card-body pt-3 ">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <a href="orderDetails.html">
                                                    <h5 class="card-title">{{ $order->orderName }}</h5>
                                                </a>
                                                <a href="{{ route('rePublishOrder',['id'=>$order->id]) }}" class="text-dark fw-bold">
                                                    إعادة نشر الطلب </a>

                                            </div>
                                            <small class="text-secondary fw-bold">{{ $order->country_name }} ,
                                                {{ $order->town_name }}</small>
                                            <p class="text-dark">{{ $order->orderDescription }}</p>
                                            <div class="d-flex justify-content-between more-details">
                                                <p class="price fw-bold">السعر المتوقع: {{ $order->startPrice }} ألف -
                                                    {{ $order->endPrice }} ألف</p>
                                                <strong class="text-secondary">{{ $order->date }}</strong>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($ended_company_order as $order)
                            <div class="col-sm-10 col-xs-10 my-2">
                                <div class="row bg-white order-card mx-2">
                                    <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                        <a href="orderDetails.html">
                                            <img src='{{ asset($order->photo_path . $order->photo_name[0]) }}'
                                                class=" rounded-circle img-fluid img-fluid" alt="..." width="120px"
                                                height="120px">

                                        </a>
                                    </div>
                                    <div class="col-md-10 d-flex align-items-center">
                                        <div class="card-body pt-3 ">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <a href="orderDetails.html">
                                                    <h5 class="card-title">{{ $order->orderName }}</h5>
                                                </a>
                                                <a href="{{ route('rePublishOrder',['id'=>$order->id]) }}" class="text-dark fw-bold">
                                                    إعادة نشر الطلب </a>

                                            </div>
                                            <small class="text-secondary fw-bold">{{ $order->country_name }} ,
                                                {{ $order->town_name }}</small>
                                            <p class="text-dark">{{ $order->orderDescription }}</p>
                                            <div class="d-flex justify-content-between more-details">
                                                <p class="price fw-bold">السعر المتوقع: {{ $order->startPrice }} ألف -
                                                    {{ $order->endPrice }} ألف</p>
                                                <strong class="text-secondary">{{ $order->date }}</strong>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
