@extends('dashboard.layouts.app')

@section('styles')
    <!-- Simplebar css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}">

    <!-- INTERNAL Morris Charts css -->
    <link href="{{ asset('assets/plugins/morris/morris.css') }}" rel="stylesheet" />

    <!-- INTERNAL Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- Data table css -->
    <link href="{{ asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <div class="btn-list">
                <a href="{{ route('addCountry') }}" class="btn btn-outline-primary"><i class="fe fe-plus"></i>
                    إضافة دولة</a>
            </div>
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول الدول</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>اسم الدولة</th>
                                <th>عمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($country as $coun)
                                <tr>
                                    <th scope="row">{{ $count++ }}</th>
                                    <td><a href="{{ route('townsCountry', ['id' => $coun->id]) }}">{{ $coun->country_name }}
                                        </a></td>
                                    <td>
                                        <div class="btn-group mt-2 mb-2">
                                            <button type="button" class="btn btn-primary btn-pill dropdown-toggle"
                                                data-bs-toggle="dropdown">
                                                العمليات <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li class="dropdown-plus-title">
                                                    Dropdown
                                                    <b class="fa fa-angle-up" aria-hidden="true"></b>
                                                </li>
                                                <li><a href="{{ route('editCountry', ['id' => $coun->id]) }}">تعديل
                                                        الدولة</a></li>
                                                <li><a data-bs-toggle="modal" data-bs-target="#normalmodal"
                                                        data-id_country="{{ $coun->id }}">حذف الدولة</a>
                                                </li>
                                                <li><a href="{{ route('townsCountry', ['id' => $coun->id]) }}">عرض المدن</a></li>
                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- table-responsive -->
            </div>
        </div>
    </div>
    <!-- End Row -->

    <!-- Modal -->
    <div class="modal fade" id="normalmodal" tabindex="-1" role="dialog" aria-labelledby="normalmodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="normalmodal1">حذف الدولة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('deleteCountry') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية الحذف ؟</h6>
                        </p>
                        <input type="hidden" name="id_country" id="id_country" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">تأكيد</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection('content')

@section('scripts')
    <script>
        $('#normalmodal').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id_country = button.data('id_country');
            var modal = $(this);

            modal.find('.modal-body #id_country').val(id_country);
        })
    </script>
    <!--INTERNAL Flot Charts js-->
    <script src="{{ asset('assets/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ asset('assets/js/chart.flot.sampledata.js') }}"></script>

    <!-- INTERNAL Chart js -->
    <script src="{{ asset('assets/plugins/chart/chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart/utils.js') }}"></script>

    <!-- INTERNAL Apexchart js -->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>

    <!--INTERNAL Moment js-->
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>

    <!--INTERNAL Index js-->
    <script src="{{ asset('assets/js/index1.js') }}"></script>

    <!-- INTERNAL Data tables -->
    <script src="{{ asset('assets/plugins/datatables/DataTables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js') }}"></script>

    <!-- INTERNAL Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>

    <!-- Rounded bar chart js-->
    <script src="{{ asset('assets/js/rounded-barchart.js') }}"></script>
@endsection
