let autorController = new AutorController();

document.querySelector("body").onload(autorController.carregarAutores());

document.querySelector("#formulario").addEventListener("submit", autorController.salvarAutor.bind(autorController));

