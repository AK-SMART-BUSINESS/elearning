$(function () {
    $.get("app/.private/apprenant/check-log.php", function (res) {
        console.log(res)
        if (res.success){
            window.location.replace(location.origin+'/classroom/dashbord');
            // console.log(location.pathname)
        }
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
        $.post("app/.private/apprenant/login.php", data, function (res) {
            console.log(res)
            if (res.success){
                window.location.replace(location.href+'dashboard')
            } else {
                $("#logMessage").html(res.message)
                $("#logMessage").fadeIn()
            }
        })
    }
})