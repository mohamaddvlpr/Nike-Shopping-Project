const divTop = document.querySelector(".top");
const messageBox = document.querySelector(".message-box")
const userEmail = document.querySelector("#inputEmail")
const userPass = document.querySelector("#inputPass")

if(divTop && window.innerWidth < 500){

    const h4Elem = document.createElement("h4");
    const imgElem = document.createElement("img");

    imgElem.src = "./assets/images/icons8-nike-150.png";

    h4Elem.innerHTML = "Get Started";

    divTop.append(h4Elem, imgElem);
}

let validateEmail = () => {

   if(!messageBox) return

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

   if(!messageBox) return

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

userEmail.addEventListener("input", validateEmail)
userPass.addEventListener("input", validatePass)