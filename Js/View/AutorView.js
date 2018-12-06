class AutorView {
    constructor(selForm, selTabela){
        this.seletorFormulario = selForm;
        this.seletorTabela = selTabela;
    }

    montaTabela(){
        var tabela = document.querySelector(this.seletorTabela);
        tabela.innerHTML = this.templateTabela(autores);
    }

    templateTabela(autores){
        return `<tr>
                    <td>Nome</td>
                    <td>País</td>
                </tr>
                <tr>
                    ${autores.map(autor =>
                        `<td>${autor.nome}</td>
                         <td>${autor.pais}</td>                   
                    `).join('')}
                </tr>`
    }
}