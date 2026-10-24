const divTop = document.querySelector(".top");
const messageBox = document.querySelector(".message-box")
const userName = document.querySelector("#inputUsername")
const userEmail = document.querySelector("#inputEmail")
const userPass = document.querySelector("#inputPass")
const userPassRepeat = document.querySelector("#inputPassRp")

if(window.innerWidth < 500){

    const h4Elem = document.createElement("h4");
    const imgElem = document.createElement("img");

    imgElem.src = "./assets/images/icons8-nike-150.png";

    h4Elem.innerHTML = "Get Started";

    divTop.append(h4Elem, imgElem);
}

let validateUsername = () => {

   if(userName.value.length < 5) {
    messageBox.style.backgroundColor = "red"
    messageBox.style.display = "block"
    messageBox.innerHTML = "UserName Is Invalid"
    document.body.style.flexDirection = "column"
   } else {
    document.body.style.flexDirection = "column"
    messageBox.style.backgroundColor = "green"
    messageBox.style.display = "block"
    messageBox.innerHTML = "UserName is Valid"
   }

   setTimeout(() => {
    messageBox.style.display = "none"
   }, 3000)
}

let validateEmail = () => {

   if(userEmail.value.length < 5 || userEmail.value.indexOf("@") < 1) {
    messageBox.style.backgroundColor = "red"
    messageBox.style.display = "block"
    messageBox.innerHTML = "Email Is Invalid"
    document.body.style.flexDirection = "column"
   } else {
    document.body.style.flexDirection = "column"
    messageBox.style.backgroundColor = "green"
    messageBox.style.display = "block"
    messageBox.innerHTML = "Email is Valid"
   }

   setTimeout(() => {
    messageBox.style.display = "none"
   }, 3000)
}

let validatePass = () => {

   if(userPass.value.length < 5) {
    messageBox.style.backgroundColor = "red"
    messageBox.style.display = "block"
    messageBox.innerHTML = "Password Is Invalid"
    document.body.style.flexDirection = "column"
   } else {
    document.body.style.flexDirection = "column"
    messageBox.style.backgroundColor = "green"
    messageBox.style.display = "block"
    messageBox.innerHTML = "Password is Valid"
   }

   setTimeout(() => {
    messageBox.style.display = "none"
   }, 3000)
}

let validateRepeatPass = () => {

   if(userPassRepeat.value.length < 5 || userPassRepeat.value != userPass.value) {
    messageBox.style.backgroundColor = "red"
    messageBox.style.display = "block"
    messageBox.innerHTML = "Data Is Invalid"
    document.body.style.flexDirection = "column"
   } else {
    document.body.style.flexDirection = "column"
    messageBox.style.backgroundColor = "green"
    messageBox.style.display = "block"
    messageBox.innerHTML = "Data is Valid"
   }

   setTimeout(() => {
    messageBox.style.display = "none"
   }, 3000)
}

userName.addEventListener("input", validateUsername)
userEmail.addEventListener("input", validateEmail)
userPass.addEventListener("input", validatePass)
userPassRepeat.addEventListener("input", validateRepeatPass)