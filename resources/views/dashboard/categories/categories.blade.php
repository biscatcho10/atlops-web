@extends('dashboard.layouts.app')

@section('styles')
@endsection

@section('content')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <div class="btn-list">
                <a href="{{ route('addCategory') }}" class="btn btn-outline-primary"><i class="fe fe-plus"></i>
                    إضافة فئة</a>
            </div>
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول الفئات</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>اسم الفئة</th>
                                <th>صورة الفئة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($categories as $category)
                                <tr>
                                    <th>{{ $count++ }}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td><img src="images/{{ $category->category_image }}" class="" width="70px"
                                            height="50px" alt="..."></td>
                                    <td>
                                        <div class="btn-group mt-2 mb-2">
                                            <button type="button" class="btn btn-primary btn-pill dropdown-toggle"
                                                data-bs-toggle="dropdown">
                                                العمليات <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li class="dropdown-plus-title">
                                                    اختار العملية
                                                    <b class="fa fa-angle-up" aria-hidden="true"></b>
                                                </li>
                                                <li><a href="{{ route('editCategory', ['id' => $category->id]) }}">تعديل
                                                        الفئة</a></li>
                                                <li><a data-bs-toggle="modal" data-bs-target="#normalmodal"
                                                        data-id_category="{{ $category->id }}">حذف الفئة</a>
                                                </li>
                                                <li><a href="{{ route('subCategries', ['id' => $category->id]) }}">عرض
                                                        الفئات الفرعية</a>
                                                </li>
                                                <li><a href="{{ route('serviceCategries', ['id' => $category->id]) }}">عرض
                                                    الخدمات الإضافية </a>
                                            </li>
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
                    <h5 class="modal-title" id="normalmodal1">حذف الفئة الفرعية</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('deleteCategory') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية الحذف ؟</h6>
                        </p>
                        <input type="hidden" name="id_category" id="id_category" value="">
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
            var id_category = button.data('id_category');
            var modal = $(this);

            modal.find('.modal-body #id_category').val(id_category);
        })
    </script>
@endsection
