$("#frmFinishPaie").submit(function (f) {
    f.preventDefault()
    var data = {
        mode: $("#mode_paie").val(),
        reference: $("#reference_depot").val(),
        module: $("#module").val()
    }

    if (data.mode == '') {
        alert("Sélectionnez le mode de paiement")
        return false;
    }

    if (data.reference == '') {
        alert("Saisissez la référence du dépôt")
        return false;
    }

    Application.Apprenant.inscriptionCours(data)

    // $.post("app/.private/apprenant/inscription-formation.php", data, function (res) {
    //     if (res.success) {
    //         alert(res.message)
    //         window.location.href = './classroom/dashboard'
    //     } else{
    //         alert(ress.message);
    //         return false;
    //     }
    // })
})