@extends('layouts.app')

@section('content')
    <section class="profile w-100 " style="height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 ">
                    <div class="user-details my-5 bg-white py-4 px-5   m-auto">
                        <div class="user-info d-flex align-items-center justify-content-between  mb-3">
                            <div class="name  d-flex align-items-center ">
                                <img src="Attachments/user/{{ $user->photo }}" class="rounded-circle" width="120px" height="120">
                                <h6 class=" mb-0 me-3">{{ $user->firstName }} {{ $user->lastName }}</h6>
                            </div>
                            <div class="address  d-flex align-items-center ">
                                <i class="fa-solid fa-location-dot fa-xl"></i>
                                <span class="mb-0 me-2 text-dark fs-6">مكة المكرمة، حي شرق</span>
                            </div>
                            <div class="edit  d-flex align-items-center ">
                                <!-- Button trigger modal -->
                                <a class="btn px-3" href="{{ route('profileUpdate', ['id' => Auth::id()]) }}">
                                    تعديل البيانات
                                </a>

                            </div>
                        </div>
                        <div class=" d-flex align-items-center justify-content-between  mb-3 contact-info">
                            <div class="">
                                <h6 class="mb-2"> البريد الالكتروني</h6>
                                <h6 class="data">{{ $user->email }}</h6>

                            </div>
                            <div class="">
                                <h6 class="text-dark mb-2"> رقم الجوال</h6>
                                <h6 class="data phone">{{ $user->phone }}</h6>
                            </div>
                            <div class="">
                                <h6 class="mb-2">طريقة التواصل</h6>
                                <h6 class="data">{{ $user->communication }}</h6>

                            </div>
                        </div>
                        <div class="desc">
                            <h6>نبذة عن المستخدم</h6>
                            <p>{{ $user->userDetails }}</p>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
