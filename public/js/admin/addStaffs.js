function addStaffs() {

    const request = new XMLHttpRequest();
    const form = new FormData();
    form.append("firstname",document.getElementById("firstname").value);
    form.append("lastname",document.getElementById("lastname").value);
    form.append("gender",document.getElementById("gender").value);
    form.append("email",document.getElementById("email").value);
    form.append("occupation",document.getElementById("occupation").value);
    form.append("username",document.getElementById("username").value);
    form.append("password",document.getElementById("email").value);
request.onreadystatechange= ()=>{
if(request.readyState==4 && request.status==200){
if(request.responseText=="success"){

    
}
}


    }
    alert("hello");
}