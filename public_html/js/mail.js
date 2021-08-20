function mail () {
    const formData = new FormData(this);
    fetch('./mail/index.php', {
        method: 'post', 
        body: formData,
        }).then(function(res) {
            return res.json() 
        })
        .then(function(res) {
            document.getElementById('res').innerHTML = res;
        }).catch((error) => {
        console.log(error)
        });
    event.preventDefault();
}

document.getElementById("mailForm").addEventListener('submit', mail);