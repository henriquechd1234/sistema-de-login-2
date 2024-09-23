document.getElementById('man').addEventListener('click', function (event) {event.preventDefault();

    const formdata = new FormData();
    
    formdata.append('avaliacao',document.getElementById('avaliacao').value);

    fetch ('outracoisa.php', {
        method: 'POST',
        body: formdata
   })

    .then(response => response.text())
    .then(data => alert(data))
   .catch(error => console.error('Erro:', error));

});