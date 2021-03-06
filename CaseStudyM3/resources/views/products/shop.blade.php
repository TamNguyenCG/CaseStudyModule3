@extends('master')
@section('content')
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="h2 pb-4">Filter By</h1>
                <div class="form-floating mb-3">
                    <select class="form-select" id="category" aria-label="Floating label select example">
                        <option value="" selected>Select</option>
                        @foreach($categories as $category)
                            <option id="category-select" value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Category</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="style" aria-label="Floating label select example">
                        <option value="" selected>Select</option>
                        @foreach($styles as $style)
                            <option id="style-select" value="{{$style->id}}">{{$style->name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Gender</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="brand" aria-label="Floating label select example">
                        <option value="" selected>Select</option>
                        @foreach($brands as $brand)
                            <option id="brand-select" value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Brand</label>
                </div>


                <a class="btn btn-outline-success" id="filter">Filter</a>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3"
                                   href="{{route('products.shop')}}">All Products</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                        <input id="search-product" class="form-control me-2" type="search"
                               placeholder="Search By Product's Name" aria-label="Search" name="keyword">
                        <ul class="list-group col-md-11" style="position: absolute" id="list-product-search"></ul>
                    </div>
                </div>
                <div class="row" id="product-list">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0" >
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" style="height: 250px"
                                         src="{{ asset('storage/image/'.$product->image) }}">
                                    <div
                                        class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li><a class="btn btn-success text-white mt-2"
                                                   href="{{route('products.detail',$product->id)}}"><i class="far fa-eye"></i></a>
                                            </li>
                                            <li><button data-id="{{$product->id}}" class="btn btn-success text-white mt-2 addCart"><i class="fas fa-cart-plus"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body" id="product-id">
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
                    <nav aria-label="Page navigation example">
                        <ul class="pagination" style="float: right">
                            {{$products->appends(request()->query())}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection
