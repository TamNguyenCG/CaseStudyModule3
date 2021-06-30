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
                        console.log(item)
                        console.log(index)
                        html += '<li data-id="'+item.id+'" style="z-index: 1" class="list-group-item list-group-item-action item-product">';
                        html += item.name;
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


});
