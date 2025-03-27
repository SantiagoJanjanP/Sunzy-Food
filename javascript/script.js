function loader(){
   document.querySelector('.loader').style.display = 'none';
}

function fadeOut(){
   setInterval(loader, 1250);
}

window.onload = fadeOut;


const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input");


nextBtn.addEventListener("click", ()=> {
    allInput.forEach(input => {
        if(input.value != ""){
            form.classList.add('secActive');
            
        }else{
            form.classList.remove('secActive');
        }
    })
})

backBtn.addEventListener("click", () => form.classList.remove('secActive'));

// Age finder base on date of birth

function FindAge() {
    var day= document.getElementById("dob").value;
    var DOB = new Date(day);
    var today = new Date();
    var Age = today.getTime() - DOB.getTime();
    Age = Math.floor(Age/(1000 * 60 * 60 * 24 * 365.25));
    document.getElementById("age").value = Age;
}

var close = document.getElementsByClassName("closebtn");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
  // When someone clicks on a close button
  close[i].onclick = function(){

    // Get the parent of <span class="closebtn"> (<div class="alert">)
    var div = this.parentElement;

    // Set the opacity of div to 0 (transparent)
    div.style.opacity = "0";

    // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
// navbar = document.querySelector('.header .flex .navbar');

// document.querySelector('#menu-btn').onclick = () =>{
//    navbar.classList.toggle('active');
//    profile.classList.remove('active');
// }

// profile = document.querySelector('.header .flex .profile');

// document.querySelector('#user-btn').onclick = () =>{
//    profile.classList.toggle('active');
//    navbar.classList.remove('active');
// }

// window.onscroll = () =>{
//    navbar.classList.remove('active');
//    profile.classList.remove('active');
// }

// function loader(){
//    document.querySelector('.loader').style.display = 'none';
// }

// function fadeOut(){
//    setInterval(loader, 2000);
// }

// window.onload = fadeOut;

// document.querySelectorAll('input[type="number"]').forEach(numberInput => {
//    numberInput.oninput = () =>{
//       if(numberInput.value.length > numberInput.maxLength) numberInput.value = numberInput.value.slice(0, numberInput.maxLength);
//    };
// });

// new
// const formm = document.getElementById('formm');
// const username = document.getElementById('username');
// const lastname = document.getElementById('lastname');
// const email = document.getElementById('email');
// const password = document.getElementById('password');
// const cpassword = document.getElementById('cpassword');

// form.addEventListener('reg_user', (event) =>{
//     event.preventDefault();

//     Validate();
// })-

// const sendData = (usernameVal, sRate, Count) => {
//     if(sRate === Count){
//         swal("Hello " + usernameVal , "You are Registered", "success");
//     }
// }

// const SuccessMsg = (usernameVal) => {
//     let formContr = document.getElementsByClassName('input-field');
//     var Count = formContr.length - 1;
//     for(var i = 0; i < formContr.length; i++){
//         if(formContr[i].className === "input-field success"){
//             var sRate = 0 + i;
//             console.log(sRate);
//             sendData(usernameVal, sRate, Count);
//         }
//         else{
//             return false;
//         }
//     }
// }


// const isEmail = (emailVal) =>{
//     var atSymbol = emailVal.indexOf('@');
//     if(atSymbol < 1) return false;
//     var dot = emailVal.lastIndexOf('.');
//     if(dot <= atSymbol + 2) return false;
//     if(dot === emailVal.length -1) return false;
//     return true;
// }

// function Validate(){
//     const usernameVal = username.value.trim();
//     const lastnameVal = lastname.value.trim();
//     const emailVal = email.value.trim();
//     const passwordVal = password.value.trim();
//     const cpasswordVal = cpassword.value.trim();

//     //username
//     if(usernameVal === ""){
//         setErrorMsg(username, 'first name cannot be blank');
//     }
//     else if(usernameVal.length <=2){
//         setErrorMsg(username, 'min 3 char');
//     }
//     else{
//         setSuccessMsg(username);
//     }

//     //last name

//     if(lastnameVal === ""){
//         setErrorMsg(lastname, 'last name cannot be blank');
//     }
//     else if(lastnameVal.length <=2){
//         setErrorMsg(lastname, 'min 3 char');
//     }
//     else{
//         setSuccessMsg(lastname);
//     }

//     //email
//     if(emailVal === ""){
//         setErrorMsg(email, 'email cannot be blank');
//     }
//     else if(!isEmail(emailVal)){
//         setErrorMsg(email, 'email is not valid');
//     }
//     else{
//         setSuccessMsg(email);
//     }

//     //password
//     if(passwordVal === ""){
//         setErrorMsg(password, 'password cannot be blank');
//     }
//     else if(passwordVal.length <= 7){
//         setErrorMsg(password, 'min 8 char');
//     }
//     else{
//         setSuccessMsg(password);
//     }

//     //confirm password
//     if(cpasswordVal === ""){
//         setErrorMsg(cpassword, 'confirm password cannot be blank');
//     }
//     else if(passwordVal != cpasswordVal){
//         setErrorMsg(cpassword, 'Not Matched!');
//     }
//     else{
//         setSuccessMsg(cpassword);
//     }
//     SuccessMsg(usernameVal);


// }

// function setErrorMsg(input, errormsgs){
//     const formControl = input.parentElement;
//     const small = formControl.querySelector('small');
//     formControl.className = "input-field error";
//     small.innerText = errormsgs;
// }

// function setSuccessMsg(input){
//     const formControl = input.parentElement;
//     formControl.className = "input-field success";
// }
