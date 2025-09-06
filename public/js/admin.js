var deleteId = document.getElementById("inputDeleteId");
var editCategory = document.getElementById("editCategory");
var deleteCategory = document.("div#deleteCategory");

const valDeleteProduct = (id) => {
    console.log(deleteId);
$(deleteId).val(id);
}

const editCategory = (id, name, mouthcategory) => {
    $(editCategory).find("editCategoryId").val(id);
    $(editCategory).find("editCategoryName").val(name);
    $(editCategory).find("editCategoryCategoriesId").val(mouthcategory).trigger("change");
}

const deleteCategory = (id) =>{
    console.log($(deleteCategory).find("input#id"));
    $(deleteCategory).find("input#id").val(id);
}
