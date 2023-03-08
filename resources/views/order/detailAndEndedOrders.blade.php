@section('content')
    <section class="order-details my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="publisher-info d-flex align-items-center justify-content-between bg-white p-3 mb-3">
                        <div class="name  d-flex align-items-center ">
                            <img src="{{ asset('Attachments/user/' . $order->getUserInfo($order->user_id)->photo) }}"
                                class="rounded-circle" width="100px" height="100">
                            <h6 class=" mb-0 me-3">{{ $order->getUserInfo($order->user_id)->firstName }}
                                {{ $order->getUserInfo($order->user_id)->lastName }}</h6>
                        </div>
                        <div class="address  d-flex align-items-center ">
                            <i class="fa-solid fa-location-dot fa-xl"></i>
                            <h6 class="mb-0 me-2 text-dark">مكة المكرمة، حي شرق</h6>
                        </div>
                        <div class="contact  d-flex align-items-center ">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn px-4" data-bs-toggle="modal"
                                data-bs-target="#{{ $modelId }}">
                                {{ $buttonName }}
                            </button>

                        </div>
                    </div>
                    <div class="order-info bg-white p-4 pb-5">
                        <div class="d-flex align-items-center ">
                            <h5 class="ms-5">{{ $order->orderName }}</h5>
                            <h5 class="me-5">الكمية: 9 سيارات</h5>
                        </div>

                        <p class="fw-bold"style="font-size:12px">{{ $order->orderDescription }} </p>
                        <div id="carouselExampleIndicators" class="carousel slide order-slider" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach ($order->photo_name as $photo)
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                @endforeach
                            </div>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset($order->photo_path . $order->photo_name[0]) }}"
                                        class="d-block w-100 " height="300" alt="...">
                                    <div class="carousel-caption d-flex align-items-center px-3 py-2">
                                        <p class="mb-0">السعر المتوقع:
                                            <br> {{ $order->startPrice }} - {{ $order->endPrice }}
                                        </p>
                                    </div>
                                </div>

                                @for ($i = 1; $i < count($order->photo_name); $i++)
                                    <div class="carousel-item">
                                        <img src="{{ asset($order->photo_path . $order->photo_name[$i]) }}"
                                            class="d-block w-100 " height="300" alt="...">
                                        <div class="carousel-caption d-flex align-items-center px-3 py-2">
                                            <p class="mb-0">السعر المتوقع:
                                                <br> {{ $order->startPrice }} - {{ $order->endPrice }}
                                            </p>
                                        </div>
                                    </div>
                                @endfor

                            </div>



                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="addition-details bg-white mb-3">
                        <div class=" p-3 cont-details">
                            <h6 class="fw-bold">التفاصيل</h6>
                            <div class=" d-flex align-items-center justify-content-between">
                                <div class="main  d-flex align-items-center ">
                                    <p>القسم الرئيسي: {{ $order->getCateg($order->category_id) }}</p>
                                </div>
                                <div class="second  d-flex align-items-center ">
                                    <p>القسم الفرعي: {{ $order->subCategory }}</p>
                                </div>
                            </div>

                            <div class="additional  d-flex align-items-center ">
                                <p>الخدمة الإضافية: {{ $order->additionalService }}</p>

                            </div>
                        </div>

                        <div class="comments">
                            <div class="p-3" id="content">
                                <h6 class="fw-bold mb-3">التعليقات</h6>
                                @foreach ($comments as $comment)
                                    <div
                                        class=" d-flex align-items-center justify-content-between position-relative comment mb-3 w-100">
                                        <div class="main  d-flex  w-100">
                                            <a href="{{ route('profile') }}">
                                                <img src="{{ asset('Attachments/user/' . $comment->getUserInfo($comment->user_id)->photo) }}"
                                                    width="50" height="50" style="border-radius: 50%;">
                                            </a>
                                            <div class="me-2 w-100 ">
                                                <h6>{{ $comment->getUserInfo($comment->user_id)->firstName }}</h6>

                                                <div class=" d-flex align-items-center justify-content-between ">
                                                    <p>{{ $comment->comment }}</p>
                                                    <p class="date">
                                                        تم النشر في {{ $comment->created_at }}
                                                    </p>
                                                </div>

                                                {{-- <div id="content_reply-{{ $comment->id }}">
                                                    @foreach ($comment->getChildComment($comment->id) as $item)
                                                        <div class="mt-3 d-flex  w-100">
                                                            <a href="">
                                                                <img src="{{ asset('Attachments/user/' . $item->getUserInfo($item->user_id)->photo) }}"
                                                                    width="50" height="50"
                                                                    style="border-radius: 50%;">
                                                            </a>
                                                            <div class="me-2 w-100 ">
                                                                <h6>{{ $item->getUserInfo($item->user_id)->firstName }}
                                                                </h6>

                                                                <div
                                                                    class=" d-flex align-items-center justify-content-between ">
                                                                    <p>{{ $item->comment }}</p>
                                                                    <p class="date">
                                                                        تم النشر في {{ $item->created_at }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div> --}}

                                                {{-- الجزء الخاص بالرد ع الكومنتات --}}
                                                <div id="content_reply-{{ $comment->id }}">
                                                    @if (count($comment->getChildComment()) > 0)
                                                        @foreach ($comment->getChildComment() as $item)
                                                            <div class="mt-3 d-flex  w-100">
                                                                <a href="">
                                                                    <img src="{{ asset('Attachments/user/' . $item->getUserInfo($item->user_id)->photo) }}"
                                                                        width="50" height="50"
                                                                        style="border-radius: 50%;">
                                                                </a>
                                                                <div class="me-2 w-100 ">
                                                                    <h6>{{ $item->getUserInfo($item->user_id)->firstName }}
                                                                    </h6>

                                                                    <div
                                                                        class=" d-flex align-items-center justify-content-between ">
                                                                        <p>{{ $item->comment }}</p>
                                                                        <p class="date">
                                                                            تم النشر في {{ $item->created_at }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>

                                                <div id="reply_button-{{ $comment->id }}">
                                                    <div onclick="comment({{ $comment->id }})" id="{{ $comment->id }}"
                                                        class="d-flex align-items-center reply-comment">
                                                        <i class="fa-solid fa-reply"></i>
                                                        <h6 class=mx-2>رد</h6>
                                                    </div>
                                                </div>


                                                <div class="menu" id="comment-{{ $comment->id }}"
                                                    style="display: none;">
                                                    <form id="replyForm-{{ $comment->id }}" action="#" method="POST"
                                                        enctype="multipart/form-data"
                                                        class="send-comment d-flex align-items-center justify-content-between bg-white mb-3">
                                                        @csrf
                                                        <div class=" d-flex align-items-center comment position-relative">

                                                            <a href="{{ route('profile') }}">
                                                                <img src="{{ asset('Attachments/user/' . auth()->user()->photo) }}"
                                                                    class="rounded-circle" width="40px" height="40px">
                                                            </a>

                                                            <input type="text" name="comment"
                                                                class="form-control mx-2 ps-5"
                                                                placeholder="اكتب تعليقك هنا" aria-describedby="">

                                                            <input type="text" name="comment_id"
                                                                value="{{ $comment->id }}" hidden>

                                                            <input type="text" name="user_id"
                                                                value="{{ auth()->user()->id }}" hidden>

                                                            <input type="text" name="order_id"
                                                                value="{{ $order->id }}" hidden>

                                                            <div
                                                                class="cam d-flex align-items-center justify-content-center ">
                                                                <label for="upload-photo"><i
                                                                        class="fa-solid fa-camera fa-xl"></i></label>
                                                                <input type="file" name="photo" id="upload-photo"
                                                                    class="d-none">
                                                            </div>

                                                        </div>
                                                        <div class="contact  d-flex align-items-center ">
                                                            <!-- Button trigger modal -->
                                                            <button onclick="replyComment({{ $comment->id }})"
                                                                class="btn px-2">
                                                                إرسال
                                                            </button>

                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <form id="form"
                                class="send-comment d-flex align-items-center justify-content-between bg-white mb-3 mt-5 p-3"
                                method="POST" action="#" enctype="multipart/form-data">
                                @csrf
                                <div class=" d-flex align-items-center comment position-relative">

                                    <a href="{{ route('profile') }}">
                                        <img src="{{ asset('Attachments/user/' . auth()->user()->photo) }}"
                                            class="rounded-circle" width="50px" height="50">
                                    </a>

                                    <input type="comment" name="comment" class="form-control mx-2 ps-5"
                                        placeholder="اكتب تعليقك هنا" aria-describedby="">

                                    <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
                                    <input type="text" name="order_id" value="{{ $order->id }}" hidden>
                                    <input type="text" name="auth_name" value="{{ auth()->user()->firstName }}"
                                        hidden>
                                    <input type="text" name="auth_photo" value="{{ auth()->user()->photo }}" hidden>

                                    <div class="cam d-flex align-items-center justify-content-center ">
                                        <label for="upload-photo"><i class="fa-solid fa-camera fa-xl"></i></label>
                                        <input type="file" name="photo" id="upload-photo" class="d-none">
                                    </div>

                                </div>
                                <div class="contact  d-flex align-items-center ">
                                    <!-- Button trigger modal -->
                                    <button onclick="makeOrderComment()" class="btn px-2">
                                        إرسال
                                    </button>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Modal for order details page -->
    <div class="modal fade contactType-modal" id="contactType" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-block">
                    <h5 class="modal-title text-center" id="exampleModalLabel"> حدد طريقة التواصل</h5>
                </div>
                <div class="modal-body">
                    <div class="d-flex  justify-content-between form-check">
                        <div>
                            <input class="form-check-input mx-2" type="radio" name="servieType" id="mobile">
                            <i class="fa-solid fa-phone-volume mx-2"></i>

                            <input class="form-check-label mx-2" id="myMobile" style="direction: ltr;" readonly
                                for="mobile" value="{{ $order->getUserInfo($order->user_id)->phone }}">

                        </div>
                        <div class="copy">
                            <button onclick="myFunction()">
                                <i class="fa-regular fa-copy text-secondary"></i>
                            </button>
                            <span class="copyText">نسخ</span>
                        </div>

                    </div>

                    @livewire('chat.create-chat',['user'=> $order->getUserInfo($order->user_id)->id ])
                    
                    {{-- <div class="form-check">
                        <input class="form-check-input mx-2" type="radio" name="servieType" id="message">
                        <i class="fa-solid fa-envelope mx-2"></i>
                        <label class="form-check-label mx-2" for="message">
                            إرسال عبر رسائل الموقع
                        </label>
                    </div> --}}

                </div>

            </div>
        </div>
    </div>


    <!-- Modal for end order -->
    <div class="modal model-end-order fade" id="endOrderModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content w-auto m-auto">

                <a href="{{ route('endOrderDone', ['id' => $order->id]) }}">
                    <div class="modal-body">
                        <h5> تم إنهاء منتجك بنجاح !</h5>
                    </div>
                </a>

            </div>
        </div>
    </div>
@endsection
