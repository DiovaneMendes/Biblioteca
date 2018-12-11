class AutorController{
    constructor(){
        this.service = new AutorHTTPService();
        this.boxsAutores = new AutorListaView(this, "main"); 
        this.formAutor = new AutorCadastroView(this, "main");       
    }

    carregaFormulario(event){
        event.preventDefault();
        console.log(JSON.stringify(event));
        this.formAutor.montarForm();              
    }

    carregaFormularioComAutor(id, event){
        event.preventDefault();             
        
        const self = this;
        const ok = function(autor){
            self.formAutor.montarForm(autor);
        }
        const erro = function(status){
            console.log(status);
        }

        this.service.buscarAutor(id, ok, erro);   
    }

    salvarAutor(event){
        event.preventDefault();
    
        var autor = this.formAutor.getDataAutor();
        
        const self = this;

        this.service.enviarAutor(autor, function (){
                self.formAutor.limparFormulario();
                self.carregarAutores();
            },
            function (status){
                console.log(status)
            }
        );
    }

    editarAutor(id, event){
        event.preventDefault();
    
        var autores = this.formAutor.getDataAutor();
        
        const self = this;

        this.service.atualizarAutores(id, autores, 
            () => {
                self.formAutor.limparFormulario();
                self.carregarAutores();
            },
            (status) => console.log(status)
        );
    }

    carregarAutores(event){   
        const self = this;
        const ok = function(listaAutores){
            self.boxsAutores.montarBoxs(listaAutores);              
        }
        const erro = function(status){
            console.log(status);
        }

        this.service.carregarAutores(ok, erro);
    }

    excluirAutor(id, event){
        event.preventDefault();
            
        const self = this;

        this.service.excluirAutor(id, 
            () => {
                self.carregarAutores();
            },
            (status) => console.log(status)
        );
    }
}