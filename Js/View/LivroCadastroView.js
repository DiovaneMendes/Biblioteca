class LivroCadastroView {
    constructor(controller, seletor, autores){
        this.controller = controller;
        this.formLivro = document.querySelector(seletor);
        this.autores = new AutorHTTPService();
    }

    montarForm(livro){
        if(!livro){
            livro = new Livro();
        }

        var listaAutores = this.autores.carregarAutores.bind(new AutorController());
        var html = `
        <div class="altura">
            <h1 class="title is-4 v center has-text-centered"> Cadastro de Livro </h1>
        </div> 
        <div class="container">                
            <div class="columns is-mobile card-content">
                <form>
                    <div class="column">
                        <div class="field">
                            <div class="control">
                                <input id="idLivro" type="hidden" value="${livro.id_livro}"/>
                                <span for="isbn">ISBN:</span>
                                <input id="isbn" class="input input-fancy" type="text" value="${livro.isbn ? livro.isbn : ''}"/>                            
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field">
                            <div class="control">
                                <span for="nomelivro">Nome:</span>
                                <input id="nomelivro" class="input input-fancy" type="text" value="${livro.nome ? livro.nome : ''}"/>
                            </div>
                        </div>
                    </div>



                    <div class="column">
                        <div class="field">
                            <div class="control">
                                <div class="select">
                                    <select name="autores" id="select">
                                        <option disabled selected value="selecione">Selecione um autor</option>
                                        ${listaAutores.map(autor =>
                                            `<option id="${autor.id_autor}" value="${autor.nome}" text="${autor.nome}"></option>
                                        `).join('')}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="column">
                        <div class="field">
                            <div class="control">
                                <span for="editora">Editora:</span>
                                <input id="editora" class="input input-fancy" type="text" value="${livro.editora ? livro.editora : ''}"/>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field">
                            <div class="control">
                                <span for="ano">Ano:</span>
                                <input id="ano" class="input input-fancy" type="text" value="${livro.ano ? livro.ano : ''}"/>
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
                                    <button id="botaoCancelar" type="button" class="button" value="Cancelar" onClick="location.href='/HTML/autor/listaAutores.html'">
                                            <span>Cancelar</span>                        
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
        </div>`;

        this.formLivro.innerHTML = html;        

        var elementoForm = document.querySelector("form");
        if(!livro.id_autor){
            elementoForm.addEventListener("submit", this.controller.salvarlivro.bind(this.controller));
        }
    }

    limparFormulario(){
        document.querySelector("#idLivro").value="";
        document.querySelector("#isbn").value="";
        document.querySelector("#nome").value="";
        document.querySelector("#idAutor").value="";
        document.querySelector("#editora").value="";
        document.querySelector("#ano").value="";
    }

    getDataLivro(){
        var livro = new Livro();
        if(document.querySelector("#idLivro").value !== null){
           livro.id_livro = document.querySelector("#idLivro").value;
           livro.isbn = document.querySelector("#isbn").value;
           livro.nome = document.querySelector("#nome").value;
           livro.autor = document.querySelector("#idAutor").value;
           livro.editora = document.querySelector("#editora").value;
           livro.ano = document.querySelector("#ano").value;
        }
        return livro;        
    }
}