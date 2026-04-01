$("#registerForm").submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: "php/register.php",
        method: "POST",
        data: $(this).serialize(),

        success: function(res) {
            alert(res);
            window.location = "login.html";
        }
    });
});