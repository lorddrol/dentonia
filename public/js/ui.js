function addCartUi(res){
    console.log(t);
    next= $(t).parent();
    $(next).parent().append('<div class="count-cart"><button class= " btn-text count-cart-minus "onclick= "countChange(this,'+ idProduct +', "minus", '+res+')">-</button><div class="count-cart-count"><span>1</span></div><button class="btn-text count-cart-plinus"onclick="countChange(this, '+idProduct+', "plinus", '+res+')">+</button></div>');
    next.detach();
}
function editSummBuyCartUi(t, idProduct, count){
    t.disabled = true;
    editSummBuyCartBisnes(t, idProduct, count);
    if (summBuyInCart == 0) {
        $(blockButtonBuy).find("button.btn").removeClass("btn-primary").addClass("btn-secondary");
        $(blockButtonBuy).find("span.priceText").text("");
    } else {
        $(blockButtonBuy).find("button.btn").addClass("btn-primary").removeClass("btn-secondary");
        $(blockButtonBuy).find("span.priceText").text(summBuyInCart);
    }
    t.disabled = false;
}
