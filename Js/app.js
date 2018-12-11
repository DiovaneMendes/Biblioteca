var autorController = new AutorController();

if(window.location.href === "http://localhost:8080/HTML/autor/cadastro.html"){
    window.addEventListener("load", autorController.carregaFormulario.bind(autorController));
}

if(window.location.href === "http://localhost:8080/HTML/autor/listaAutores.html"){
    window.addEventListener("load",autorController.carregarAutores.bind(autorController));
}

if(window.location.href === "http://localhost:8080/HTML/autor/edita.html"){
    window.addEventListener("load",autorController.carregaFormularioComAutor.bind(autorController));
}