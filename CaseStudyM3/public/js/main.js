$(document).ready(function () {
    let origin = window.origin;
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
                        html += '<li data-id="' + item.id + '" style="z-index: 1" class="list-group-item list-group-item-action item-product">';
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

    $('#filter').click(function () {
        let cateId = $('#category').val();
        let styleId = $('#style').val();
        let brandId = $('#brand').val();
        console.log(cateId);
        console.log(styleId);
        console.log(brandId);
        if (cateId||styleId||brandId) {
            $.ajax({
                url: origin + '/shop/filter',
                method: 'GET',
                data: {
                    cateId: cateId,
                    styleId: styleId,
                    brandId: brandId
                },
                // goi ajax thanh cong
                success: function (res) {
                    console.log(res);
                    let html = '';
                    $.each(res, function (index, item) {
                        let category = item.category;
                        let style = item.style;
                        let brand = item.brand;
                        console.log(category);
                        console.log(style);
                        console.log(brand);
                        html += '<div class="col-md-3" style="width: 280px"><div class="card mb-4 product-wap rounded-0"><div class="card rounded-0">';
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
                        html += '<li><p class="text-center mb-0"><span class="badge bg-danger">' + brand.name + '</span></p></li>';
                        html += '<li><i class="far fa-eye">' + item.view_count + '</i></li></ul>';
                        html += '<ul class="list-unstyled d-flex justify-content-center mb-1"><li><i class="text-warning fa fa-star"></i><i class="text-warning fa fa-star"></i>' +
                            '<i class="text-warning fa fa-star"></i><i class="text-muted fa fa-star"></i><i class="text-muted fa fa-star"></i></li></ul>';
                        html += '<p class="text-center mb-0"> $' + item.price + '</p>';
                        html += '<div class="row"><div class="col-12"><a class="btn btn-success" href="' + origin + '/shop/' + item.id + '/edit">Edit</a>';
                        html += '<a class="btn btn-danger" onclick="return confirm(\'Are you sure ?!\')" href="' + origin + '/shop/' + item.id + '/delete">Delete</a>';
                        html += '</div></div></div></div></div></div>'
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

    $('#style-choose').click(function () {
        let style_id = $('#style-select').val();
        // console.log(id);
        if (style_id) {
            $.ajax({
                url: origin + 'category/style',
                method: 'GET',
                data: {
                    id: style_id
                },
                success: function (res){
                    console.log(res);
                    let html = '';

                },
                error: function (){
                    alert('error');
                }
            })
        }
    })

});
