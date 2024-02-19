const sendingForm =(t, event) =>{
    event.preventDefault();

    let data = new FormData($(t)[0]);
    $.ajax({
        type: $(t).attr("method"),
        url: $(t).attr("action"),
        data: $(t).serialize(),
        success: function (res) {
            if(res["success"] === true){
                window.location.href = '/';
            }
        },
        error: function (err){
            $(t).find("input, textarea").removeClass("is-invalid");
            $(t).find("input, textarea").parent().removeClass("error");
        if(err.status == 422){
            $.each(err.responseJSON.errors, (index, value) =>{
                console.log(value);
            $(t).find("input[name='"+ index + "'], textarea[name='" + index + "']").addClass("is-invalid");
            $(t).find("input[name='"+ index + "']").parent().addClass("error");
            $(t).find("input[name='" + index + "'] ~ span.invalid-feedback, textarea[name='" + index + "'] ~ span.invalid-feedback").text(value);
            })
        }
    }
    });
}

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
