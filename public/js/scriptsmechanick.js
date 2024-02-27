let summBuyInCart = 0;
const csrfToken = $('meta[name="csrf-token"]').attr('content');
let blockButtonBuy;
document.addEventListener('DOMContentLoaded', function () {
    blockButtonBuy = $('#ItogBuyCartblock');
});
let productBuyCount = [];
const addBuyCart = (t, idProduct, count) => {
    t.disabled = true;
    if (t.checked) {
        addSummBuyCart(t, idProduct, count);

    } else {
        deliteSummBuyCart(t, idProduct, count);
    }
}

const countChange = (t, idProduct, znak, id) => {
    $.ajax({
        url: "/cart/countChange",
        type: "post",
        dataType: "json",
        data: {
            id: id,
            znak: znak,
            _token: csrfToken,
        },
        success: function (res) {
            itog = searchProduct(idProduct);
            console.log(itog);
            if (itog !== -1 && idProduct == productBuyCount[itog].idProduct) {
                switch (znak) {
                    case 'plinus':
                        summBuyInCart += res["price"];
                        $(blockButtonBuy).find("span.priceText").text(summBuyInCart);
                        break;
                    case 'minus':
                        summBuyInCart -= res["price"];
                        $(blockButtonBuy).find("span.priceText").text(summBuyInCart);

                        break;

                    default:
                        break;
                }
            }
            let divParent = $(t).parent("div.count-cart").find("div.count-cart-count span").text(res["count"]);
        }
    });

}


function search(idProduct, min, max) {
    if (Math.abs(max - min) < 1) {
        return -1;
    }
    res = min + (max - min) / 2;
    if (productBuyCount[Math.round(res)].idProduct !== idProduct) {
        if (productBuyCount[Math.round(res)].idProduct < idProduct) {
            min = res;
        } else {
            max = res;
        }
        search(idProduct, min, max);
    } else {
        res = Math.round(res);
        return res;
    }
}
function searchProduct(idProduct) {
    if (productBuyCount.length > 0) {
        if (productBuyCount.length > 1) {
            max = productBuyCount.length - 1;
            res = search(idProduct, 0, max);
            return res;
        }
        else {
            return 0;

        }
    } else {
        return -1;
    }

}

function addSummBuyCart(t, idProduct, count) {
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
                // вынести в отдельный блок
                $(blockButtonBuy).find("button.btn").addClass("btn-primary").removeClass("btn-secondary");
                $(blockButtonBuy).find("span.priceText").text("");
            }
            summBuyInCart += count * res.price;
            $(blockButtonBuy).find("span.priceText").text(summBuyInCart);
            productBuyCount.push({ "idProduct": idProduct, "count": count, "price": res.price });
            productBuyCount.sort(function (a, b) { return a.idProduct - b.idProduct; });
            console.log(productBuyCount.idProduct);
            t.disabled = false;
        }
    });
}

function deliteSummBuyCart(t, idProduct, count) {
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
            resultSearch = searchProduct(idProduct);
            if (resultSearch !== -1) {
                productBuyCount.splice(resultSearch, 1);
                console.log(productBuyCount);
            }
            t.disabled = false;
        }
    });
}

function deliteProductCart(idProduct, count) {
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
            resultSearch = searchProduct(idProduct);
            productBuyCount.splice(resultSearch, 1);
            console.log(productBuyCount);
            t.disabled = false;
        }
    });
}
