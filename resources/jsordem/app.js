document.getElementById("search_field").addEventListener("input", function(){
    // código para fazer a solicitação à API aqui
    fetch(`http://10.15.32.11:8000/cliente/00/empty`)
    .then(response => response.json())
    .then(data => {
        document.getElementById("select_id").innerHTML = '';

        // iterar sobre os dados retornados pela API
        data.forEach(item => {
            // criar uma nova opção
            let option = document.createElement("option");
            // definir o valor e o texto da opção
            option.value = item.codclient;
            option.text = item.nome;
            // adicionar a opção ao select
            document.getElementById("select_id").appendChild(option);
        });
    });
});