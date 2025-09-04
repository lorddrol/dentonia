var modalToggleAuthOrReg = document.getElementById('authOrReg'); // relatedTarget
var modalToggleCommentFormModal = document.getElementById('commentFormModal');

const sendingForm =(t, event) =>{
    event.preventDefault();

    let data = new FormData($(t)[0]);
    $.ajax({
        type: $(t).attr("method"),
        url: $(t).attr("action"),
        data: $(t).serialize(),
        success: function (res) {
        },
        error: (err)=>{
            $.each(err.responseJSON, (index, value) => {
            console.log(index);
            });
            $(t).find("input[name='"+ err.index + "'], textarea[name='" + err.index + "']").addClass("is-invalid");
            $(t).find("input[name='" + err.index + "'] ~ span.invalid-feedback, textarea[name='" + err.index + "'] ~ span.invalid-feedback").text(err.value);
        }
    });
}
