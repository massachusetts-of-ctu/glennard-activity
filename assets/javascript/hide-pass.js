const pswrdField = document.querySelector(".boxpass");
const toggleIcon = document.querySelector(".eye");

toggleIcon.addEventListener("click", () => {
    if(pswrdField.type === "password"){
        pswrdField.type = "text";
        toggleIcon.classList.add("active");
    } else {
        pswrdField.type = "password";
        toggleIcon.classList.remove("active");
    }
});
