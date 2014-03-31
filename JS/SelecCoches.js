window.addEventListener("load", iniciar, false);

var coches = [];
function iniciar() {
    //Hyundai
    coches[0] = ["i30", "ix35"];
    //Opel
    coches[1] = ["Astra", "Ampera"];
    //Renault
    coches[2] = ["Megane", "Captur"];
    //Audi
    coches[3] = ["R8", "A3"];
    //Fiat
    coches[4] = ["Punto", "Freemont"];
	
    document.getElementById("marca").addEventListener("change", actualizarCoches, false);
}

function actualizarCoches() {
    var aux = document.getElementById("marca").selectedIndex;
    document.getElementById("modelo").options.length = 0;
    for (i = 0; i < 2; i++) {
        document.getElementById("modelo").options[i] = new Option(coches[aux][i], coches[aux][i]);
    }
}
