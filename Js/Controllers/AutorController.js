class AutorController{
    constructor(){
        this.service = new AutorHTTPService();
        this.view = new AutorView("#form", "#tabela", "#id");
    }

    salvarAutor(event){
        event.preventDefault();
        const self = this;

        const autor = new Autor();
        autor.nome = document.querySelector("#txtnome").value;
        autor.pais = document.querySelector("#txtpais").value;
    
        const ok = function(){
            self.limparFormulario();
            self.carregarAutores();
        }

        const erro = function(status){
            console.log("Error: " + status);
        }

        this.service.enviarAutor(autor, ok, erro);
    }

    limparFormulario(){
        document.querySelector("#txtnome").value="";
        document.querySelector("#txtpais").value="";
    }

    carregarAutores(event){
        const self = this;
        const ok = function(autores){
            console.log("Carrega Tabela");
            self.view.montaTabela(autores);
        }

        const erro = function(status){
            console.log("Error: " + status);            
        }
        
        this.service.carregarAutores(ok, erro);
    }

    deletarAutor(event){
        event.preventDefault();
        const self = this;

        let id = document.querySelector("#delete").value;
    
        const ok = function(){
            self.carregarAutores();
        }

        const erro = function(status){
            console.log("Error: " + status);
        }

        this.service.deletarAutor(id, ok, erro);
    }

    carregarAutor(event){
        let id = document.querySelector("#id").value;
        const self = this;
        const ok = function(autor){
            console.log("Carrega Informação");
            self.view.informacaoAutor(autor);
        }

        const erro = function(status){
            console.log("Error: " + status);            
        }
        
        this.service.carregarAutor(id, ok, erro);
    }
}