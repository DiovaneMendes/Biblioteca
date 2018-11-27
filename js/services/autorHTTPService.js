class AutorHTTPService{
    constructor(){

    }

    enviarAutor(autor){
        const self = this;
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = () => {
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

    carregarAutores(){
        const self = this;
        console.log("Hello World!");
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = () => {
            if (this.readyState === 4 && this.status === 200) {
                self.montarTabela(JSON.parse(this.responseText));
            }
        };
        xhttp.open("GET", "http://localhost:8080/autores", true);
        xhttp.send();
    }
}