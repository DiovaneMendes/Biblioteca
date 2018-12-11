class AutorController{
    constructor(){
        this.service = new AutorHTTPService();
        this.formAutor = new AutorCadastroView(this, "main"); 
        this.boxsAutores = new AutorListaView(this, "main");
        this.editaAutor = new AutorEditaView(this, "main");                
    }

    carregaFormulario(event){
        event.preventDefault();
        this.formAutor.montarForm();
    }

    carregaFormularioComAutor(id, event){
        event.preventDefault();            
        
        const self = this;

        this.service.carregarAutor(id,
            function (autor){
                self.editaAutor.montarEditar(autor);        
                location.href = "/HTML/autor/edita.html"; 
            },
            function(status){
                console.log(status);
            }  
        ); 
    }

    salvarAutor(event){
        event.preventDefault();
    
        var autor = this.formAutor.getDataAutor();
        
        const self = this;

        this.service.enviarAutor(autor,
            function (){
                self.formAutor.limparFormulario();
                location.href = "/HTML/autor/listaAutores.html";
            },
            function (status){
                console.log(status)
            }
        );
    }

    editarAutor(id, event){
        event.preventDefault();
    
        var autor = this.editaAutor.getDataAutor();
        
        const self = this;

        this.service.atualizarAutor(id, autor, 
            function(){
                self.formAutor.limparFormulario();
                location.href = "/HTML/autor/listaAutores.html";
            },
            function(status){
                console.log(status)
            }
        );
    }

    carregarAutores(event){   
        const self = this;
        this.service.carregarAutores(function(listaAutores){
                self.boxsAutores.montarBoxs(listaAutores);              
            },
            function(status){
                console.log(status);
            }
        );
    }

    excluirAutor(id, event){
        event.preventDefault();
            
        const self = this;

        this.service.excluirAutor(id, 
            function (){
                self.carregarAutores();
            },
            function(status){
                console.log(status)
            }
        );
    }
}