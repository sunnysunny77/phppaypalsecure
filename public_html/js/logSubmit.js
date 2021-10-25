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
    
    fetch('./login/index.php', {
      method: 'post', 
      headers: new Headers({
        'Authorization': 'Basic ' + btoa(data.user + ":" + data.pass),
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