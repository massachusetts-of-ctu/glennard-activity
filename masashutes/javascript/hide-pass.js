const pswrdField = document.querySelector(".form input[type='password']"),
toggleIcon = document.querySelector(".fas.fa-eye.eye");

toggleIcon.onclick = () =>{
    if(pswrdField.type === "password"){
      pswrdField.type = "text";
      toggleIcon.classList.add("active");
      console.log("changed to text");
    }else{
      pswrdField.type = "password";
      toggleIcon.classList.remove("active");
      console.log("changed to password");
    }
  }

function eye() {
    if(pswrdField.type === "password"){
        pswrdField.type = "text";
        toggleIcon.classList.add("active");
        console.log("changed to text");
      }else{
        pswrdField.type = "password";
        toggleIcon.classList.remove("active");
        console.log("changed to password");
      }
}