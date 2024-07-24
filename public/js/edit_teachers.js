async function editTeacher(teacher_id) {
    const first_name = document.getElementById("fname").value;
    const last_name = document.getElementById("lname").value;
    const mobile_number = document.getElementById("mobile_number").value;
    const gender = document.getElementById("gender").value;
    const line1 = document.getElementById("line1").value;
    const line2 = document.getElementById("line2").value;
    const province = document.getElementById("province").value;
    const district = document.getElementById("district").value;
    const city = document.getElementById("city").value;
    const username = document.getElementById("username").value;
    const position = document.getElementById("position").value;
    const formData = new FormData();
    formData.append("teacher_id",teacher_id);
    formData.append("first_name",first_name);
    formData.append("last_name",last_name);
    formData.append("mobile_number",mobile_number);
    formData.append("gender",gender);
    formData.append("line1", line1);
    formData.append("line2", line2);
    formData.append("province", province);
    formData.append("district", district);
    formData.append("city", city);
    formData.append("username", username);
    try {
        const response = await fetch ("/controllers/editTeacherController.php", {
            method: "POST",
            body: formData
        });
        if(response.ok){
            const responseData = await response.text();
            if(responseData.trim() === "Updated"){
                document.getElementById("msgToast").classList.remove("hidden");
                document.getElementById("msg").innerHTML = "Profile Image Updated Successfully !";
                document.getElementById("msgToast").classList.add("border-green-500");
                document.getElementById("msgIcon").classList.add("bg-green-500");
                setTimeout(() => {
                    document.getElementById("msgToast").classList.add("hidden");
                    window.location.href="/signin";
                }, 2500);
                    window.location.reload();
            }else{
                document.getElementById("msgToast").classList.remove("hidden");
                document.getElementById("msg").innerHTML = responseData;
                setTimeout(() => {
                    document.getElementById("msgToast").classList.add("hidden");
                }, 2500);
            }
        }else{
            throw new Error("Network response was not ok.");
        }
    } catch (error) {
        console.error("Fetch error:", error);
    }
}
function addSubject(teacher_id){
    var e = document.getElementById("position");
    var subject_id = e.options[e.selectedIndex].value;
    var text = e.options[e.selectedIndex].text;
if(subject_id!=="Select"){
    const request = new XMLHttpRequest();
    const form = new FormData();
    form.append("teacher_id",teacher_id);
    form.append("subject_id",subject_id);
    request.onreadystatechange=()=>{
if(request.readyState==4 && request.status==200){
if(request.responseText=="success"){
    document.getElementById("msgToast").classList.remove("hidden");
    document.getElementById("msg").innerHTML = "Subject Added Successfully !";
    document.getElementById("msgToast").classList.add("border-green-500");
    document.getElementById("msgIcon").classList.add("bg-green-500");
    document.getElementById("msgIcon").classList.remove("bg-red-500");
    setTimeout(() => {
        document.getElementById("msgToast").classList.add("hidden");
    }, 2000);
    let lli = document.createElement('li');
    lli.classList.add("border-b","rounded-md","border-1","ps-1","py-1");
    lli.innerText =text;
document.getElementById("subjectUL").append(lli);
}else{
    document.getElementById("position").classList.add("border-red-500","border");
    setTimeout(() => {
    document.getElementById("position").classList.remove("border-red-500","border");
}, 2000);
}
}
    }
    request.open("POST","/controllers/editTeacherAddSubjectController.php",true);
    request.send(form);
}
}