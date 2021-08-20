const form = document.getElementsByClassName("form")[0];
const email = document.getElementById("mailForm");
const hide = document.getElementById("hide");
const hidden = document.getElementById("hidden");
const QueryString = window.location.search; 
const urlParams = new URLSearchParams(QueryString); 

if (!urlParams.has("token")) {
    form.id = "loginForm"
    form.children[9].value = "log in"
    email.style.display = "none";
    hide.disabled = true;
    hide.type = "hidden";
    hidden.style.display = "none";
} else {
    form.id = "signupForm"
    form.children[9].value = "Sign up"
    email.style.display = "block";
    hide.disabled = false;
    hide.type = "text";
    hidden.style.display = "block";
}

function toggle() {
    if (this.checked) {
        form.id = "signupForm"
        form.children[9].value = "Sign up"
        email.style.display = "block";
        hide.disabled = false;
        hide.type = "text";
        hidden.style.display = "block";
    } else {
        form.id = "loginForm"
        form.children[9].value = "log in"
        email.style.display = "none";
        hide.disabled = true;
        hide.type = "hidden";
        hidden.style.display = "none";
    }
    
}
document.getElementById("check").addEventListener('click', toggle);