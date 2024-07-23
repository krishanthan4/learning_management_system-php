function assignMarks() {
  var student_email = document.getElementById("student_email").value;
  var assignment_id = document.getElementById("assignment_id").value;
  const marks = document.getElementById("marks").value;
  if (student_email == "Select") {
    alert("Select a Student Email");
  } else if (assignment_id == "Select") {
    alert("Select an Assignment");
  } else if (0 > marks || marks > 100) {
    alert("Invalid Marks");
  } else {
    const request = new XMLHttpRequest();
    const form = new FormData();
    form.append("student_email", student_email);
    form.append("assignment_id", assignment_id);
    form.append("marks", marks);
    request.onreadystatechange = () => {
      if (request.status == 200 && request.readyState == 4) {
        if (request.responseText == "success") {
          alert("mark Assigned Successfully !");
          location.reload();
        }else if(request.responseText=="already"){
alert("The Marks Are Assigned Already !");
        }else{
            alert("something went wrong !");
        }
      }
    };
    request.open(
      "POST",
      "../../controllers/academic/AssignmentMarksController.php",
      true
    );
    request.send(form);
  }
}

function sentToStudent(email,id){
  
      const request = new XMLHttpRequest();
      const form = new FormData();
      form.append("student_email", email);
      form.append("assignment_id", id);
      request.onreadystatechange = () => {
        if (request.status == 200 && request.readyState == 4) {
          if (request.responseText == "success") {
let sendbutton = document.getElementById("sendButton"+email+id);
sendbutton.classList.add("bg-green-500");
sendbutton.classList.remove("bg-orange-400");
sendbutton.innerText="Mark Sent";
sendbutton.disabled = true;
        }else{
              alert("something went wrong !");
          }
        }
      };
      request.open(
        "POST",
        "../../controllers/academic/AssignmentMarksController.php",
        true
      );
      request.send(form);
    }   
