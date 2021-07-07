$(document).ready(function () {
    let origin = window.origin;
    // Shop-search
    $('#search-product').keyup(function () {
        let value = $(this).val();
        if (value) {
            // goi ajax
            $.ajax({
                url: origin + '/shop/search',
                method: 'GET',
                data: {
                    keyword: value
                },
                // goi ajax thanh cong
                success: function (res) {
                    let html = '';
                    $.each(res, function (index, item) {
                        html += '<li data-id="' + item.id + '" style="z-index: 1" class="list-group-item list-group-item-products item-product">';
                        html += '<a href="' + origin + '/shop/' + item.id + '/detail" style="text-decoration: none">'
                        html += item.name;
                        html += '</a>';
                        html += '</li>';
                    });

                    $('#list-product-search').html(html);
                },
                // goi ajax that bai
                error: function () {
                    alert("error");
                }
            })
        } else {
            $('#list-product-search').html('');
        }
    });

    // Filter
    $('#filter').click(function () {
        let cateId = $('#category').val();
        let styleId = $('#style').val();
        let brandId = $('#brand').val();
        console.log(cateId);
        console.log(styleId);
        console.log(brandId);
        if (cateId || styleId || brandId) {
            $.ajax({
                url: origin + '/shop/filter',
                method: 'GET',
                data: {
                    category_id: cateId,
                    style_id: styleId,
                    brand_id: brandId
                },
                // goi ajax thanh cong
                success: function (res) {
                    console.log(res);
                    let html = '';
                    $.each(res, function (index, item) {
                        let category = item.category;

                        html += '<div class="col-md-4"><div class="card mb-4 product-wap rounded-0"><div class="card rounded-0">';
                        html += '<img class="card-img rounded-0 img-fluid" style="height: 250px" src="' + origin + '/storage/image/' + item.image + '">';
                        html += '<div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">';
                        html += '<ul class="list-unstyled">';
                        html += '<li><a class="btn btn-success text-white mt-2" href="' + origin + '/shop/' + item.id + '/detail">';
                        html += '<i class="far fa-eye"></i></a></li>';
                        html += '<li><a class="btn btn-success text-white mt-2" href="#"><i class="fas fa-cart-plus"></i></a></li></ul></div></div>';
                        html += '<div class="card-body"><div class="row">';
                        html += '<a href="' + origin + '/shop/' + item.id + '/detail" class="h3 text-decoration-none" style="text-align: center">' + item.name + '</a>';
                        html += '<ul class="w-100 list-unstyled d-flex justify-content-between mb-0">';
                        html += '<li><p class="text-center mb-0"><span class="badge bg-danger">' + category.name + '</span></p></li>';
                        // html += '<li><p class="text-center mb-0"><span class="badge bg-danger">' + brand.name + '</span></p></li>';
                        html += '<li><i class="far fa-eye">' + item.view_count + '</i></li></ul>';
                        html += '<ul class="list-unstyled d-flex justify-content-center mb-1"><li><i class="text-warning fa fa-star"></i><i class="text-warning fa fa-star"></i>' +
                            '<i class="text-warning fa fa-star"></i><i class="text-muted fa fa-star"></i><i class="text-muted fa fa-star"></i></li></ul>';
                        html += '<p class="text-center mb-0"> $' + item.price + '</p>';
                        html += '</div></div></div></div></div>'
                    });
                    $('#product-list').html(html);
                },
                // goi ajax that bai
                error: function () {
                    alert("error");
                }
            })
        }
    });

    // Checkbox selected
    $('body').on('click', '#checkAll', function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    // Delete product
    $('#delete').click(function () {
        if (confirm('Are you sure ?')) {
            let id = $('.delete-checkbox:checked').map(function (_, el) {
                return $(el).val();
            }).get();
            console.log(id)
            if (id) {
                $.ajax({
                    url: origin + '/admin/products/destroy',
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
                    }
                })
            }
        }
    })

    // Delete category
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
                        toastr.success('Delete category success !')
                    },
                    error: function () {
                        alert('Error');
                    }
                })
            }
        }
    })



    // Delete brand
    $('#delete_brand').click(function () {
        if (confirm('Are you sure ?')) {
            let id = $('.checkbox-brand:checked').map(function (_, el) {
                return $(el).val();
            }).get();
            console.log(id);
            if (id) {
                $.ajax({
                    url: origin + '/admin/brand/destroy',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function () {
                        $.each(id, function (index, id) {
                            $('#delete-' + id).remove()
                        })
                        toastr.success('Delete brand success !')
                    },
                    error: function () {
                        alert('Error');
                    }
                })
            }
        }
    })

    /*$('#addCart').click(function (){
        let id = $(this).attr('data-id');
        if (id) {
            $.ajax({
                url: origin + '/shop/addCart',
                method: 'GET',
                data: {
                    id: id
                },
                success: function () {
                    alert('add thanh cong');
                },
                error: function () {
                    alert('error');
                }
            })
        } else {
            alert('choose at least one product to add')
        }
    })*/

});
