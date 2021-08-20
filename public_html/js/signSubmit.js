const form = document.getElementsByClassName("form")[0];

function logSubmit(event) {
  if (document.getElementById('signupForm')) {
    const sub = document.getElementById('submit');
    const response = document.getElementById('res');
    
    sub.disabled=true;
    response.innerHTML = "<img width='50' height='30' alt='loading' src='../images/home/loading.gif'/>";
    
    const formData = new FormData(this);
    const entries = formData.entries();
    const data = Object.fromEntries(entries);
    formData.delete('user');
    formData.delete('pass');  
    formData.delete('key');
    formData.delete('iv');
    
    function encrypt(x,z,y){
      var message = x;
      var key = CryptoJS.enc.Hex.parse(z);
      var iv = CryptoJS.enc.Hex.parse(y);
      var encrypted = CryptoJS.AES.encrypt(message, key, {
          iv,
          padding: CryptoJS.pad.ZeroPadding,
      });
      return encrypted.toString();
    }
    const enc = encrypt(data.pass,data.key,data.iv);
  
    fetch('./signup/index.php', {
      method: 'post', 
      headers: new Headers({
        'Authorization': 'Basic ' + btoa(data.user + ":" + enc),
      }),
      body: formData,
    }
    ).then(function(res) {
      return res.json()
    }).then(function(res) {
      sub.disabled = false;
      response.innerHTML = res;
      if (res == "Signed up") {
        sub.disabled=false;
        document.getElementById("check").checked = false;
        form.id = "loginForm"
        form.children[9].value = "log in"
        document.getElementById("mailForm").style.display = "none";
        document.getElementById("hide").type = "hidden";
        document.getElementById("hidden").style.display = "none";
        window.history.pushState('', '', '/');
      }
    }).catch((error) => {
      console.log(error)
    });
    event.preventDefault();
  }
}

form.addEventListener('submit', logSubmit);