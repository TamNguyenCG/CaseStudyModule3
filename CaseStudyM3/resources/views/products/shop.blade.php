@extends('master')
@section('content')
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Gender
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Men</a></li>
                            <li><a class="text-decoration-none" href="#">Women</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Sale
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Sport</a></li>
                            <li><a class="text-decoration-none" href="#">Luxury</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Product
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseThree" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Bag</a></li>
                            <li><a class="text-decoration-none" href="#">Sweather</a></li>
                            <li><a class="text-decoration-none" href="#">Sunglass</a></li>
                        </ul>
                    </li>
                </ul>
                <a class="btn btn-primary" href="{{route('products.create')}}">Add New Product</a>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3"
                                   href="{{route('products.shop')}}">All</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">Men's</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none" href="#">Women's</a>
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
                    @foreach($products as $product)
                        <div class="col-md-4">
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
                                {{$products->appends(request()->query())}}
                            </ul>
                        </nav>
                </div>
            </div>
        </div>
    </div>
            <!-- End Content -->
@endsection


