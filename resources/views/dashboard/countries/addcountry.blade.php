@extends('dashboard.layouts.app')

@section('styles')

		<!-- INTERNAL Select2 css -->
		<link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

		<!-- INTERNAL File Uploads css -->
		<link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

		<!-- INTERNAL File Uploads css-->
        <link href="{{asset('assets/plugins/fileupload/css/fileupload.css')}}" rel="stylesheet" type="text/css" />

		<!-- INTERNAL Mutipleselect css-->
		<link rel="stylesheet" href="{{asset('assets/plugins/multipleselect/multiple-select.css')}}">

		<!-- INTERNAL Sumoselect css-->
		<link rel="stylesheet" href="{{asset('assets/plugins/sumoselect/sumoselect.css')}}">

		<!-- INTERNAL telephoneinput css-->
		<link rel="stylesheet" href="{{asset('assets/plugins/telephoneinput/telephoneinput.css')}}">

		<!-- INTERNAL Jquerytransfer css-->
		<link rel="stylesheet" href="{{asset('assets/plugins/jQuerytransfer/jquery.transfer.css')}}">
		<link rel="stylesheet" href="{{asset('assets/plugins/jQuerytransfer/icon_font/icon_font.css')}}">

		<!-- INTERNAL multi css-->
		<link rel="stylesheet" href="{{asset('assets/plugins/multi/multi.min.css')}}">

@endsection

@section('content')

						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0 text-primary">Form Validations</h4>
							</div>
							<div class="page-rightheader">
								<div class="btn-list">
									<button class="btn btn-outline-primary"><i class="fe fe-download"></i>
										Import</button>
									<a href="javascript:void(0);"  class="btn btn-primary btn-pill" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-calendar me-2 fs-14"></i> Search By Date</a>
									<div class="dropdown-menu border-0">
											<a class="dropdown-item" href="javascript:void(0);">Today</a>
											<a class="dropdown-item" href="javascript:void(0);">Yesterday</a>
											<a class="dropdown-item active bg-primary text-white" href="javascript:void(0);">Last 7 days</a>
											<a class="dropdown-item" href="javascript:void(0);">Last 30 days</a>
											<a class="dropdown-item" href="javascript:void(0);">Last Month</a>
											<a class="dropdown-item" href="javascript:void(0);">Last 6 months</a>
											<a class="dropdown-item" href="javascript:void(0);">Last year</a>
									</div>
								</div>
							</div>
						</div>
						<!--End Page header-->

						<!--Row-->
						<div class="row">

							<div class="col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Default Validation</h3>
									</div>
									<div class="card-body">
										<form class="row g-3" method="POST" action="{{ route('addCountrydone') }}">
                                            @csrf
											<div class="col-md-4">
											  <label for="validationDefault01" class="form-label"> اسم المدينة</label>
											  <input placeholder="ادخل اسم المدينة" type="text" name="country_name" class="form-control"  value="" required>
											</div>
											
											<div class="col-12">
											  <button class="btn btn-primary" type="submit">تاكيد</button>
											</div>
										  </form>
									</div>
								</div>
							</div>
                            
						</div>
						<!--/Row-->
                        <!-- Row -->
						<div class="row ">
							<div class="col-md-12">

							</div>
						</div>
						<!-- /Row -->

@endsection('content')

@section('scripts')

		<!-- INTERNAL Select2 js -->
		<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
		<script src="{{asset('assets/js/select2.js')}}"></script>

		<!-- INTERNAL Timepicker js -->
		<script src="{{asset('assets/plugins/time-picker/jquery.timepicker.js')}}"></script>
		<script src="{{asset('assets/plugins/time-picker/toggles.min.js')}}"></script>

		<!-- INTERNAL Datepicker js -->
		<script src="{{asset('assets/plugins/date-picker/date-picker.js')}}"></script>
		<script src="{{asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>
		<script src="{{asset('assets/plugins/input-mask/jquery.maskedinput.js')}}"></script>

		<!-- INTERNAL File-Uploads Js-->
		<script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
        <script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
        <script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
        <script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
        <script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

		<!-- INTERNAL File uploads js -->
        <script src="{{asset('assets/plugins/fileupload/js/dropify.js')}}"></script>
		<script src="{{asset('assets/js/filupload.js')}}"></script>

		<!-- INTERNAL Multipleselect js -->
		<script src="{{asset('assets/plugins/multipleselect/multiple-select.js')}}"></script>
		<script src="{{asset('assets/plugins/multipleselect/multi-select.js')}}"></script>

		<!--INTERNAL Sumoselect js-->
		<script src="{{asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>

		<!--INTERNAL telephoneinput js-->
		<script src="{{asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
		<script src="{{asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

		<!--INTERNAL jquery transfer js-->
		<script src="{{asset('assets/plugins/jQuerytransfer/jquery.transfer.js')}}"></script>

		<!--INTERNAL multi js-->
		<script src="{{asset('assets/plugins/multi/multi.min.js')}}"></script>

		<!--Form Validations js-->
		<script src="{{asset('assets/js/form-vallidations.js')}}"></script>

@endsection
