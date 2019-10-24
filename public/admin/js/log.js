$(function () {
    $.get("app/.private/admin/check-login.php", function (res) {
        //console.log(res)
        if (res.success){
            window.location.replace(location.href+'/ad-dashboard');
        }
        // console.log(location.href)
    })
})

$("#btnLog").click(function (e) {
    $("#logMessage").fadeOut()
    e.preventDefault()
    let data = {
        email: $("#username").val(),
        password: $("#password").val()
    }
    let error_msg = []

    if (data.email == ""){
        error_msg.push("Username non valide");
    }
    if (data.password == ""){
        error_msg.push("Entrez votre mot de passe")
    }

    if (error_msg.length > 0){
        let output = `<ul>`
        for (let message of error_msg){
            output += `<li>${message}</li>`
        }
        output += `</ul>`
        $("#logMessage").html(output)
        $("#logMessage").fadeIn()
    } else {
        $.post("app/.private/admin/log.php", data, function (res) {
            console.log(res)
            if (res.success){
                window.location.replace(location.href+'/ad-dashboard')
            } else {
                $("#logMessage").html(res.message)
                $("#logMessage").fadeIn()
            }
        })
    }
})