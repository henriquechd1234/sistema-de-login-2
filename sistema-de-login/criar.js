document.getElementById('tudo').addEventListener('submit', function (event) {event.preventDefault();

    const formdata = new  FormData();

    formdata.append('nome',document.getElementById('nome').value);
    formdata.append('email', document.getElementById('email').value);
    formdata.append('senha', document.getElementById('senha').value);
    

    fetch ('algumacoisa.php', {
    method: 'POST',
    body: formdata
    })  
    .then(response => response.text())
    .then(data => alert(data))
    .catch(error => console.error('Erro:', error));
});