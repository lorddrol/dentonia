let summBuyInCart = 0;
const csrfToken = $('meta[name="csrf-token"]').attr('content');
let blockButtonBuy;
document.addEventListener('DOMContentLoaded', function () {
    blockButtonBuy = $('#ItogBuyCartblock');
});
let productBuyCount = [];
productBuyCount.push({ "idProduct": 4, "count": 21, "price": 123 });
productBuyCount.push({ "idProduct": 7, "count": 12, "price": 213 });
productBuyCount.push({ "idProduct": 3, "count": 23, "price": 321 });
productBuyCount.push({ "idProduct": 40, "count": 21, "price": 123 });
productBuyCount.push({ "idProduct": 20, "count": 12, "price": 213 });
productBuyCount.push({ "idProduct": 12, "count": 23, "price": 321 });
productBuyCount.push({ "idProduct": 50, "count": 21, "price": 123 });
productBuyCount.push({ "idProduct": 2, "count": 12, "price": 213 });
productBuyCount.push({ "idProduct": 6, "count": 23, "price": 321 });
const addBuyCart = (t, idProduct, count) => {
    t.disabled = true;
    if (t.checked) {
        addSummBuyCart(t, idProduct, count);

    } else {
        deliteSummBuyCart(t, idProduct, count);
    }
}

const countChange = (t, idProduct, znak) => {
    $.ajax({
        url: "/cart/countChange",
        type: "post",
        dataType: "json",
        data: {
            znak: znak,
            id: idProduct,
            _token: csrfToken,
        },
        success: function (res) {
            console.log(res.count);
            let divParent = $(t).parent("div.count-cart").find("div.count-cart-count span").text(res.count);
        }
    });

}


function search(idProduct, min, max){
    if(max-min<1)
    {
        return -1;
    }
    res = min + (max - min)/2;
    console.log(Math.ceil(min)+ "     " + Math.ceil(max));
    if(productBuyCount[Math.ceil(res)].idProduct !== idProduct) {
        if(productBuyCount[Math.ceil(res)].idProduct < idProduct){
            min = res;
        } else {
            max = res;
        }
        search(idProduct, min, max);
    } else {
        res = Math.ceil(res);
        return res;
    }
    return res;
}

function addSummBuyCart(t, idProduct, count){
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
            productBuyCount.sort(function (a, b) {return a.idProduct - b.idProduct;});
            console.log(productBuyCount);
            t.disabled = false;
        }
    });
}

function deliteSummBuyCart(t, idProduct, count){
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
            resultSearch = search(50, 0, productBuyCount.length-1);
            if(resultSearch !== -1){
            productBuyCount.splice(resultSearch,1);
            console.log(productBuyCount);
        }
            t.disabled = false;
        }
    });
}

function deliteProductCart(idProduct, count){
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
            resultSearch = search(idProduct, 0, productBuyCount.length-1);
            productBuyCount.splice(resultSearch,1);
            console.log(productBuyCount);
            t.disabled = false;
        }
    });
}
