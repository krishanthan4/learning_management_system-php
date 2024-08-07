async function updateProfile() {
    const firstName = document.getElementById("fname").value;
    const lastName = document.getElementById("lname").value;
    const mobile = document.getElementById("mobile").value;
    const gender = document.getElementById("gender").value;
    const line1 = document.getElementById("line1").value;
    const line2 = document.getElementById("line2").value;
    const province = document.getElementById("province").value;
    const district = document.getElementById("district").value;
    const city = document.getElementById("city").value;
    const pcode = document.getElementById("pcode").value;
    const image = document.getElementById("userImage").files[0];
    const formData = new FormData();
    formData.append("firstName", firstName);
    formData.append("lastName", lastName);
    formData.append("mobile", mobile);
    formData.append("gender", gender);
    formData.append("line1", line1);
    formData.append("line2", line2);
    formData.append("province", province);
    formData.append("district", district);
    formData.append("city", city);
    formData.append("pcode", pcode);
    formData.append("image", image);
    try {
        const response = await fetch("/processes/updateProfileProcess.php", {
            method: "POST",
            body: formData
        });
        if (response.ok) {
            const responseData = await response.text();
           {
                document.getElementById("msgToast").classList.remove("hidden");
                document.getElementById("msg").innerHTML = responseData;
                setTimeout(() => {
                    document.getElementById("msgToast").classList.add("hidden");
                }, 2500);
            }
        } else {
            throw new Error("Network response was not ok.");
        }
    } catch (error) {
        console.error("Fetch error:", error);
    }
}