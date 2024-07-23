function signIn() {
    const email = $("#email").val();
    const password = $("#password").val();
    const rememberMe = $("#rememberMe").is(":checked") ? "true" : "false";
    
    const formData = new FormData();
    formData.append("email", email);
    formData.append("password", password);

    $.ajax({
        url: "/controllers/student/signinController.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(responseData) {
            if (responseData.trim() === "success") {
                window.location.href = "/student";
            } else {
                $("#msgToast").removeClass("hidden");
                $("#msg").html(responseData);
                setTimeout(() => {
                    $("#msgToast").addClass("hidden");
                }, 2500);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", errorThrown);
        }
    });
}

function student_signup() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const verification_code = document.getElementById("verification_code").value;

    if (!username) {
        alert("Please Enter the Username");
    } else if (!password) {
        alert("Please Enter the password");
    } else if (!verification_code) {
        alert("Please Enter the verification code");
    } else {
        const request = new XMLHttpRequest();
        const form = new FormData();
        form.append("username", username);
        form.append("password", password);
        form.append("verification_code", verification_code);

        request.onreadystatechange = () => {
            if (request.readyState == 4 && request.status == 200) {
                if (request.responseText == "success") {
                    window.location.href = "/student";
                } else {
                    alert(request.responseText);
                }
            }
        };

        request.open("POST", "/controllers/student/signupController.php", true);
        request.send(form);
    }
}