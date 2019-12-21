let Application = {
    Home: {
        getFontCourses: (tag) => {
            $.get('app/.private/formation/get-font-formation.php', function (res) {
                $(tag).html('<span class="uk-spinner"></span>')
                if (res.success) {
                    let out = ''

                    for (const cours of res.donnees) {
                        out += `<div class="uk-flex uk-flex-between uk-grid uk-grid-match uk-grid-collapse uk-margin-small-bottom" uk-grid>
                            <div class="uk-width-1-2@m">
                                <img src="./media/uploads/${cours.image}" alt="${cours.image}">
                            </div>
                            <div class="uk-width-1-2@m uk-padding-small">
                                <div>
                                    <h3 class="uk-margin-remove">${cours.intituleForm}</h3>
                                    <h6 class="uk-margin-remove">
                                        <small>Thème: </small>
                                        <span>${cours.theme}</span>
                                    </h6>
                                </div>
                                <p>Status: <b class="uk-text-success" style="text-transform:uppercase">${cours.statusSession}</b></p>
                                <a href="detail-cours/${cours.idModuleForm}" class="uk-button uk-button-default uk-button-small uk-button-primary">Aperçu</a>
                            </div>
                        </div>`
                    }
                    $(tag).html(out)
                } else {
                    let out = `
                    <div>
                        <p>Désolé, il n'y a pas de cours disponible pour l'instant.</p>
                    </div>`
                    $(tag).html(out)
                }               
            })
        }
    },
    Apprenant: {
        addApprenant: (data) => {
            $.post("app/.private/apprenant/add-apprenant.php", data, function (res) {
                alert(res.message)
                if (res.success) {
                    window.location.href('./classroom/');
                } else {
                    console.log(res)
                    return false;
                }
            })
        }
    }
}