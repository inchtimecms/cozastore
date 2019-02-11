(function ($) {
    "use strict";
    $(document).ready(function () {
        //购物车页面加载完毕后,处理当条商品的价格 及 库存显示情况
        $(".table-shopping-cart .table_row").each(function () {
            let choiceProp = $(this).data("choicesaleprop");
            let productprops = $(this).data("productprops");
            let choicePropArray = choiceProp.split(" ");

            if (choicePropArray[1] === "") {
                for (let i = 0; i < productprops.length; i++) {
                    let data = productprops[i][choicePropArray[0]];
                    if (data !== undefined) {
                        $(this).find("td.column-3").text("¥:" + data.price);
                        $(this).find("input.num-product").attr("max", data.number);
                        $(this).find("td.column-4 .small").text("库存:" + data.number);
                        let cartNumber = $(this).find("input.num-product").val();
                        $(this).find("td.column-5 span").text(parseFloat(data.price * cartNumber).toFixed(2));

                    }
                }

            } else {
                for (let i = 0; i < productprops.length; i++) {
                    let data = productprops[i][choicePropArray[0] + ":" + choicePropArray[1]];
                    if (data !== undefined) {
                        $(this).find("td.column-3").text("¥:" + data.price);
                        $(this).find("input.num-product").attr("max", data.number);
                        $(this).find("td.column-4 .small").text("库存:" + data.number);
                        let cartNumber = $(this).find("input.num-product").val();
                        $(this).find("td.column-5 span").text(parseFloat(data.price * cartNumber).toFixed(2));

                    }
                }
            }
        });

        //处理总价
        let priceSpan = $(".table-shopping-cart .table_row td.column-5 span")

        let products_price = 0;
        for (let i = 0; i < priceSpan.length; i++) {
            products_price = products_price + parseFloat($(priceSpan[i]).text());
        }

        $("span.products-price span").text( parseFloat(products_price).toFixed(2) );


    });

})(jQuery);