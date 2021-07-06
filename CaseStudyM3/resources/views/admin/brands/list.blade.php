@extends('admin.master')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Brand</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Brands-list</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Brands Data-table
                </div>
                <div class="card-body">
                    <a href="{{route('admin.brand-create')}}" class="btn btn-outline-primary mb-2"><i
                            class="fas fa-plus"></i></a>
                    <button class="btn btn-outline-danger mb-2" id="delete_brand">
                        <i class="fas fa-trash-alt"></i></button>

                    <table class="table">
                        <thead class="table-dark">
                        <th>
                            <span>Choose</span>
                            <input type="checkbox" class="" id="checkAll">
                        </th>
                        <th>Logo</th>
                        <th>Brand</th>
                        <th>Number of Products</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr id="delete-{{$brand->id}}">
                                <td>
                                    <input type="checkbox" value="{{$brand->id}}" class="checkbox-brand"
                                           name="checkbox[]">
                                </td>
                                <td><img style="height: 100px" src="{{asset('storage/image/'.$brand->image)}}"></td>
                                <td>{{$brand->name}}</td>
                                <td>{{count($brand->products)}}</td>
                                <td>
                                    <a class="btn btn-outline-success"
                                       href="{{route('admin.brand-edit',$brand->id)}}"><i
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

