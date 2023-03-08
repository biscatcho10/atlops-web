@extends('layouts.app')

@section('content')
    <section class="favorites my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 ">
                    <h3 class="fav-header">المفضلة</h3>

                </div>
            </div>
            <div class="row justify-content-center">

                @foreach ($orders as $order)
                    <div class="col-md-10 card mb-3 order-card">
                        <div class="row g-0 bg-white">
                            <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                                <a href="{{ route('orderdetails', ['id' => $order->id]) }}">
                                    <img src='{{ asset($order->photo_path . $order->photo_name[0]) }}'
                                        class=" rounded-circle img-fluid img-fluid" alt="..." width="120px"
                                        height="120px">

                                </a>
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('orderdetails', ['id' => $order->id]) }}">
                                            <h5 class="card-title">{{ $order->orderName }}</h5>
                                        </a>

                                        @if ($order->getfav(auth()->user()->id, $order->id))
                                            <a href="" id="addWish" class="like"
                                                onclick="addtowishlist({{ $order->id }},{{ auth()->user()->id }})">
                                                <i class="fas fa-heart fa-2xl" id="wishlist-{{ $order->id }}"></i>
                                            </a>
                                        @else
                                            <a href="" id="addWish" class="like"
                                                onclick="addtowishlist({{ $order->id }},{{ auth()->user()->id }})">
                                                <i class="far fa-heart fa-2xl" id="wishlist-{{ $order->id }}"></i>
                                            </a>
                                        @endif

                                    </div>
                                    <small class="text-secondary fw-bold">{{ $order->country_name }} ,
                                        {{ $order->town_name }}</small>
                                    <p class="text-dark">{{ $order->orderDescription }}</p>
                                    <div class="d-flex justify-content-between more-details">
                                        <p class="price fw-bold">السعر المتوقع: {{ $order->startPrice }} ألف -
                                            {{ $order->endPrice }} ألف</p>
                                        <p class="price fw-bold">الكمية: 9 سيارات</p>

                                        <strong class="text-secondary">{{ $order->date }}</strong>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
@endsection 

@section('scripts')
    {{-- script to add and remove order to wishlist --}}
    <script>
        function addtowishlist($order_id, $user_id) {
            event.preventDefault();
            const CSRF_TOKEN = $('meta[name="csrf_token"]').attr('cnotent');
            var love_order;
            order_id = $order_id;
            // console.log(order_id);
            user_id = $user_id;

            // function to get the value of love_order of specific order and then check it
            $.ajax({
                url: "/api/order/getlovedorder",
                type: "post",
                data: {
                    CSRF_TOKEN,
                    'order_id': $order_id,
                    'user_id': $user_id
                },
                success: function(response) {
                    callback(response);
                    //alert(response);
                }
            });

            function callback(response) {
                love_order = response;
                //console.log(love_order);

                if (love_order == "0") {
                    $('#wishlist-' + order_id).removeClass("far fa-heart fa-2xl").addClass("fas fa-heart fa-2xl");
                    $.ajax({
                        url: "/api/order/addtowishlist",
                        type: 'post',
                        data: {
                            CSRF_TOKEN,
                            'order_id': $order_id,
                            'user_id': $user_id
                        },
                        success: function(data) {
                            // alert('تم اضافه المنتج الى المفضلة')
                        }
                    })

                } else {
                    $('#wishlist-' + order_id).removeClass("fas fa-heart fa-2xl").addClass("far fa-heart fa-2xl");
                    $.ajax({
                        url: "/api/order/removefromwishlist",
                        type: 'post',
                        data: {
                            CSRF_TOKEN,
                            'order_id': $order_id,
                            'user_id': $user_id
                        },
                        success: function(data) {
                            // alert('تم حذف المنتج من المفضلة')
                        }
                    })
                }
            }
        }
    </script>

@endsection
