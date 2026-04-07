$("#registerForm").submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: "php/register.php",
        method: "POST",
        data: $(this).serialize(),

        success: function(res) {
            console.log("RAW:", res);

            try {
                let data = JSON.parse(res);

                if (data.status === "success") {
                    alert("Registered Successfully ✅");
                    window.location = "login.html";
                } else {
                    alert("Error: " + (data.message || "Registration failed"));
                }

            } catch (e) {
                console.log("JSON ERROR:", e);
                alert(res); // fallback
            }
        },

        error: function() {
            alert("Server error ❌");
        }
    });
});