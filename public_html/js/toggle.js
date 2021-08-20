const cked = document.getElementById("check");
const form = document.getElementsByClassName("form")[0];
const email = document.getElementById("mailForm");
const hide = document.getElementById("hide");
const hidden = document.getElementById("hidden");
const QueryString = window.location.search; 
const urlParams = new URLSearchParams(QueryString); 

if (!urlParams.has("token")) {
    form.style.display = "block";
    email.style.display = "none";
    form.id = "loginForm"
    form.children[9].value = "log in"
    hide.type = "hidden";
    hidden.style.display = "none";
} else {
    cked.checked = true;
    form.style.display = "block";
    email.style.display = "none";
    form.id = "signupForm"
    form.children[9].value = "Sign up"
    hide.type = "text";
    hidden.style.display = "block";
}

function toggle() {
    if (this.checked) {
        form.style.display = "none";
        email.style.display = "block";
    } else {
        form.style.display = "block";
        email.style.display = "none";
        form.id = "loginForm"
        form.children[9].value = "log in"
        hide.type = "hidden";
        hidden.style.display = "none";
    }
    
}
cked.addEventListener('click', toggle);