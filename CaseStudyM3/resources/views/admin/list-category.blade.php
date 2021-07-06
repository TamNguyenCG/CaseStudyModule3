@extends('admin.master')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Category</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Category-list</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Categories Data-table
                </div>
                <div class="card-body">
                    <a href="{{route('admin.create')}}" class="btn btn-outline-primary mb-2"><i class="fas fa-plus"></i></a>
                    <button onclick="return confirm('Are you sure ?!')" class="btn btn-outline-danger mb-2" id="delete">
                        <i
                            class="fas fa-trash-alt"></i></button>

                    <table class="table">
                        <thead class="table-dark">
                        <th>
                            <span>Choose</span>
                            <input type="checkbox" class="" id="checkAll">
                        </th>
                        <th>Shoes</th>
                        <th>Brand</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr id="delete-{{$category->id}}">
                                <td>
                                    <input type="checkbox" value="{{$category->id}}" class="delete-checkbox"
                                           name="checkbox[]">
                                </td>
                                <td><img class="card-img" style="height: 200px;width: 200px"
                                         src="{{asset('storage/image/'.$product->image)}}"></td>
                                <td>{{$product->brand->name}}</td>
                                <td>{{$product->color}}</td>
                                <td>${{$product->price}}</td>
                                <td>{{$product->description}}</td>
                                <td>
                                    <a class="btn btn-outline-success" href="{{route('admin.edit',$product->id)}}"><i
                                            class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
