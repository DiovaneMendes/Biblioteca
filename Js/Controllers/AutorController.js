class AutorController{
    constructor(){
        this.service = new AutorHTTPService();
        this.view = new AutorView("#form, #tabela");
    }

    salvarAutor(event){
        event.preventDefault();
        const self = this;

        let autor = new Autor();
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
}