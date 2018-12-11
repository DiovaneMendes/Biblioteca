class AutorCadastroView {
    constructor(controller, seletor){
        this.controller = controller;
        this.formAutor = document.querySelector(seletor);
    }

    montarForm(autor){
        if(!autor){
            autor = new Autor();
        }

        var str = `
        <div class="altura">
            <h1 class="title is-4 v center has-text-centered"> Cadastro Autor </h1>
        </div> 
        <div class="container">                
            <div class="columns is-mobile card-content">
                <form>
                    <div class="column">
                        <div class="field">
                            <div class="control">
                                <input id="idAutor" type="hidden" value="${autor.id_autor}"/>
                                <span for="nomeAutor">Nome:</span>
                                <input id="nomeAutor" class="input input-fancy" type="text" value="${autor.nome ? autor.nome : ''}"/>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field">
                            <div class="control">
                                <span for="pais">País:</span>
                                <input id="pais" class="input input-fancy" type="text" value="${autor.pais ? autor.pais : ''}"/>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field">
                            <div class="control">
                                <div class="center has-text-centered">
                                    <button type="submit" class="button" value="Salvar">
                                            <span>Salvar</span>                        
                                    </button>
                                    <button id="botaoCancelar" type="button" class="button" value="Cancelar">
                                            <span>Cancelar</span>                        
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
        </div>`;
        
        this.formAutor.innerHTML = str;

        var elementoForm = document.querySelector("form");
        if(!autor.id_autor){
            elementoForm.addEventListener("submit", this.controller.salvarAutor.bind(this.controller));
        }
        else {
            elementoForm.addEventListener("submit", this.controller.editarAutor.bind(this.controller, autor.id_autor));
        }

        const botaoCancelar = document.querySelector("#botaoCancelar");
        botaoCancelar.addEventListener("click", this.controller.carregarAutores.bind(this.controller));
    }

    limparFormulario(){
        document.querySelector("#idAutor").value="";
        document.querySelector("#nomeAutor").value="";
        document.querySelector("#pais").value="";
    }

    getDataAutor(){
        var autor = new Autor();
        if(document.querySelector("#idAutor").value !== null){
            autor.id = document.querySelector("#idAutor").value;
            autor.nome = document.querySelector("#nomeAutor").value;
            autor.pais = document.querySelector("#pais").value;
        }
        return autor;        
    }
}