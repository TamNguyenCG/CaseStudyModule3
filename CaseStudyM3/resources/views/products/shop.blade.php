@extends('master')
@section('content')

    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">
            <div class="col-md-7">
                <ul class="list-inline shop-top-menu pb-3 pt-1">
                    <li class="list-inline-item">
                        <a class="h3 text-dark text-decoration-none mr-3"
                           href="{{route('products.shop')}}">All</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="h3 text-dark text-decoration-none mr-3"
                           href="{{route('products.men')}}">Men's</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="h3 text-dark text-decoration-none"
                           href="{{route('products.women')}}">Women's</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-5 pb-4">
                <input id="search-product" class="form-control me-2" type="search"
                       placeholder="Search By Product's Name" aria-label="Search" name="keyword">
                <ul class="list-group col-6 col-md-4" style="position: absolute" id="list-product-search"></ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-1">
                <a class="btn btn-primary" href="{{route('products.create')}}">Add New Product</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                    Category
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Select Category</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <tr>
                                        <th>Category:</th>
                                        <td>
                                            <select name="category-select" id="category-select" class="form-select">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="category-choose" class="btn btn-primary">Choose</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>

            @yield('style')
            <div class="row">
                <div class="row" id="product-list">
                    @foreach($allproducts as $product)
                        <div class="col-md-3">
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
                                    <div class="row">
                                        <div class="col-12">
                                            <a class="btn btn-success"
                                               href="{{route('products.edit',$product->id)}}">Edit</a>
                                            <a class="btn btn-danger" onclick="return confirm('Are you sure ?!')"
                                               href="{{route('products.destroy',$product->id)}}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <nav aria-label="Page navigation example">
                        <ul class="pagination" style="float: right">
                            {{$allproducts->appends(request()->query())}}
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- End Content -->

            <!-- Start Brands -->
            <section class="bg-light py-5">
                <div class="container my-4">
                    <div class="row text-center py-3">
                        <div class="col-lg-6 m-auto">
                            <h1 class="h1">Our Brands</h1>
                        </div>
                        <div class="col-lg-9 m-auto tempaltemo-carousel">
                            <div class="row d-flex flex-row">
                                <!--Controls-->
                                <div class="col-1 align-self-center">
                                    <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                                        <i class="text-light fas fa-chevron-left"></i>
                                    </a>
                                </div>
                                <!--End Controls-->

                                <!--Carousel Wrapper-->
                                <div class="col">
                                    <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example"
                                         data-bs-ride="carousel">
                                        <!--Slides-->
                                        <div class="carousel-inner product-links-wap" role="listbox">

                                            <!--First slide-->
                                            <div class="carousel-item active">
                                                <div class="row">
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img"
                                                                         src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                                    </div>
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img"
                                                                         src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                                    </div>
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img"
                                                                         src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                                    </div>
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img"
                                                                         src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End First slide-->

                                            <!--Second slide-->
                                            <div class="carousel-item">
                                                <div class="row">
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img"
                                                                         src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                                    </div>
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img"
                                                                         src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                                    </div>
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img"
                                                                         src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                                    </div>
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img"
                                                                         src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Second slide-->

                                            <!--Third slide-->
                                            <div class="carousel-item">
                                                <div class="row">
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img"
                                                                         src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                                    </div>
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img"
                                                                         src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                                    </div>
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img"
                                                                         src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                                    </div>
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img"
                                                                         src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Third slide-->

                                        </div>
                                        <!--End Slides-->
                                    </div>
                                </div>
                                <!--End Carousel Wrapper-->

                                <!--Controls-->
                                <div class="col-1 align-self-center">
                                    <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                                        <i class="text-light fas fa-chevron-right"></i>
                                    </a>
                                </div>
                                <!--End Controls-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Brands-->
@endsection
