@extends('admin.master')
@section('content')
    <!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="card mt-5 mb-5">
        <div class="card-header">
            <h1>Edit Product</h1>
        </div>
        <form action="{{route('admin.update',$product->id,$original ?? '')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-floating">
                    <input type="text" class="form-control mb-3" placeholder="Product's Name" name="name" value="{{$product->name}}" >
                    <label for="floatingInput">Product's Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control mb-3" placeholder="Color" name="color" value="{{$product->color}}">
                    <label for="floatingInput">Color</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control mb-3" placeholder="Price" name="price" value="{{$product->price}}">
                    <label for="floatingInput">Price ($)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control mb-3" placeholder="Stocks" name="stocks" value="{{$product->stocks}}">
                    <label for="floatingInput">Stocks</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="category_id">
                        @foreach($categories as $category)
                            <option
                                @if($product->category_id === $category->id)
                                {{"selected"}}
                                @endif
                                value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingInput">Category</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="brand_id">
                        @foreach($brands as $brand)
                            <option
                                @if($product->brand_id === $brand->id)
                                {{"selected"}}
                                @endif
                                value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingInput">Brand</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="style_id">
                        @foreach($styles as $style)
                            <option
                                @if($product->style_id === $style->id)
                                {{"selected"}}
                                @endif
                                value="{{$style->id}}">{{$style->name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingInput">Style</label>
                </div>
                <div class="form-floating mb-3">
                    <img style="width: 30%;height: 30%" src="{{asset('storage/image/'.$product->image)}}">
                    <input type="file" class="form-control mb-3" placeholder="image" name="image">
                    <label for="floatingInput"></label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control mb-3" name="description" placeholder="Description" style="height: 100px">{{$product->description}}</textarea>
                    <label for="floatingInput">Description</label>
                </div>
                <button class="btn btn-outline-success" type="submit">Save</button>
                <button class="btn btn-outline-dark" onclick="window.history.go(-1);return false;">Back</button>
            </div>
        </form>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
@endsection
