const cked = document.getElementById("check");
const formClass = document.getElementsByClassName("form")[0];
const email = document.getElementById("mailForm");
const hide = document.getElementById("hide");
const hidden = document.getElementById("hidden");
const QueryString = window.location.search; 
const urlParams = new URLSearchParams(QueryString); 

if (!urlParams.has("token")) {
    formClass.style.display = "block";
    email.style.display = "none";
    formClass.id = "loginForm"
    formClass.children[7].value = "log in"
    hide.type = "hidden";
    hidden.style.display = "none";
} else {
    cked.checked = true;
    formClass.style.display = "block";
    email.style.display = "none";
    formClass.id = "signupForm"
    formClass.children[7].value = "Sign up"
    hide.type = "text";
    hidden.style.display = "block";
}

function toggle() {
    if (this.checked) {
        formClass.style.display = "none";
        email.style.display = "block";
    } else {
        formClass.style.display = "block";
        email.style.display = "none";
        formClass.id = "loginForm"
        formClass.children[7].value = "log in"
        hide.type = "hidden";
        hidden.style.display = "none";
    }
    
}
cked.addEventListener('click', toggle);