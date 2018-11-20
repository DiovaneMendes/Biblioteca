class AutorController{
    constructor () {

    }

    salvarAutor = (event) => {
        event.preventDefault();
        let autor = new Autor();
        autor.nome = document.querySelector("#txtnome").value;
        autor.pais = document.querySelector("#txtpais").value;
    
        enviarAutor(autor);
    }

    enviarAutor = (autor) =>{
        $.post("http://localhost:8080/autores",
        (jsonObject) => {
            limparFormulario();
        });
    }

    limparFormulario = () => {
        autor.nome = document.querySelector("#txtnome").value="";
        autor.pais = document.querySelector("#txtpais").value="";
    }
}