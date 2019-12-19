function getThemesOption(tagId) {
    $.get('app/.private/themes/themes.php', function (res) {
        if (res.success){
            var options = '<option>--------------Selection thème ------------</option>';
            for (let theme of res.data){
                if (theme.statusTh == 'on'){
                    options += `<option value="${theme.idTheme}">${theme.intituleTh}</option>`;
                }
            }
            $(tagId).html(options);
        }
    })
}