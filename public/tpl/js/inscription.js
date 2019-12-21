$("#frminscrip").submit(function (f) {
    f.preventDefault()
    var data = {
        mon: $("#nom_app").val(),
        prenoms: $("#prenom_app").val(),
        contact: $("#module").val(),
        email : $("#email_app").val(),
        passe : $("#mdp_app").val(),
        pseudo : $("#pseudo_app").val(),
        
    }

    if (data.nom == '') {
        alert("Veuillez entrer votre nom")
        return false;
    }

    if (data.prenoms == '') {
        alert("Veuillez saisir votre (vos) prenom(s)")
        return false;
    }

    if (data.contact == '') {
        alert("Veuillez saisir votre contact")
        return false;
    }

    if (data.email == '') {
        alert("Veuillez saisir votre adresse mail")
        return false;
    }

    if (data.passe == '') {
        alert("Veuillez saisir un mot de pass")
        return false;
    }

    Application.Apprenant.addApprenant(data)

    /*$.post("app/.private/apprenant/inscription-formation.php", data, function (res) {
        if (res.success) {
            alert(res.message)
            window.location.href = './classroom/dashboard'
        } else{
            alert(ress.message);
            return false;
        }
    })*/
})