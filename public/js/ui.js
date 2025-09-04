var allCategory = document.getElementById('allCategory');
let idLastCategory = -1;
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

const allModelAgreement = (t) => {
    let DivModalFooter = $(t).closest("div.modal-footer");
    $(DivModalFooter).find("span[name='hiden-modal-footer-bla-bla']").removeClass("d-none");
    $(t).addClass("d-none");
}

  var swiper = new Swiper(".mySwiper", {
    scrollbar: {
      el: ".swiper-scrollbar",
      hide: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
  });

  var swiper = new Swiper(".mySwiper2", {
    effect: "cards",
    grabCursor: true,
  });

  const accordion = (t, nextAccordion) => {
    let DivParent = $(t).closest("div[name='discription']");
    $(DivParent).find("div.d-block").addClass('d-none').removeClass('d-block');
    $(DivParent).find("div[name='"+ nextAccordion + "']").addClass('d-block').removeClass('d-none');
    console.log( $(DivParent).find("button.focus"));
    $(DivParent).find("button.focus").removeClass("focus");
    $(t).addClass("focus");
  }
  const accordionM = (t, nextAccordion) => {
    let DivParent = $(t).closest("div.body-discription");
    if($(DivParent).find("div[name='"+ nextAccordion + "']").hasClass("d-none")){
        $(DivParent).find("div[name='"+ nextAccordion + "']").removeClass('d-none').addClass('d-block');
        $(t).find("div.array-accardion").removeClass("blur");
    }else{
        console.log($(DivParent).find("div[name='"+ nextAccordion + "']"));
        console.log($(DivParent));
        $(DivParent).find("div[name='"+ nextAccordion + "']").addClass('d-none').removeClass('d-block');
        $(t).find("div.array-accardion").addClass("blur");
    }
  }

  document.addEventListener("DOMContentLoaded", function() {
    let stars = document.querySelectorAll('.rating input');
    stars.forEach(star => {
      star.addEventListener('click', function() {
        // Отправить выбранную оценку на сервер или выполнить другие действия
        console.log('Выбранная оценка:', this.value);
      });
    });
  });


  const focusInput = (t)=>{
    let $input=$(t).find("input, textarea").first();
    let $span=$(t).find("span").first();
    $input.focus();
    $span.addClass("text-plaseholder-focused");
    $span.removeClass("text-plaseholder-default");
    $(t).addClass("focused");
    $(t).removeClass("default");
    $(t).removeClass("error");
    $input.removeClass("is-invalid");
}

const blurInput = (t)=>{
    let tDiv = $(t).parent('div').get(0);
    let $span=$(tDiv).find("span").first();
    if($(tDiv).find("input, textarea").val() == ""){
    $span.removeClass("text-plaseholder-focused");
    $span.addClass("text-plaseholder-default");
    $(tDiv).removeClass("focused");
    $(tDiv).addClass("default");
    }
}

// может кастыль
const nextGuide = (t, next, type) => {
    let tDiv = $(t).closest('.modal-body').get(0);
    let backg = $(tDiv).find("div.d-block");
    let nextg = $(tDiv).find("div[name='" + next +"']");
    switch (type) {
        case "none":
                $(tDiv).parent("div").find("div[name='modalFooter']").addClass("d-none");
            break;
            case "block":
                $(tDiv).parent("div").find("div[name='modalFooter']").removeClass("d-none");
            break;
            case "noneEmail":
                let divEmailTime = $(t).parent("div");
                let emailVal = divEmailTime.find("input[name='email']").val();
                if(emailVal !== ""){
                let re = /^\S+@\S+\.\S+$/;
                if(re.test(emailVal) === false){
                    $(divEmailTime).find("div[name='emailParent']").addClass("error");
                    $(divEmailTime).find("input[name='email']").addClass("is-invalid");
                    $(divEmailTime).find("input[name='email'] ~ span.invalid-feedback").text("Недопустимый формат почты");
                    return;
                }
                else{
                    $(tDiv).parent("div").find("div[name='modalFooter']").addClass("d-none");
                    $(divEmailTime).find("div[name='emailParent']").removeClass("error");
                    $(divEmailTime).find("input[name='email']").removeClass("is-invalid");
                }

            }else{
                $(divEmailTime).find("div[name='emailParent']").addClass("error");
                $(divEmailTime).find("input[name='email']").addClass("is-invalid");
                $(divEmailTime).find("input[name='email'] ~ span.invalid-feedback").text("Необходимо ввести почту");
                return;
            }
            break;

        default:

    }
    backg.addClass("d-none").removeClass("d-block");
    nextg.addClass("d-block").removeClass("d-none");
}

function password_show_hide() {
    var x = document.getElementById("password");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }
}

const overlayMenu = (id) =>{
    console.log(dropMenu);
    $(dropMenu).find("div#dropMenu" + id).addClass("d-block").removeClass("d-none")
}

const filterCategory = (id) =>{
    if(idLastCategory == id){
        idLastCategory = -1;
    } else {
        showProduct(id);
        $(allCategory).find('[id*="'+idLastCategory+'"]').prop("checked", false);
        idLastCategory = id;
    }
}
const openUnderCategory = (id) =>{
    console.log($(allCategory).find('div#'+id));
    $(allCategory).find('div#'+id).removeClass('d-none');
    $(allCategory).find('button#open_under_category'+id).addClass('d-none');
    $(allCategory).find('button#hiden_under_category'+id).removeClass('d-none');
}
const hidenUnderCategory = (id) =>{
    $(allCategory).find('div#'+id).addClass('d-none');
    $(allCategory).find('button#hiden_under_category'+id).addClass('d-none');
    $(allCategory).find('button#open_under_category'+id).removeClass('d-none');
}



