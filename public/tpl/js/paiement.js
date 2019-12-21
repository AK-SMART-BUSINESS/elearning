$("#frmFinishPaie").submit(function (f) {
    f.preventDefault()
    let data = {
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

    // Application.Apprenant.inscriptionCours(data)
    console.log(data);
    

    $.post("app/.private/apprenant/inscription-formation.php", data, function (res) {
        console.log(res);
        
        if (res.success) {
            alert(res.message)
            window.location.href = './classroom/'
        } else{
            alert(res.message);
            return false;
        }
    })
})