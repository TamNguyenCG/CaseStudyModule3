$(document).ready(function () {
    $('#trashcan').hide();
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
                        html += '<li data-id="' + item.id + '" style="z-index: 3" class="list-group-item list-group-item-products item-product">';
                        html += '<a href="' + origin + '/shop/' + item.id + '/detail" style="text-decoration: none">'
                        html += item.name;
                        html += '</a>';
                        html += '</li>';
                    });

                    $('#list-product-search').html(html);
                    // di chuot ra ngoai thi an

                    $('body').click(function () {
                        $('#list-product-search').html('');
                    })
                    // di chuot vao trong thi hien
                    $('#search-product').hover(function () {
                        $('#list-product-search').html(html);
                    })
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
                    // alert("error");
                }
            })
        }
    });

    // Checkbox selected
    $('body').on('click', '#checkAll', function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
        $('#trashcan').toggle();
    });

    // Delete product
    $('#delete').click(function () {
        if (confirm('Are you sure ?')) {
            let id = $('.delete-checkbox:checked').map(function (_, el) {
                return $(el).val();
            }).get();
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
                        toastr.success('Delete product success !')
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
            if (id) {
                $.ajax({
                    url: origin + '/admin/category/destroy',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function () {
                        $.each(id, function (index, id) {
                            $('#delete-category-' + id).remove()
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
            if (id) {
                $.ajax({
                    url: origin + '/admin/brand/destroy',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function () {
                        $.each(id, function (index, id) {
                            $('#delete-brand-' + id).remove()
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

    $('.addCart').click(function () {
        let id = $(this).attr('data-id');
        // console.log(id);
        if (id) {
            $.ajax({
                url: origin + '/shop/addCart',
                method: 'GET',
                data: {
                    id: id
                },
                success: function (res) {
                    toastr.success("The item has been added");
                    let count = 0;
                    $.each(res, function () {
                        count++;
                    })
                    $('#cart-quantity').html(count);

                },
                error: function () {
                }
            })
        } else {
            alert('choose at least one product to add')
        }
    })


    function displayCartByAjax() {
        $.ajax({
            url: origin + '/shop/showCart',
            method: 'GET',
            success: function (res) {
                let html = '';
                let price = 0;
                $.each(res, function (index, item) {
                    html += '<tr className="text-center"><td><input value="'+index+'" class="cart-checkbox" type="checkbox"></td>';
                    html += '<td><img src="' + origin + '/storage/image/' + item.image + '" style="width: 80px;height: 80px"></td>';
                    html += '<td> ' + item.name + ' </td>';
                    html += '<td> ' + item.price + '</td>';
                    html += '<td><button detail-id="' + index + '" class="btn btn-minus cart-minus" style="color: green"><i class="fas fa-minus"  aria-hidden="true"></i></button>';
                    html += '<input type="text" id="quantity-' + index + '" class="quantity_product" value="' + item.quantity + '" style="width: 30px;border: 0;text-align: center" min="0" required>';
                    html += '<button detail-id="' + index + '" class="btn btn-plus cart-plus" style="color: green"><i class="fas fa-plus"  aria-hidden="true"></i></button></td>';
                    html += '</tr>';
                    price += item.price * item.quantity;
                })
                $('#cart-products-info').html(html);
                $('#total-price').html(price);
            },
            error: function () {
            }
        })
    }

    $('#modal-cart').click(function () {
        displayCartByAjax();
    })

    $('body').on('click', '.cart-plus', function () {
        let id = $(this).attr('detail-id');
        if (id) {
            $.ajax({
                url: origin + '/shop/cartPlus',
                method: "GET",
                data: {
                    id: id
                },
                success: function () {
                    displayCartByAjax();
                },
                error: function () {

                }
            })
        }
    })
    $('body').on('click', '.cart-minus', function () {
        let id = $(this).attr('detail-id');
        if (id) {
            $.ajax({
                url: origin + '/shop/cartMinus',
                method: "GET",
                data: {
                    id: id
                },
                success: function () {
                    displayCartByAjax();
                },
                error: function (res) {
                }
            })
        }
    })


    $('body').on('click', '.cart-checkbox', function () {
        $('#trashcan').toggle();
    })
    $('#trashcan').click(function () {
        if (confirm('Are you sure ?')) {
            let id = $('.cart-checkbox:checked').map(function (_, el) {
                return $(el).val();
            }).get();
            if (id) {
                $.ajax({
                    url: origin + '/shop/deleteCart',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function () {
                        displayCartByAjax();
                        toastr.success('Delete product successfully !')
                    },
                    error: function () {
                    }
                })
            }
        }
    })
});
