<!-- Content Header (Page header) -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">{{$title}}</h4>

            {{-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @isset($breadcrumbs)
                        {{ Breadcrumbs::render(...$breadcrumbs) }}
                    @endisset
                </ol>
            </div> --}}

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    {{-- <h4 class="page-title mb-0 text-primary">
                         @isset($breadcrumbs)
                            {{ Breadcrumbs::render(...$breadcrumbs) }}
                        @endisset
                    </h4> --}}
                </div>
            </div>
            <!--End Page header-->

        </div>
    </div>
</div>

<!-- Main content -->
<section>
    {{-- @include('flash::message') --}}
    {{ $slot }}
</section>
<!-- /.content -->
