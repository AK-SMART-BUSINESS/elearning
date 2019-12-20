//getThemes();

$(function () {
    getFormations('#tabList');
    getThemesOption("#theme_form");
});

$("#frmAddFormation").submit(function (f) {
    f.preventDefault();
    var data = {
        intitule: $('#intitule').val(),
        theme: $('#theme_form').val(),
        cout: parseInt($('#prix').val(), 10),
        description: CKEDITOR.instances.description.getData(),
        prerequis: CKEDITOR.instances.prerequis.getData()
    };

    // console.log(data);
    if (data.intitule == '') {
        alert('Veuillez renseigner l\'intitulé de la formation')
        return false;
    }

    if (data.theme == '') {
        alert('Veuillez sélectionner le thème de la formation')
        return false;
    }

    if (isNaN(data.cout)) {
        alert('Veuillez entrer le coût de la formation')
        return false;
    }

    // let frmData = new FormData();
    let frmData = new FormData()
    frmData.append('image_form', $('#image_form')[0].files[0])
    frmData.append('intitule', data.intitule)
    frmData.append('theme', data.theme)
    frmData.append('prix', data.cout)
    frmData.append('description', data.description)
    frmData.append('prerequis', data.prerequis)

    $.ajax({
        type: $(this).attr("method"),
        url: 'app/.private/formation/add-formation.php',
        data: frmData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (res) {
            //console.log(res);
            alert(res.message)
            window.location.reload()           
        },
        error: function (res) {
            alert(res.message)
            console.error(res);             
            return false         
        }
    })

    // console.log(frmData.get('image_form'));
    // $.post("app/.private/formation/add-formation.php", {data: frmData}, function (res) {
    //     console.log(res);
        
    // })
    
});