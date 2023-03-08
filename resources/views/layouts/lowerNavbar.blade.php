<!-- start navbar -->
<nav>
    <div class="container">
        <div class="position-fixed text-uppercase  pt-2 start-0 text-center bottom-0 w-100" role=navigation>
            <div class="container">
                <div class=" p-3 shadow-lg  bottom-navbar">
                    <div class="d-flex align-items-center justify-content-around">
                        <div class="navLink navLinkActive"><a href={{ route('home') }}>
                                <div class="mb-2"><i class="fa-solid fa-house-chimney-window fa-xl"></i></div>
                                <div class=navLabel>الرئيسية</div>
                            </a></div>
                        <div class=navLink><a href={{ route('allOrders') }}>
                                <div class="mb-2"><i class="fa-solid fa-cart-shopping fa-xl"></i></div>
                                <div class=navLabel>طلباتي</div>
                            </a></div>

                        <div class=navLink><a href={{ route('chat') }}>
                                <div class="mb-2"><i class="fa-regular fa-message fa-xl"></i></div>
                                <div class=navLabel>رسائلي</div>
                            </a></div>
                        <div class=navLink><a href="{{ route('profile') }}">
                                <img src='{{ asset('Attachments/user/' . auth()->user()->photo) }}' width="40px"
                                    height="40">
                                <div class=navLabel>حسابي</div>
                            </a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- end navbar -->
