class AutorListaView{
    constructor(controller, seletor){
        this.controller = controller;
        this.boxsAutores = document.querySelector(seletor); 
    }

    montarBoxs(autores){
        var html = 
        `<div class="altura center has-text-centered">
            <a href="/HTML/autor/cadastro.html"> Voltar para o cadastro</a>        
            <h1 class="title is-4 v center has-text-centered"> Autores </h1>
        </div>
        
        <div class="container">
            <div class="section">            
                <div class="columns is-multiline is-lefty">
                    ${autores.map(autor =>
                        `<div class="column is-4">
                            <div id="${autor.id_autor}" class="box">
                                <ul>
                                    <label class="tag is-success is-info is-large"> ${autor.nome} </label>
                                </ul>
                                <hr>
                                <input class="idAutor" value="${autor.id_autor}" type="hidden">
                                <input class="nomeAutor" value="${autor.nome}" type="hidden">
                                <input class="pais" value="${autor.pais}" type="hidden">
                                <div class="field has-addons">
                                    <div class="control">
                                        <button type="submit" class="editar button is-info borda-arredondada"> Editar </button>
                                    </div>
                                </div> 
                                <div class="field has-addons">
                                    <div class="control">
                                        <button type="submit" class="excluir button is-info borda-arredondada"> Excluir </button>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    `).join('')}                    
                </div>
            </div>
        </div>`

        this.boxsAutores.innerHTML = html;

        const linksEditar = document.querySelectorAll(".editar");
        for(var linkEditar of linksEditar){
            const id = linkEditar.parentNode.parentNode.parentNode.id;
            console.log('A: '+id);
            
            linkEditar.addEventListener("click", this.controller.carregaFormularioComAutor.bind(this.controller, id));
        }

        const linksExcluir = document.querySelectorAll(".excluir");
        for(var linkExcluir of linksExcluir){
            const id = linkExcluir.parentNode.parentNode.parentNode.id;
            linkExcluir.addEventListener("click", this.controller.excluirAutor.bind(this.controller, id));
        }
    }
}