let summBuyInCart = 0;
const csrfToken = $('meta[name="csrf-token"]').attr('content');
const addBuyCart = (t, idProduct, count) => {
        $.ajax({
            url: "/cart/price",
            type: "post",
            dataType: "json",
            data: {
                id:idProduct,
                _token: csrfToken,
            },
            success: function (res) {
                if (t.checked) {
                summBuyInCart += count * res.price;
            } else {
                summBuyInCart -= count * res.price;
                }
            }
        });
}
