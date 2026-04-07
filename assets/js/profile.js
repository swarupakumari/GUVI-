$("#profileForm").submit(function(e) {
    e.preventDefault();

    let session_id = localStorage.getItem("session_id");

    $.ajax({
        url: "php/profile.php",
        method: "POST",
        data: {
            age: $("#age").val(),
            dob: $("#dob").val(),
            contact: $("#contact").val(),
            session_id: session_id   // 🔥 safe & clear
        },

        success: function(res) {
            console.log("SERVER:", res);

            try {
                let data = JSON.parse(res);

                if (data.status === "success") {
                    alert("Profile Saved Successfully ✅");
                } else {
                    alert("Error: " + data.message);
                }

            } catch (e) {
                console.log("JSON ERROR:", e);
                alert(res); // fallback
            }
        }
    });
});