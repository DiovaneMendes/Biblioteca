
$(document).ready(() => {
    loadJson();    
});

let loadJson = () => {
    $.get("http://localhost:8080/autores",
        (jsonObject) => {
            trataJson(jsonObject);
        }
    );
}

const trataJson = (jsonObject) => {
    $("main").empty();
    let tituloH1 = $("<h1>Informações</h1>");
    let table = $("<table></table>");
    let trCabecalho = $("<tr></tr>");
    let thId = $("<th> Id </th>");
    let thNome = $("<th> Nome </th>");
    let thPais = $("<th> País </th>");
    trCabecalho.append(thId, thNome, thPais);
    table.append(trCabecalho);

    for(let indice in jsonObject){
        
        let trCorpo = $("<tr></tr>");
        let tdId = $("<td></td>");
        let tdNome = $("<td></td>");
        let tdPais = $("<td></td>");

        tdId.append(jsonObject[indice].id_autor);
        tdNome.append(jsonObject[indice].nome);
        tdPais.append(jsonObject[indice].pais);

        trCorpo.append(tdId, tdNome, tdPais);
        table.append(trCorpo);

        $("main").append(tituloH1, table);
    }
}