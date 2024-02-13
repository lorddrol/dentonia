const myToastEl = document.getElementById('myToastEl');
const myToast = bootstrap.Toast.getOrCreateInstance(myToastEl);

function FromEvent(from, e) {
    e.preventDefault();
    let idFrom = $(from).attr('id');

    $.post({
        url: $(from).attr('action'),
        data: $(from).serialize(),
        success: (res) => {
            window.location.href = "/";
        },
        error: (res) => {
            console.log(res);

            $('form#' + idFrom + ' input').removeClass('is-invalid');
            $('form#' + idFrom + ' div.invalid-feedback').text('');

            $.each(res.responseJSON, (index, errors) => {
                $('form#' + idFrom + ' input#' + index + 'Input').addClass('is-invalid');
                $('form#' + idFrom + ' div#' + index + 'Error').text(errors);
            });
        }
    });
}

function addCart(id) {
    $.get({
        url: '/addCart',
        data: {
            id: id,
        },
        success: function (res) {
            console.log(res);
            $('div.toast-body').text("Товар был добавлен");
            myToast.show();
        },
        error: function (res) {
            console.log(res);
            $('div.toast-body').text("У нас нет столько");
            myToast.show();
        }
    });
}

function changeCount(id, type) {
    $.get({
        url: '/cart/change',
        data: {
            id: id,
            type: type,
        },
        success: function (res) {
            console.log(res);
            $('span#count' + id).text(res.count);
            $('span#cartPrice' + id).text(res.sumCart);
            $('span#sum').text(res.sum);
            $('span#sumCount').text(res.sumCount);
        },
        error: function (res) {
            console.log(res);
            if (res.responseJSON.change == 'noCount') {
                $('div.toast-body').text('У нас нет столько товаров!');
                myToast.show();
            }

            if (res.responseJSON.change == 'noNull') {
                $('div.toast-body').text('Мы не продаем воздух.');
                myToast.show();
            }
        }
    });
}

function formAction(form, e) {
    e.preventDefault();
    let idForm = $(form).attr('id');

    $.post({
        url: $(form).attr('action'),
        data: $(form).serialize(),
        success: (res) => {
            window.location.replace("/cart");
        },
        error: (res) => {
            console.log(res);

            $('form#' + idForm + ' input').removeClass('is-invalid');
            $('form#' + idForm + ' div.invalid-feedback').text('');

            $.each(res.responseJSON, (index, errors) => {
                $('form#' + idForm + ' input#' + index + 'Input2').addClass('is-invalid');
                $('form#' + idForm + ' div#' + index + 'Error2').text(errors);
            });
        }
    });
}

function catCreate(categ, e) {
    e.preventDefault();
    let catId = $(categ).attr('id');

    $.post({
        url: $(categ).attr('action'),
        data: $(categ).serialize(),
        success: (res) => {
            window.location.replace("/adminCategory");
        },
        error: (res) => {
            console.log(res);

            $('form#' + catId + ' input').removeClass('is-invalid');
            $('form#' + catId + ' div.invalid-feedback').text('');

            $.each(res.responseJSON, (index, errors) => {
                $('form#' + catId + ' input#' + index + 'Input').addClass('is-invalid');
                $('form#' + catId + ' div#' + index + 'Error').text(errors);
            });
        }
    });
}

function orderChange(el, ido) {
    if (el == 'decline') {
        $('#slider' + ido).slideDown(225);
        $('#select-id' + ido).removeClass('border-warning-subtle');
        $('#select-id' + ido).removeClass('text-warning');
        $('#select-id' + ido).removeClass('border-primary');
        $('#select-id' + ido).removeClass('text-primary');
        $('#select-id' + ido).addClass('border-danger');
        $('#select-id' + ido).addClass('text-danger');
        $('#button' + ido).attr('disabled', false);
    }
    else if (el == 'confirm') {
        $('#slider' + ido).slideUp(225);
        $('#select-id' + ido).removeClass('border-danger');
        $('#select-id' + ido).removeClass('text-danger');
        $('#select-id' + ido).removeClass('border-primary');
        $('#select-id' + ido).removeClass('text-primary');
        $('#select-id' + ido).addClass('border-warning-subtle');
        $('#select-id' + ido).addClass('text-warning');
        $('#button' + ido).attr('disabled', false);
    }
    else {
        $('#slider' + ido).slideUp(225);
        $('#select-id' + ido).removeClass('border-danger');
        $('#select-id' + ido).removeClass('text-danger');
        $('#select-id' + ido).removeClass('border-warning-subtle');
        $('#select-id' + ido).removeClass('text-warning');
        $('#select-id' + ido).addClass('border-primary');
        $('#select-id' + ido).addClass('text-primary');
        $('#button' + ido).attr('disabled', true);
    }
}

$(document).ready(function () {
    let url = window.location.pathname;

    if (url == '/adminOrders') {
        orderChangeLoad();
    }
});

function orderChangeLoad() {
    let array = $('select[name="selector"]').each(function() {
        $(this).attr('id');
    });

    let buttonId = $('div#button-opt').each(function() {
        $(this).attr('id');
    });

    let sliderArray = $('div#slider-opt').each(function() {
        $(this).attr('id');
    });
    
    $.each(array, function (index) {
        let id = $(array[index]).val();
        
        if (id == 'decline') {
            $(sliderArray.children()[index]).slideDown(1);
            $(id[index]).attr('border-danger', true);
            $(id[index]).attr('text-danger', true);
            return 1;
        }
        else {
            if (id !== 'decline') {
                $(buttonId.children()[index]).attr('disabled', true);
            }
            else {
                $(buttonId.children()[index]).attr('disabled', false);
            }
            $(sliderArray.children()[index]).slideUp(1);
            return 1;
        }
    });
}

function adminOrderFilter(id)
{
    $.get({
        url: "/adminOrders/orderFilter",
        data: {
            id: id,
        },
        success: function (res) {
            console.log(res);
        },
        error: function (res) {
            console.log(res);
        }
    });
}