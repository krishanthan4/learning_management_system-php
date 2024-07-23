function toggleNavClose(){
    const navDiv = document.getElementById("navDiv");
    navDiv.classList.toggle("hidden");
    navDiv.classList.toggle("flex");
    
}

function signOut(){
  
    const request = new XMLHttpRequest();
    request.onreadystatechange = ()=>{
  if(request.status==200 && request.readyState==4){
  if(request.responseText=="success"){
  window.location.href = "/";
  }
  
  }
    }
    request.open("POST","../../controllers/admin/signoutController.php",true);
    request.send();
  }

  function academic_signOut(){
  
    const request = new XMLHttpRequest();
    request.onreadystatechange = ()=>{
  if(request.status==200 && request.readyState==4){
  if(request.responseText=="success"){
  window.location.href = "/";
  }
  
  }
    }
    request.open("POST","../../controllers/academic/signoutController.php",true);
    request.send();
  }

  function teacher_signOut(){
  
    const request = new XMLHttpRequest();
    request.onreadystatechange = ()=>{
  if(request.status==200 && request.readyState==4){
  if(request.responseText=="success"){
  window.location.href = "/";
  }
  
  }
    }
    request.open("POST","../../controllers/teacher/signoutController.php",true);
    request.send();
  }

  function student_signOut(){
  
    const request = new XMLHttpRequest();
    request.onreadystatechange = ()=>{
  if(request.status==200 && request.readyState==4){
  if(request.responseText=="success"){
  window.location.href = "/";
  }
  
  }
    }
    request.open("POST","../../controllers/student/signoutController.php",true);
    request.send();
  }