let summBuyInCart = 0;
const csrfToken = $('meta[name="csrf-token"]').attr('content');
let blockButtonBuy;
document.addEventListener('DOMContentLoaded', function () {
    blockButtonBuy = $('#ItogBuyCartblock');
});
let product = {};
const addBuyCart = (t, idProduct, count) => {
    t.disabled = true;
    if (t.checked) {
        if (product[idProduct] == undefined) {
            product[idProduct] = count;
            $.ajax({
                url: "/cart/price",
                type: "post",
                dataType: "json",
                data: {
                    id: idProduct,
                    _token: csrfToken,
                },
                success: function (res) {
                    if (summBuyInCart == 0) {
                        $(blockButtonBuy).find("button.btn").addClass("btn-primary").removeClass("btn-secondary");
                        $(blockButtonBuy).find("span.priceText").text("");
                    }
                    summBuyInCart += count * res.price;
                    $(blockButtonBuy).find("span.priceText").text(summBuyInCart);
                    product[idProduct] = count;
                    t.disabled = false;
                }
            });
        }

    } else {

        if (product[idProduct] !== undefined) {
            product[idProduct] = undefined;

            $.ajax({
                url: "/cart/price",
                type: "post",
                dataType: "json",
                data: {
                    id: idProduct,
                    _token: csrfToken,
                },
                success: function (res) {
                    summBuyInCart -= count * res.price;
                    if (summBuyInCart == 0) {
                        $(blockButtonBuy).find("button.btn").removeClass("btn-primary").addClass("btn-secondary");
                        $(blockButtonBuy).find("span.priceText").text("");
                    } else {
                        $(blockButtonBuy).find("span.priceText").text(summBuyInCart);
                    }
                    t.disabled = false;
                }
            });
        }
    }
}

const countChange = (t,idProduct, znak) => {
    $.ajax({
        url: "/cart/price",
        type: "post",
        dataType: "json",
        data: {
            znak: znak,
            id: idProduct,
            _token: csrfToken,
        },
        success: function (res) {
            
            let divParent = $(t).parent("div.count-cart").find("div.count-cart-count span").text();
        }
    });

}
