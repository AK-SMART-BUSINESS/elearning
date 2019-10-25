$(function () {
    getThemes()
});
// --- Récupération des thèmes enregistrés
function getThemes() {
    $("#liste").html('<div class="uk-text-center uk-text-success"><span class="uk-margin-small-right" uk-spinner="ratio: 3"></span></div>')
    $.get("app/.private/themes/themes.php", function (res) {
        if (res.success){
            var html = `
                <table class="uk-table uk-table-small uk-table-divider">
                    <thead>
                        <tr>
                              <th>#</th>
                              <th>Intitulé</th>
                              <th>Etat</th>
                              <th></th>
                        </tr>
                    </thead><tbody>
            `;

            for (let i = 0; i < res.data.length; i++){
                let pub_class = (res.data[i].statusTh == 'on') ? 'uk-text-success' : 'uk-text-danger';
                let pub_text = (res.data[i].statusTh == 'on') ? 'Publié' : 'Non publié';
                let tr = `<tr>
                            <td>${i+1}</td>
                            <td>${res.data[i].intituleTh}</td>
                            <td class="${pub_class}">
                                ${pub_text}
                            </td>
                            <td>
                                <a href="" class="uk-button uk-button-small uk-button-primary">Détail</a>
                                <a href="" class="uk-button uk-button-small uk-button-danger uk-margin-small-left">
                                <span class="uk-icon" uk-icon="icon: trash"></span>
                                Détail</a>
                            </td>
                          </tr>`;
                html += tr;
            }
            html += `</tbody></table>`;
        } else {
            var html = `
                <div class="uk-alert uk-alert-warning" uk-alert>
                    <p>${res.msg}</p>
                </div>
            `;
        }
        $("#liste").html(html);
    })
}

// --- Soumission du formulaire d'enregistrement d'un thème
$("#frmAddNewTheme").submit(function (f) {
    f.preventDefault();

    let form_data = {
        theme: $("#theme").val(),
        status: $("input[name='status']:checked").val()
    }

    if (form_data.theme == ""){
        UIkit.notification({
            message: 'Entrez l\'intitulé du thème',
            status: 'danger',
            pos: 'top-center',
            timeout: 3000
        });
        return false
    }

    $.post("app/.private/themes/new.php", form_data, function (data) {
        if (data.success){
            UIkit.notification({
                message: data.message,
                status: 'primary',
                pos: 'top-center',
                timeout: 3000
            });
            $("#theme").val("");
            getThemes();
        } else{
            UIkit.notification({
                message: data.message,
                status: 'warning',
                pos: 'top-center',
                timeout: 3000
            });
        }
    })
});