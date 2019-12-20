function getThemesOption(tagId) {
    $.get('app/.private/themes/themes.php', function (res) {
        if (res.success){
            var options = '<option value="">--------------Selection thème ------------</option>';
            for (let theme of res.data){
                if (theme.statusTh == 'on'){
                    options += `<option value="${theme.idTheme}">${theme.intituleTh}</option>`;
                }
            }
            $(tagId).html(options);
        }
    })
}

function getFormations(tag) {
    $.get("app/.private/formation/list-formations.php", function (res) {
        console.log(res);
        if (res.success) {
            let output = `<h4>Toutes les formations</h4><div class="uk-alert uk-alert-primary" uk-alert>${res.message}</div>`
                output += `<table class="uk-table uk-table-small">
                    <thead>
                        <tr><th>#</th>
                            <th>Intitulé</th>
                            <th>Thème</th>
                            <th>Date ajout</th>
                            <th>Status</th>
                        </tr>
                    </thead><tbody>`;
                let i = 1;
            for (const formation of res.donnees) {
                let etat = formation.statusForm == 'on' ? 'Activé' : 'Non activé';
                let class_etat = formation.statusForm == 'on' ? 'uk-text-success' : 'uk-text-danger';
                let htm = `<tr><td>${i}</td>
                    <td><a href="./admin/detail-formation/${formation.idModuleForm}">${formation.intituleForm}</a></td>
                    <td>${formation.theme}</td>
                    <td>${formation.dateAjoutForm}</td>
                    <td class="${class_etat}">${etat}</td></tr>`
                    output += htm
            }
            output += `<tbody></table>`
            $(tag).html(output)
        } else {
            let output = `<div class="uk-alert uk-alert-danger" uk-alert>
                            <p>Pas de formation enregistrée</p>
                        </div>`
            $(tag).html(output)
        }        
    })
}

let Formateur = {
    getListFormateur: (tag, optionTag) => {
        $.get("app/.private/formateur/list-formateur.php", function (res) {
            if (res.success) {
                let output = `<h4>Toutes les formations</h4><div class="uk-alert uk-alert-primary" uk-alert>${res.message}</div>`
                    output += `<table class="uk-table uk-table-small">
                        <thead>
                            <tr><th>#</th>
                                <th>Nom & Prenoms</th>
                                <th>Email</th>
                                <th>Contact</th>     
                                <th>Date Ajout</th>                              
                                <th>Status</th>
                            </tr>
                        </thead><tbody>`;
                    let i = 1;
                for (const formateur of res.donnees) {
                    let etat = formateur.statusForm == 'on' ? 'Activé' : 'Non activé';
                    let class_etat = formateur.statusForm == 'on' ? 'uk-text-success' : 'uk-text-danger';
                    let htm = `<tr><td>${i}</td>
                        <td><a href="./admin/detail-formateur/${formateur.idFormateur}">${formateur.nomForm} ${formateur.prenomsForm}</a></td>
                        <td>${formateur.emailForm}</td>
                        <td>${formateur.contactForm}</td>
                        <td>${formateur.dateAjoutForm}</td>
                        <td class="${class_etat}">${etat}</td></tr>`
                        output += htm
                }
                output += `<tbody></table>`
                $(tag).html(output)
            } else {
                let output = `<div class="uk-alert uk-alert-danger" uk-alert>
                                <p>Pas de formation enregistrée</p>
                            </div>`
                $(tag).html(output)
            }
        })
    }
}