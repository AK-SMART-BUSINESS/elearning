$(function () {
    Formateur.getListFormateur('', '#list_formateur');
})

$("#frmParamModule").submit(function (f) {
    f.preventDefault()

    let data = {
        formateur: $("#list_formateur").val(),
        session_num: parseInt($("#session_num").val(), 10),
        date_debut: $("#date_debut").val(),
        date_fin: $("#date_fin").val(),
        module: $("#module").val()
    }

    if (data.formateur == "") {
        alert("Sélectionner un formateur !")
        return false
    }
    if (isNaN(data.session_num) || data.session_num <= 0) {
        alert("Numéro de session non valide !")
        return false
    }
    if (data.date_debut == "") {
        alert("Sélectionner la date de début !")
        return false
    }
    if (data.date_fin == "") {
        alert("Sélectionner la date de fin !")
        return false
    }

    Formation.addFormationSession(data);
})