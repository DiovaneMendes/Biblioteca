class AutorView {
    constructor(selForm, selBox, selInformacao){
        this.seletorFormulario = selForm;
        this.seletorBox = selBox;
        this.seletorInformacao = selInformacao;
    }

    montaBoxs(autores){
        var box = document.querySelector(this.seletorBox);
        box.innerHTML = this.templateBoxs(autores);
    }

    informacaoAutor(autor){
        var informacao = document.querySelector(this.seletorInformacao);
        informacao.innerHTML = this.templateInformacao(autor);
    }

    templateBoxs(autores){
        return  `<div class="columns is-multiline is-lefty">
                    ${autores.map(autor =>
                        `<div class="column is-3">
                            <div class="box">
                                <ul>
                                    <label class="tag is-success is-info is-large"> ${autor.nome} </label>
                                </ul>
                                <hr>
                                <form id="verInformacao" action="/HTML/autor/informacoes.html">
                                    <input class="id_autor" value="${autor.id_autor}" type="hidden">
                                    <input class="txtnome" value="${autor.nome}" type="hidden">
                                    <input class="txtpais" value="${autor.pais}" type="hidden">
                                    <div class="field has-addons">
                                        <div class="control">
                                            <button type="submit" class="button is-info borda-arredondada"> Ver Informações </button>
                                        </div>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    `).join('')}                    
                </div>`
    }

    templateInformacao(autor){
        return `<table>
                    <tr>
                        <th>Nome</th>
                        <th>País</th>
                    </tr>
                    <tr>                        
                        <td>${autor.nome}</td>
                        <td>${autor.pais}</td>
                    </tr>
                </table>`
    }
}