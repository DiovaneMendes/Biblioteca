class AutorController{
    constructor(){
        //this.service = new autorHTTPService();
    }

    salvarAutor(event){
        event.preventDefault();
        let autor = new Autor();
        autor.nome = document.querySelector("#txtnome").value;
        autor.pais = document.querySelector("#txtpais").value;
    
        this.enviarAutor(autor);
    }

    enviarAutor(autor){
        const self = this;
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 201) {
                console.log("Response recebido!");
                self.limparFormulario();
                self.carregarAutores();
            }
        };
        xhttp.open("POST", "http://localhost:8080/autores", true);
        xhttp.setRequestHeader("Content-Type","application/json");
        xhttp.send(JSON.stringify(autor));
    }
    // enviarAutor(){

    // }


    limparFormulario(){
        document.querySelector("#txtnome").value="";
        document.querySelector("#txtpais").value="";
    }

    carregarAutores(event){
        const self = this;
        console.log("Hello World!");
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                self.montarTabela(JSON.parse(this.responseText));
            }
        };
        xhttp.open("GET", "http://localhost:8080/autores", true);
        xhttp.send();
    }
    // carregaAutores(){

    // }

    montarTabela(autores){
        let table="";
        table+= "<table>";
        table+= "<tr>";
        table+= "<th>Nome</th>";
        table+= "<th>País</th>";
        table+= "</tr>";
    
        for(let i in autores){
            table+="<tr>";
            table+="<td>"+autores[i].nome+"</td>";
            table+="<td>"+autores[i].pais+"</td>";
            table+="</tr>";
        } 
        table+= "</table>";
    
        let tabela = document.querySelector("#tabela");
        tabela.innerHTML = table;
    }  
}