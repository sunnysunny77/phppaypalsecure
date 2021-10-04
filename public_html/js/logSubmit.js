function logSubmit(event) {
  if (document.getElementById('loginForm')) {
    const sub = document.getElementById('submit');
    const response = document.getElementById('res');
    if (/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/.test(this.user.value)) {
      response.innerHTML = "Special characters not allowed";
      return event.preventDefault();
    }
    if (this.user.value.length > 19) {
      response.innerHTML = "Maxium user length is 19 characters";
      return event.preventDefault();
    }  
    if (this.pass.value.length > 19) {
      response.innerHTML = "Maxium password length is 19 characters";
      return event.preventDefault();
    }  
    sub.disabled=true;
    response.innerHTML = "<img width='50' height='30' alt='loading' src='../images/home/loading.gif'/>";
    const formData = new FormData(this);
    const entries = formData.entries();
    const data = Object.fromEntries(entries);
    formData.delete('user');
    formData.delete('mail');
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
  
    fetch('./login/index.php', {
      method: 'post', 
      headers: new Headers({
        'Authorization': 'Basic ' + btoa(data.user + ":" + enc),
      }),
      body: formData,
    }
    ).then(function(res) {
      return res.json()
    }).then(function(res) {
      if (res == true) {
          return window.location = "./store"
      }
      sub.disabled=false;
      response.innerHTML = res;
    }).catch((error) => {
      console.log(error)
    });
    event.preventDefault();
  }
}

document.getElementsByClassName("form")[0].addEventListener('submit', logSubmit);