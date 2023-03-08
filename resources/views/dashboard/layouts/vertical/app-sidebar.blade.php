    {{-- <!--aside open-->
    <aside class="app-sidebar">
        <div class="app-sidebar__logo">
            <a class="header-brand" href="{{ url('index') }}">
                <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-lgo"
                    alt="Azea logo">
                <img src="{{ asset('assets/images/brand/logo1.png') }}" class="header-brand-img dark-logo" alt="Azea logo">
                <img src="{{ asset('assets/images/brand/favicon.png') }}" class="header-brand-img mobile-logo"
                    alt="Azea logo">
                <img src="{{ asset('assets/images/brand/favicon1.png') }}" class="header-brand-img darkmobile-logo"
                    alt="Azea logo">
            </a>
        </div>
        <ul class="side-menu app-sidebar3">
            <li class="side-item side-item-category">الرئيسية</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z" />
                    </svg>
                    <span class="side-menu__label">الصفحة الرئيسية</span></a>
            </li>
            <li class="side-item side-item-category">قسم الاعدادات</li>

            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11-6h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6H5v-4h4v4zm8-6c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z" />
                    </svg>
                    <span class="side-menu__label">الاعدادات</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="slide-menu ">

                    <li class="sub-slide">
                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0);"><span
                                class="sub-side-menu__label">الاعدادات العامة</span><i
                                class="sub-angle fe fe-chevron-right"></i></a>
                        <ul class="sub-slide-menu">
                            <li><a class="sub-slide-item" href="{{ url('country') }}">المدن</a></li>
                            <li><a class="sub-slide-item" href="{{ url('categories') }}">الفئات</a></li>
							<li><a class="sub-slide-item" href="{{ url('chat') }}">الأقسام الرئيسية</a></li>
                            <li><a class="sub-slide-item" href="{{ url('chat2') }}">الأقسام الفرعية</a></li>
							<li><a class="sub-slide-item" href="{{ url('chat') }}">الخيارات الاضافية</a></li>

                        </ul>
                    </li>

                    <li class="sub-slide">
                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0);"><span
                                class="sub-side-menu__label">اعدادات البنك</span><i
                                class="sub-angle fe fe-chevron-right"></i></a>
                        <ul class="sub-slide-menu">
                            <li><a class="sub-slide-item" href="{{ url('contact-list') }}">اعدادات البنك</a></li>
                        </ul>
                    </li>

                    <li class="sub-slide">
                        <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0);"><span
                                class="sub-side-menu__label">اعدادات التطبيقات</span><i
                                class="sub-angle fe fe-chevron-right"></i></a>
                        <ul class="sub-slide-menu">
                            <li><a class="sub-slide-item" href="{{ url('file-manager') }}">الشروط والأحكام</a></li>
                            <li><a class="sub-slide-item" href="{{ url('file-manager-list') }}">من نحن</a></li>
							<li><a class="sub-slide-item" href="{{ url('file-manager-list') }}">التواصل مع الادارة</a></li>
                        </ul>
                    </li>

                </ul>
            </li>




            <li class="side-item side-item-category">قسم الطلبات</li>
			<li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon " width="24" height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 22c4.879 0 9-4.121 9-9s-4.121-9-9-9-9 4.121-9 9 4.121 9 9 9zm0-16c3.794 0 7 3.206 7 7s-3.206 7-7 7-7-3.206-7-7 3.206-7 7-7zm5.284-2.293 1.412-1.416 3.01 3-1.413 1.417zM5.282 2.294 6.7 3.706l-2.99 3-1.417-1.413z" />
                        <path d="M11 9h2v5h-2zm0 6h2v2h-2z" />
                    </svg>
                    <span class="side-menu__label">الطلبات</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="slide-menu">
                    <li><a href="{{ url('element-border') }}" class="slide-item"> الطلبات ( المؤساسات والشركات )</a></li>
                    <li><a href="{{ url('element-colors') }}" class="slide-item"> الطلبات ( الأفراد )</a></li>
                </ul>
            </li>

            <li class="side-item side-item-category">قسم الصلاحيات</li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11 4h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6h-4v-4h4v4zM17 3c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2zM7 13c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z" />
                    </svg>
                    <span class="side-menu__label">الصلاحيات والمناصب</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="slide-menu ">
                    <li><a href="{{ url('widgets2') }}" class="slide-item">الصلاحيات والمناصب</a></li>
                </ul>
            </li>

			<li class="side-item side-item-category">قسم المستخدمين</li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11 4h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6h-4v-4h4v4zM17 3c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2zM7 13c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z" />
                    </svg>
                    <span class="side-menu__label">المستخدمسن</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="slide-menu ">
                    <li><a href="{{ url('widgets2') }}" class="slide-item">قائمة المستخدمين</a></li>
                </ul>
            </li>


            <li class="side-item side-item-category">قسم الاشعارات</li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M3 11h8V3H3zm2-6h4v4H5zM3 21h8v-8H3zm2-6h4v4H5zm8-12v8h8V3zm6 6h-4V5h4zm-5.99 4h2v2h-2zm2 2h2v2h-2zm-2 2h2v2h-2zm4 0h2v2h-2zm2 2h2v2h-2zm-4 0h2v2h-2zm2-6h2v2h-2zm2 2h2v2h-2z" />
                    </svg>
                    <span class="side-menu__label">الاشعارات</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="slide-menu">
                    <li><a href="{{ url('construction') }}" class="slide-item">الاشعارات</a></li>
                </ul>
            </li>

        </ul>
    </aside>
    <!--aside closed--> --}}



    <!--aside open-->
    <aside class="app-sidebar">
        <div class="app-sidebar__logo">
            <a class="header-brand" href="{{ url('index') }}">
                <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-lgo"
                    alt="Azea logo">
                <img src="{{ asset('assets/images/brand/logo1.png') }}" class="header-brand-img dark-logo" alt="Azea logo">
                <img src="{{ asset('assets/images/brand/favicon.png') }}" class="header-brand-img mobile-logo"
                    alt="Azea logo">
                <img src="{{ asset('assets/images/brand/favicon1.png') }}" class="header-brand-img darkmobile-logo"
                    alt="Azea logo">
            </a>
        </div>
        <ul class="side-menu app-sidebar3">
            <li class="side-item side-item-category">الصفحة الرئيسية</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z" />
                    </svg>
                    <span class="side-menu__label">لوحة التحكم</span></a>
            </li>
            <li class="side-item side-item-category">العناصر</li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 22c4.879 0 9-4.121 9-9s-4.121-9-9-9-9 4.121-9 9 4.121 9 9 9zm0-16c3.794 0 7 3.206 7 7s-3.206 7-7 7-7-3.206-7-7 3.206-7 7-7zm5.284-2.293 1.412-1.416 3.01 3-1.413 1.417zM5.282 2.294 6.7 3.706l-2.99 3-1.417-1.413z" />
                        <path d="M11 9h2v5h-2zm0 6h2v2h-2z" />
                    </svg>
                    <span class="side-menu__label">المستخدمين</span>
                    <i class="fas fa-chevron-left fa-xs"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{ route('admins.index') }}" class="slide-item"> المديرين</a></li>
                </ul>
                <ul class="slide-menu">
                    <li><a href="{{ route('dashboard.roles.index') }}" class="slide-item"> الادوار</a></li>
                </ul>
            </li>

        </ul>
    </aside>
    <!--aside closed-->
