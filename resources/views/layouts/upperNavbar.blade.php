 <!-- start navbar -->
 <nav class=" w-100 shadow sticky-top bg-white">
     <div class="d-flex justify-content-between p-3 align-items-center container ">
         <div>
             <a href="{{ route('home') }}">
                 <img src="{{ asset('images/logo.png') }}" alt="Company Logo" height="48" width="100px">

             </a>
         </div>
         <div>
             <div id="refresh_div">
                 <div class="d-flex position-relative align-items-center refresh">

                     <ul class='navbar-nav-icons'>
                         <li class='nav-item position-relative'>
                             <a class='nav-link dropdown-toggle' aria-current='page' href='#' type="button"
                                 id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                 <i class="fas fa-bell"></i> </a>

                             <ul class="dropdown-menu notification-menu my-0 py-0 shadow"
                                 aria-labelledby="dropdownMenuButton1">

                                 @foreach (auth()->user()->unreadNotifications as $notification)
                                     <li class="">
                                         <a class="d-flex p-2 active w-100"
                                             href="orderNotificationDetails/{{ $notification->data['order_id'] }}/{{ $notification->id }}">
                                             <img src="{{ asset('Attachments/user/' . $notification->data['user_img']) }}"
                                                 width="40" height="40" style="border-radius: 50%;">
                                             <div class=" mx-2">
                                                 <h6 class="mb-0 name">{{ $notification->data['user_fname'] }}
                                                     {{ $notification->data['user_lname'] }}</h6>
                                                 <p class="time text-end mt-1 text-dark">{{ $notification->created_at }}
                                                 </p>
                                             </div>
                                             <p class="mb-0 mx-1 content  text-dark">{{ $notification->data['title'] }}
                                             </p>
                                         </a>
                                     </li>
                                 @endforeach

                             </ul>
                             <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">
                                 {{ auth()->user()->unreadNotifications->count() }}
                             </span>
                         </li>
                     </ul>


                     <div class="d-flex align-items-center login-button mx-3">
                         {{-- <a href="login.html" class="custom-link">تسجيل الدخول <i class="ms-1 gg-chevron-down "></i></a> --}}
                     </div>
                     <div id="subMenu">
                         <span class="hamLine"></span>
                         <span class="hamLine"></span>
                         <span class="hamLine"></span>
                     </div>
                     <div id="fullPageMenu" class="visually-hidden">
                         <div class="anton d-flex align-items-center position-fixed  start-0 blurOverlay">
                             <div class="container">
                                 <div class="my-4"><a href="{{ route('favorites') }}" class="custom-link"> <i><i
                                                 class="fa-solid fa-heart ms-2 fa-xl"></i></i><span>المفضلة</span></a>
                                 </div>
                                 <div class="my-4"><a href="blogs.html" class="custom-link"><i
                                             class="fa-solid fa-pen-to-square ms-2 fa-xl"></i>المدونة </a></div>
                                 <div class="my-4"><a href="bankAccount.html" class="custom-link"> <i
                                             class="fa-solid fa-money-bill-trend-up ms-2 fa-xl "></i>الحساب البنكى</a>
                                 </div>
                                 <div class="my-4"><a href="conditions.html" class="custom-link"><i
                                             class="fa-solid fa-file-lines ms-2 fa-xl"></i>
                                         الشروط والاحكام</a></div>

                                 <div class="my-4"><a href="aboutUs.html" class="custom-link"><i
                                             class="fa-solid fa-users ms-2 fa-xl"></i>من نحن
                                     </a></div>
                                 <div class="my-4"><a href="{{ route('signout') }}" class="custom-link"><i
                                             class="fa-solid fa-right-from-bracket ms-2 fa-xl"></i>تسجيل الخروج </a>
                                 </div>
                                 <div class="side-navbar-content">
                                     <div class="my-4">
                                         <ul class='side-nav-notifications navbar-nav-icons'>
                                             <li class='nav-item position-relative'>
                                                 <a class='nav-link dropdown-toggle custom-link' aria-current='page'
                                                     href='#' type="button" id="dropdownMenuButton1"
                                                     data-bs-toggle="dropdown" aria-expanded="false">
                                                     <i class="fas fa-bell"></i> </a>
                                                 <ul class="dropdown-menu notification-menu my-0 py-0 shadow"
                                                     aria-labelledby="dropdownMenuButton1">
                                                     <li class="">
                                                         <a class="d-flex p-2 active w-100" href="#">
                                                             <img src="images/user2.png" width="40" height="40">
                                                             <div class=" mx-2">
                                                                 <h6 class="mb-0 name">أحمد محمد</h6>
                                                                 <p class="time text-end mt-1 text-dark">منذ 3 دقائق</p>
                                                             </div>

                                                             <p class="mb-0 mx-1 content  text-dark">علّق لك على منتجك
                                                                 الجديد</p>
                                                         </a>

                                                     </li>
                                                     <li class="">
                                                         <a class="d-flex p-2  w-100" href="#">
                                                             <img src="images/user2.png" width="40" height="40">
                                                             <div class=" mx-2">
                                                                 <h6 class="mb-0 name">أحمد محمد</h6>
                                                                 <p class="time text-end mt-1 text-dark">منذ 3 دقائق</p>
                                                             </div>

                                                             <p class="mb-0 mx-1 content  text-dark">علّق لك على منتجك
                                                                 الجديد</p>
                                                         </a>

                                                     </li>
                                                     <li class="">
                                                         <a class="d-flex p-2  w-100" href="#">
                                                             <img src="images/user2.png" width="40"
                                                                 height="40">
                                                             <div class=" mx-2">
                                                                 <h6 class="mb-0 name">أحمد محمد</h6>
                                                                 <p class="time text-end mt-1 text-dark">منذ 3 دقائق
                                                                 </p>
                                                             </div>

                                                             <p class="mb-0 mx-1 content  text-dark">علّق لك على منتجك
                                                                 الجديد</p>
                                                         </a>

                                                     </li>
                                                     <li class="">
                                                         <a class="d-flex p-2  w-100" href="#">
                                                             <img src="images/user2.png" width="40"
                                                                 height="40">
                                                             <div class=" mx-2">
                                                                 <h6 class="mb-0 name">أحمد محمد</h6>
                                                                 <p class="time text-end mt-1 text-dark">منذ 3 دقائق
                                                                 </p>
                                                             </div>

                                                             <p class="mb-0 mx-1 content  text-dark">علّق لك على منتجك
                                                                 الجديد</p>
                                                         </a>

                                                     </li>
                                                     <li class="">
                                                         <a class="d-flex p-2  w-100" href="#">
                                                             <img src="images/user2.png" width="40"
                                                                 height="40">
                                                             <div class=" mx-2">
                                                                 <h6 class="mb-0 name">أحمد محمد</h6>
                                                                 <p class="time text-end mt-1 text-dark">منذ 3 دقائق
                                                                 </p>
                                                             </div>

                                                             <p class="mb-0 mx-1 content  text-dark">علّق لك على منتجك
                                                                 الجديد</p>
                                                         </a>

                                                     </li>


                                                 </ul>
                                                 <span
                                                     class="position-absolute top-0 start-70  translate-middle badge rounded-pill">
                                                     20
                                                 </span>
                                             </li>
                                         </ul>
                                     </div>
                                     <div class="my-4">
                                         <div class="d-flex align-items-center login-button ">
                                             <a href="#" class="custom-link text-white">تسجيل الدخول <i
                                                     class="ms-1 gg-chevron-down "></i></a>
                                         </div>
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
