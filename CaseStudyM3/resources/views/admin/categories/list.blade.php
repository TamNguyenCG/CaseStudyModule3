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
                    <a href="{{route('admin.category-create')}}" class="btn btn-outline-primary mb-2"><i
                            class="fas fa-plus"></i></a>
                    <button class="btn btn-outline-danger mb-2" id="delete_category">
                        <i class="fas fa-trash-alt"></i></button>

                    <table class="table">
                        <thead class="table-dark">
                        <th>
                            <span>Choose</span>
                            <input type="checkbox" class="" id="checkAllCategory">
                        </th>
                        <th>Category</th>
                        <th>Number of Products</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr id="delete-{{$category->id}}">
                                <td>
                                    <input type="checkbox" value="{{$category->id}}" class="checkbox-category"
                                           name="checkbox[]">
                                </td>
                                <td>{{$category->name}}</td>
                                <td>{{count($category->products)}}</td>
                                <td>
                                    <a class="btn btn-outline-success"
                                       href="{{route('admin.category-edit',$category->id)}}"><i
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
    <script>
        $(document).ready(function () {
            let origin = window.origin;
            $('body').on('click', '#checkAllCategory', function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $('#delete_category').click(function () {
                if (confirm('Are you sure ?')) {
                    let id = $('.checkbox-category:checked').map(function (_, el) {
                        return $(el).val();
                    }).get();
                    console.log(id);
                    if (id) {
                        $.ajax({
                            url: origin + '/admin/category/destroy',
                            method: 'GET',
                            data: {
                                id: id
                            },
                            success: function () {
                                $.each(id, function (index, id) {
                                    $('#delete-' + id).remove()
                                })
                            },
                            error: function () {
                                alert('Error');
                            }
                        })
                    }
                }
            })
        })
    </script>
@endsection

