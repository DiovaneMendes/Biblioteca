class AutorView {
    constructor(selForm, selTabela, selInformacao){
        this.seletorFormulario = selForm;
        this.seletorTabela = selTabela;
        this.seletorInformacao = selInformacao;
    }

    montaTabela(autores){
        var tabela = document.querySelector(this.seletorTabela);
        tabela.innerHTML = this.templateTabela(autores);
    }

    informacaoAutor(autor){
        var informacao = document.querySelector(this.selInformacao);
        informacao.innerHTML = this.templateInformacao(autor);
    }

    templateTabela(autores){
        return `<table>
                    <tr>
                        <th>Nome</th>
                        <th>País</th>
                        <th>Ver informações</th>
                        <th></th>
                    </tr>
                    ${autores.map(autor =>
                        `<tr>                        
                            <td>${autor.nome}</td>
                            <td>${autor.pais}</td>
                            <td>
                                <a href="/HTML/autor/informacoes.html">
                                    <button id="/autores/${autor.id_autor}" type="submit">
                                        Ver
                                    </button>
                                </a>
                            </td>
                        </tr>
                    `).join('')}
                </table>`
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