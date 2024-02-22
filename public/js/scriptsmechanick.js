let summBuyInCart = 0;
const csrfToken = $('meta[name="csrf-token"]').attr('content');
let blockButtonBuy;
document.addEventListener('DOMContentLoaded', function () {
    blockButtonBuy = $('#ItogBuyCartblock')
});
const addBuyCart = (t, idProduct, count) => {
    $.ajax({
        url: "/cart/price",
        type: "post",
        dataType: "json",
        data: {
            id: idProduct,
            _token: csrfToken,
        },
        success: function (res) {
            if (t.checked) {
                if(summBuyInCart == 0){
                    $(blockButtonBuy).find("button.btn").addClass("btn-primary").removeClass("btn-secondary");
                }
                summBuyInCart += count * res.price;
                $(blockButtonBuy).find("span.priceText").text(summBuyInCart);
            } else {
                summBuyInCart -= count * res.price;
                if (summBuyInCart == 0) {
                    $(blockButtonBuy).find("button.btn").removeClass("btn-primary").addClass("btn-secondary");
                } else {
                    $(blockButtonBuy).find("span.priceText").text(summBuyInCart);
                }
            }
        }
    });
}
