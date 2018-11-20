let form = document.querySelector("#formulario");

form.onsubmit = (event) => {
    event.preventDefault();

    let autor = {};
    autor.nome = document.querySelector("txtnome").value;
    autor.pais = document.querySelector("txtpais").value;

    enviarAutor(autor);
}

let enviarAutor = (autor) => {
    $.post("http://localhost:8080/autores",
        (jsonObject) => {
            limparFormulario();
            window.loadJson();
        }
    );
}

let limparFormulario = () => {
    autor.nome = document.querySelector("txtnome").value = "";
    autor.pais = document.querySelector("txtpais").value = "";
}