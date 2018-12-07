class AutorView {
    constructor(selForm, selTabela){
        this.seletorFormulario = selForm;
        this.seletorTabela = selTabela;
    }

    montaTabela(autores){
        var tabela = document.querySelector(this.seletorTabela);
        tabela.innerHTML = this.templateTabela(autores);
    }

    templateTabela(autores){
        return `<table>
                    <tr>
                        <th>Nome</th>
                        <th>País</th>
                    </tr>
                    ${autores.map(autor =>
                        `<tr>                        
                            <td>${autor.nome}</td>
                            <td>${autor.pais}</td> 
                        </tr>
                    `).join('')}
                </table>`
    }
}