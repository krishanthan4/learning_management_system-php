function editTeacher(id) {
    window.location.href="./edit-teachers?id="+id;
  }
  function deleteTeacher(id) {
    // alert(id);
    const request = new XMLHttpRequest();
    const form = new FormData();
    form.append("teacher_id", id);
    request.onreadystatechange = () => {
      if (request.status == 200 && request.readyState == 4) {
        if (request.responseText == "success") {
          document.getElementById("msgToast").classList.remove("hidden");
          document.getElementById("msg").innerText =
            "Teacher Deleted Successfully !";
            setTimeout(() => {
              document.getElementById("msgToast").classList.add("hidden");
          document.getElementById(id).remove();
            }, 2000);
        }else{
          document.getElementById("msgToast").classList.remove("hidden");
          document.getElementById("msg").innerText =
            "Something Went wrong";
            setTimeout(() => {
              document.getElementById("msgToast").classList.add("hidden");
            }, 2000);
        }
      }
    };
    request.open("POST","/controllers/deleteTeacherController.php",true);
    request.send(form);
  }
