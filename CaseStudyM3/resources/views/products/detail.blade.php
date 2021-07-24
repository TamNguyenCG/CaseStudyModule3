@extends('master')
@section('content')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="{{asset('storage/image/'.$product->image)}}"
                             alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item"
                             data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_01.jpg"
                                                     alt="Product Image 1">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_02.jpg"
                                                     alt="Product Image 2">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_03.jpg"
                                                     alt="Product Image 3">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_04.jpg"
                                                     alt="Product Image 4">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_05.jpg"
                                                     alt="Product Image 5">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_06.jpg"
                                                     alt="Product Image 6">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Second slide-->

                                <!--Third slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_07.jpg"
                                                     alt="Product Image 7">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_08.jpg"
                                                     alt="Product Image 8">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_09.jpg"
                                                     alt="Product Image 9">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Third slide-->
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{$product->name}}</h1>
                            <p class="h3 py-2">${{$product->price}}</p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p><strong>{{$product->brand->name}}</strong></p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p>{{$product->description}}</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Avaliable Color :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p><strong>{{$product->color}}</strong></p>
                                </li>
                            </ul>

                            <h6>Specification:</h6>

                            
                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item">Size :
                                                <input type="hidden" name="product-size" id="product-size" value="S">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">S</span>
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">M</span>
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">L</span>
                                            </li>
                                            <li class="list-inline-item"><span
                                                    class="btn btn-success btn-size">XL</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity
                                                <input type="hidden" name="product-quanity" id="product-quanity"
                                                       value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success"
                                                                               id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary"
                                                                               id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success"
                                                                               id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    @if(!Auth::user())
                                        <div class="col d-grid">
                                            <a class="btn btn-success btn-lg" href="{{route('users.login')}}">
                                                Buy
                                            </a>
                                        </div>
                                        <div class="col d-grid">
                                            <a class="btn btn-success btn-lg" href="{{route('users.login')}}">
                                                Add To Cart
                                            </a>
                                        </div>
                                    @else
                                        <div class="col d-grid">
                                            <a class="btn btn-success btn-lg" href="#">
                                                Buy
                                            </a>
                                        </div>
                                        <div class="col d-grid">
                                            <button data-id="{{$product->id}}" class="btn btn-success btn-lg addCart">Add To Cart</button>
                                        </div>
                                    @endif
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h3>Related Products</h3>
            </div>

            <!--Start Carousel Wrapper-->
            <div class="row" id="carousel-related-product">
                @foreach($products as $product)
                    {{--                <div class="col-md-3">--}}
                    <div class="p-2 pb-3">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" style="height: 250px"
                                     src="{{ asset('storage/image/'.$product->image) }}">
                                <div
                                    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2"
                                               href="{{route('products.detail',$product->id)}}"><i
                                                    class="far fa-eye"></i></a>
                                        </li>
                                        <li><a class="btn btn-success text-white mt-2"
                                               href="#"><i class="fas fa-cart-plus"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <a href="{{route('products.detail',$product->id)}}"
                                       class="h3 text-decoration-none"
                                       style="text-align: center">{{$product->name}}</a>
                                </div>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>
                                        <p class="text-center mb-0"><span
                                                class="badge bg-danger">{{$product->category->name}}</span>
                                        </p>
                                    </li>
                                    <li>
                                        <i class="far fa-eye"> {{$product->view_count}}</i>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">${{$product->price}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Article -->
@endsection
