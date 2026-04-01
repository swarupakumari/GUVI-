$("#profileForm").submit(function(e) {
    e.preventDefault();

    let session_id = localStorage.getItem("session_id");

    let data = $(this).serialize() + "&session_id=" + session_id;

    $.ajax({
        url: "php/profile.php",
        method: "POST",
        data: data,

        success: function(res) {
            alert(res);
        }
    });
});