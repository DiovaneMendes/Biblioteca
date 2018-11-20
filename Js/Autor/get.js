$(document).ready(() => {
    setInterval(loadJson,5000);    
});

let loadJson = () => {
    $.get("http://localhost:8080/autores",
        (jsonObject) => {
            trataJson(jsonObject);
        }
    );
}

let trataJson = (jsonObject) => {
    $("main").empty();
    for(let indice in jsonObject){
        
        let table = $("<table></table>");
        if(indice %3 == 1){
            table.addClass("central");
        }

        let trCabecalho = $("<tr></tr>");
        let thId = $("<th> Id </th>");
        let thNome = $("<th> Nome </th>");
        let thPais = $("<th> País </th>");
        trCabecalho.append(thId, thNome, thPais);
        table.append(trCabecalho);


        let trCorpo = $("<tr></tr>");
        let tdId = $("<td></td>");
        let tdNome = $("<td></td>");
        let tdPais = $("<td></td>");

        tdId.append(jsonObject[indice].id_autor);
        tdNome.append(jsonObject[indice].nome);
        tdPais.append(jsonObject[indice].pais);

        trCorpo.append(tdId, tdNome, tdPais);
        table.append(trCorpo);

        $("main").append(table);
    }
}