@extends('layouts.app')

@section('content')
    <!-- start categories -->
    <section class="available-categories ">
        <div class="container">
            <h2 class="text-center mt-5 fw-bold">الفئات المتاحة </h2>
            <div class="row text-center ">

                @foreach ($categories as $category)
                    <div class=" col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-4 ">
                        <a href="{{ route('orderDetails', ['id' => $category->id]) }}">
                            <div class="card text-center px-3 py-4 category">
                                <div class="category-img-con d-flex align-items-center justify-content-center m-auto">
                                    <img src="images/{{ $category->category_image }}" class="" width="70px"
                                        height="50px" alt="...">

                                </div>
                                <div class="card-body">
                                    <h5 class="card-text fw-bold">{{ $category->category_name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>

    </section>
    <!-- end categories -->
@endsection
