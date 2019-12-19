//getThemes();

$(function () {
    getThemesOption("#theme_form");
});

$("#frmAddFormation").submit(function (f) {
    f.preventDefault();
    var data = {
        intitule: $('#intitule').val(),
        theme: $('#theme_form').val(),
        description: CKEDITOR.instances.description.getData(),
        prerequis: CKEDITOR.instances.prerequis.getData()
    };

    console.log(data);
});