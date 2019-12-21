$(function () {
    Formateur.getListFormateur('#tabList')
});

$('#frmAddFormateur').submit(function (f) {
    f.preventDefault()
    let data = {
        nom: $('#nom').val(),
        prenom: $('#prenoms').val(),
        email: $('#email').val(),
        contact: $('#contact').val(),
        specialites: $('#specialites').val(),
        pays: $('#pays').val(),
        ville: $('#ville').val(),
        passe: $('#passe').val(),
    }

    if (data.nom == '') {
        alert('Entrez le nom !')
        return false
    }
    if (data.prenom == '') {
        alert('Entrez un prénom !')
        return false
    }
    if (data.email == '') {
        alert('Entrez le mail !')
        return false
    }
    if (data.passe == '') {
        alert('Définissez un mot de passe !')
        return false
    }

    $.post('app/.private/formateur/add-formateur.php', data, function (res) {
        // console.log(res);        
        alert(res.message);

        if (res.success) {
            window.location.reload()
        } else {
            console.error(res);            
            return false;
        }
    })
})