function academic_signup() {
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
                    window.location.href = "/academic-officer";
                } else {
                    alert(request.responseText);
                }
            }
        };
        request.open("POST", "/controllers/academic/academic_signupController.php", true);
        request.send(form);
    }
}
function academic_signIn(){
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    if (!username) {
        alert("Please Enter the Username");
    } else if (!password) {
        alert("Please Enter the password");
    } else {
        const request = new XMLHttpRequest();
        const form = new FormData();
        form.append("username", username);
        form.append("password", password);
        request.onreadystatechange = () => {
            if (request.readyState == 4 && request.status == 200) {
                if (request.responseText == "success") {
                    window.location.href = "/academic-officer";
                } else {
                    alert(request.responseText);
                }
            }
        };
        request.open("POST", "/controllers/academic/academic_signinController.php", true);
        request.send(form);
    }
}