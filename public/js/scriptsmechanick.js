let summBuyInCart = 0;
const csrfToken = $('meta[name="csrf-token"]').attr('content');
let blockButtonBuy;
document.addEventListener('DOMContentLoaded', function () {
    blockButtonBuy = $('#ItogBuyCartblock');
});
let productBuyCount = [];
// раветвитель для чекбоксов
function editSummBuyCartRep (idProduct) {
    $.ajax({
        url: "/cart/price",
        type: "post",
        dataType: "json",
        async:false,
        data: {
            id: idProduct,
            _token: csrfToken,
        },
        success: function (res) {
            callback(res);
        }
    });
}
function editSummBuyCartBisnes(t, idProduct,count) {
    res = editSummBuyCartRep(idProduct);
    console.log(res);
    if (t.checked) {
        summBuyInCart += count * res.price;
        productBuyCount.push({ "idProduct": idProduct, "count": count, "price": res["price"] });
        productBuyCount.sort(function (a, b) { return a.idProduct - b.idProduct; });
    } else {
        summBuyInCart -= count * res.price;
        resultSearch = searchProduct(idProduct);
        if (resultSearch !== -1) {
            productBuyCount.splice(resultSearch, 1);
        }
    }

}

// изменение количества
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
                        break;
                    case 'minus':
                        summBuyInCart -= res["price"];

                        break;

                    default:
                        break;
                }
            }
            $(blockButtonBuy).find("span.priceText").text(summBuyInCart);
            let divParent = $(t).parent("div.count-cart").find("div.count-cart-count span").text(res["count"]);
        }
    });

}

// сам поиск ~O(log(N))
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
// прослойка перед поиска
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

function addCart(t, idProduct) {
    $.ajax({
        type: "post",
        url: "/cart/add",
        data: {
            idProduct: idProduct,
            _token: csrfToken,
        },
        success: function (res) {
            addCartUi(res);
        }
    });
}
