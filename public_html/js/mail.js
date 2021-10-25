function mail () {
    const sub = document.getElementById('submitmail');
    const response = document.getElementById('res');  
    sub.disabled=true;
    response.innerHTML = "<img width='50' height='30' alt='loading' src='../images/home/loading.gif'/>";
    const formData = new FormData(this);
    const entries = formData.entries();
    const data = Object.fromEntries(entries);
    formData.set("email", btoa(data.email));
    fetch('./mail/index.php', {
        method: 'post', 
        body: formData,
        }).then(function(res) {
            return res.json() 
        })
        .then(function(res) {
            sub.disabled=false;
            response.innerHTML = res;
        }).catch((error) => {
        console.log(error)
        });
    event.preventDefault();
}

document.getElementById("mailForm").addEventListener('submit', mail);