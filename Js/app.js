var autorController = new AutorController();

window.addEventListener("load", autorController.carregaFormulario.bind(autorController));

// window.addEventListener("load", autorController.carregarAutores.bind(autorController));

// window.addEventListener("load",autorController.carregarAutor.bind(autorController));

document.querySelector("formulario").addEventListener("submit", autorController.salvarAutor.bind(autorController));

// document.querySelector("#verInformacao").addEventListener("submit", autorController.carregarAutor.bind(autorController));

// document.querySelector("#informacao").addEventListener("submit", autorController.carregarAutor.bind(autorController));

