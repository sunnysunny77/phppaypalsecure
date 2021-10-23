function logSubmit(event) {
  if (document.getElementById('loginForm')) {
    const response = document.getElementById('res');
    if (/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/.test(this.user.value)) {
      response.innerHTML = "User accepts no special characters";
      return event.preventDefault();
    }
    if (/^[^0-9]+$/.test(this.pass.value)) {
      response.innerHTML = "Pass accepts one # ";
      return event.preventDefault();
    }
    if (/^[^A-Z]+$/.test(this.pass.value)) {
      response.innerHTML = "Pass accepts one capital";
      return event.preventDefault();
    }
    if (/^[^a-z]+$/.test(this.pass.value)) {
      response.innerHTML = "Pass accepts one lowercase";
      return event.preventDefault();
    }
    if (this.user.value.length > 19 || this.user.value.length  < 8) {
      response.innerHTML = "User accepts 8 to 19 characters";
      return event.preventDefault();
    }  
    if (this.pass.value.length > 19 || this.pass.value.length  < 8) {
      response.innerHTML = "Pass accepts8 to 19 characters";
      return event.preventDefault();
    }
    const sub = document.getElementById('submit');  
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