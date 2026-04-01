$("#loginForm").submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: "php/login.php",
        method: "POST",
        data: $(this).serialize(),

       success: function(res) {
    console.log("RAW RESPONSE:", res);

    try {
        let data = JSON.parse(res);
        console.log("PARSED DATA:", data);

        if (data.status === "success") {
            console.log("SESSION FROM SERVER:", data.session_id);

            localStorage.setItem("session_id", data.session_id);

            console.log("AFTER STORE:", localStorage.getItem("session_id"));

            window.location = "profile.html";
        } else {
            alert("Login failed");
        }

    } catch (e) {
        console.log("JSON ERROR:", e);
    }
}
    });
});