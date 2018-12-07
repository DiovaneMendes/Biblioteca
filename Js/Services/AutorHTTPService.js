class AutorHTTPService{
    constructor(){
        this.uri = "http://localhost:8080/autores";
    }

    enviarAutor(autor, ok, error){
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 201) {
                ok();
            }
            else if(this.status !== 201){
                error(this.status);
            }
        };

        xhttp.open("POST", this.uri, true);
        xhttp.setRequestHeader("Content-Type","application/json");
        xhttp.send(JSON.stringify(autor));
    }

    carregarAutores(ok, error){
        console.log("Hello World!");
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                ok(JSON.parse(this.responseText));
            }
            else if(this.status !== 200){
                error(this.status);
            }
        };
        xhttp.open("GET", this.uri, true);
        xhttp.send();
    }

    deletarAutor(id, ok, error){
        console.log("Deletado!");
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                ok(JSON.parse(this.responseText));
            }
            else if(this.status !== 200){
                error(this.status);
            }
        };

        console.log(this.uri+id);

        xhttp.open("DELETE", this.uri+id, true);
        xhttp.send();
    }

    carregarAutor(id, ok, error){
        console.log("Hello World!");
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                ok(JSON.parse(this.responseText));
            }
            else if(this.status !== 200){
                error(this.status);
            }
        };
        xhttp.open("GET", this.uri+"/"+id, true);
        xhttp.send();
    }
}