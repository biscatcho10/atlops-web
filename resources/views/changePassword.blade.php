@extends('layouts.app')

@section('content')
    <section class=" w-100 change-password" style="height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 form-cont ">
                    <form action="{{ route('changePasswordDone') }}" method="POST"
                        class="bg-white p-4 confirm-register-form form-body mt-5">
                        @csrf
                        <h2 class="modal-title w-100 fw-bold mb-4">
                            تغيير كلمة المرور </h2>
                        <div class="row">
                            <div class="col-lg-12 mb-3 input-box ">
                                <label class="mb-3 fw-bold">كلمة المرور الحالية</label>
                                <input type="password" name="current_password" class="form-control id_password  py-2"
                                    id="">
                                <i class="eye-show fas fa-eye-slash togglePassword" id=""></i>

                            </div>
                            <div class="col-lg-12 mb-3 input-box ">
                                <label class="mb-3 fw-bold">كلمة المرور الجديدة
                                </label>
                                <input type="password" name="new_password" class="form-control id_password py-2"
                                    id="">
                                <i class="eye-show fas fa-eye-slash togglePassword" id=""></i>

                            </div>
                            <div class="col-lg-12 mb-3 input-box ">
                                <label class="mb-3 fw-bold">كلمة المرور الجديدة
                                </label>
                                <input type="password" name="validate_password" class="form-control id_password py-2"
                                    id="">
                                <i class="eye-show fas fa-eye-slash togglePassword" id=""></i>

                            </div>

                        </div>


                        <div class="text-center save m-auto mb-3 mt-4">
                            <button type="submit" class="btn py-2  w-50"> تغيير </button>
                        </div>

                    </form>
                </div>

            </div>


        </div>
    </section>
@endsection
