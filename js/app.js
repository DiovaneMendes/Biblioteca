let autorController = new AutorController();

window.addEventListener("load",autorController.carregarAutores.bind(autorController));

document.querySelector("#formulario").addEventListener("submit", autorController.salvarAutor.bind(autorController));

