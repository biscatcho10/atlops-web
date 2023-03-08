@extends('layouts.app')

@section('content')
    <section class="confirm-register edit-profile w-100 " style="height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8 form-cont ">
                    <form action=" {{ route('saveEditProfile', ['id' => Auth::id()]) }}" method="POST"
                        class="bg-white p-4 confirm-register-form form-body mt-5" enctype="multipart/form-data">
                        @csrf
                        <h2 class="modal-title w-100 fw-bold mb-4">تعديل البيانات الشخصية </h2>
                        <h6 class="fw-bold mb-4"> الصورة الشخصية
                        </h6>
                        <div class="d-flex  align-items-center change-img mb-4 p-2 w-100">
                            <div class="  d-flex justify-content-center align-items-center">
                                <div class=" ">
                                    <img src='{{ asset('Attachments/user/' . auth()->user()->photo) }}' width="80px"
                                        height="80px" id="img">
                                    <input type="file" name="photo" id="upload-photo"
                                        onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])" />
                                </div>
                            </div>
                            <label for="upload-photo" class="text-dark mx-4 fw-bold">تغيير الصورة الشخصية</label>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-3 ">
                                <label class="mb-3 fw-bold"> اسم المستخدم الأول</label>
                                <input type="text" value="{{ $user->firstName }}" name="firstName" class="form-control"
                                    id="">
                            </div>
                            <div class="col-lg-6 mb-3 ">
                                <label class="mb-3 fw-bold">اسم المستخدم الثاني</label>
                                <input type="text" value="{{ $user->lastName }}" name="lastName" class="form-control"
                                    id="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-3 fw-bold">البريد الالكتروني</label>
                                <input type="email" value="{{ $user->email }}" name="email" class="form-control"
                                    id="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-3 fw-bold"> رقم الجوال</label>
                                <input type="text" value="{{ $user->phone }}" name="phone" class="form-control"
                                    id="">
                            </div>

                            <div class="col-md-12 mb-3 input-box">
                                <label class="mb-3 fw-bold"> نبذة عن المستخدم </label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea">{{ $user->userDetails }}</textarea>
                                </div>
                            </div>

                            <label class="mb-3 fw-bold"> طريقة التواصل</label>
                            <div class="col-md-4 mb-3">

                                <input type="radio" name="type" value="رقم الجوال" class="  form-check-input"
                                    id="info_gender">
                                <label class=""> رقم الجوال
                                </label>
                            </div>
                            <div class="col-lg-5 col-md-8 mb-3">

                                <input type="radio" name="type" value="رسائل الموقع الالكتروني"
                                    class="me-3  form-check-input" id="info_gender">
                                <label class=""> رسائل الموقع الالكتروني
                                </label>
                            </div>
                            <div class="col-md-10 mb-1">

                                <a href="{{ route('changePassword') }}" class="me-3 change-password-link fw-bold">تغيير كلمة
                                    المرور</a>

                            </div>

                        </div>


                        <div class="text-center save m-auto mb-3 mt-4">
                            <button type="submit" class="btn py-2  w-50">حفظ</button>
                        </div>

                    </form>
                </div>

            </div>


        </div>
    </section>
@endsection
