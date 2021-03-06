function trim(value) {
    var temp = value;
    var obj = /^(\s*)([\W\w]*)(\b\s*$)/;
    if (obj.test(temp)) {
        temp = temp.replace(obj, '$2');
    }
    var obj = /  /g;
    while (temp.match(obj)) {
        temp = temp.replace(obj, " ");
    }
    return temp;
}

//Funcion para calcular el largo en pixels det texto dado
function getTextWidth(texto) {
    //Valor por default : 150 pixels
    var ancho = 150;

    if (trim(texto) == "") {
        return ancho;
    }


    //Creaci�n de un span escondido que se puedr� medir
    var span = document.createElement("span");
    span.style.visibility = "hidden";
    span.style.position = "absolute";

    //Se agrega el texto al span y el span a la p�gina
    span.appendChild(document.createTextNode(texto));
    document.getElementsByTagName("body")[0].appendChild(span);

    //tama�o del texto
    ancho = span.offsetWidth;

    //Eliminaci�n del span
    document.getElementsByTagName("body")[0].removeChild(span);
    span = null;


    return ancho;
}


//Funcion de modificacion del elemento seleccionado mediante doble-click

function modificar(obj) {
    //Objeto que sirve para editar el valor en la pagina
    var input = null;

    input = document.createElement("input");


    //Asignar en la caja el valor de la casilla
    if (obj.innerText)
        input.value = obj.innerText;
    else
        input.value = obj.textContent;
    input.value = trim(input.value);

    //a la caja INPUT se la asigna un tama�o un poco mayor que el texto a modificar
    input.style.width = getTextWidth(input.value) + 30 + "px";

    //Se remplaza el texto por el objeto INPUT
    obj.replaceChild(input, obj.firstChild);

    //Se selecciona el elemento y el texto a modificar
    input.focus();
    input.select();

    //Asignaci�n de los 2 eventos que provocar�n la escritura en la base de datos

    //Salida de la INPUT
    input.onblur = function salir() {
        salvarMod(obj, input.value);
        delete input;
    };

    //La tecla Enter
    input.onkeydown = function keyDown(event) {
        if (event.keyCode == 13) {
            salvarMod(obj, input.value);
            delete input;
        }
    };

}


//Salvando las modificaciones
function salvarMod(obj, valor) {
    obj.replaceChild(document.createTextNode(valor), obj.firstChild);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'updateTable.php', true);
    var data = new FormData();
    var idData = obj.id.split("-");
    console.log(idData);
    data.append("id", idData[1]);
    data.append("column", idData[0]);
    data.append("valor", valor);
    xhr.send(data);

}


function getRequestObject() {
    if (window.ActiveXObject) {
        return (new ActiveXObject("Microsoft.XMLHTTP"));
        console.log("Microsoft");
    } else if (window.XMLHttpRequest) {
        console.log("XMLHttpRequest");
        return (new XMLHttpRequest());
    } else {
        console.log("null");
        return (null);
    }
}

function handleResponse(request) {
    if ((request.readyState == 4) &&
        (request.status == 200)) {
        console.log(request.response);
    } else {
        console.log("request not ready " + request.readyState + " " + request.status);
    }
}


function addRow() {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange =
        function () {
            /* 0: Request to server hasn't started
             * 1: Connected to the Server
             * 2: Server has received our request
             * 3: Server Processing
             * 4: Request is finished and data is ready
             */
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //hacer update
                console.log("ready" + xmlhttp.readyState + " " + xmlhttp.status);
                var request;
                request = getRequestObject();
                request.onreadystatechange = //handleResponse(request);
                    function () {
                        if ((request.readyState == 4) &&
                            (request.status == 200)) {
                            console.log(request.response);
                            //document.getElementById('#tabla-usuarios').appendChild(request.response)
                            //$('#tabla-usuarios > tbody:last-child').append(request.response);
                            addRowToTable(request.response);
                        } else {
                            console.log("request not ready " + request.readyState + " " + request.status);
                        }
                    };
                request.open("GET", "getLast.php", true);
                request.send(null);
            }
            else {
                //document.getElementById('scores').innerHTML = "<strong>Waiting for Server Response... </strong>";
                console.log("not ready " + xmlhttp.readyState + " " + xmlhttp.status);
            }
        };

    xmlhttp.open("POST", 'agregar.php', true);
    xmlhttp.send();
}

function addRowToTable(data) {
    var table = document.getElementById("tabla-usuarios");
    var row = table.insertRow(-1);
    var dataarray = data.split("//");

    var datarow = dataarray[0].split(",");
    var cell = row.insertCell(0);

    cell.setAttribute("id", datarow[0]);
    cell.setAttribute("class", "celda");
    cell.setAttribute("ondblclick", "modificar(this)");
    cell.innerHTML = datarow[1];

    for (var i = 1; i < dataarray.length - 1; i++) {
        var datarow = dataarray[i].split(",");
        var cell = row.insertCell(i);
        cell.setAttribute("id", datarow[0]);
        cell.setAttribute("class", "celda");
        cell.setAttribute("ondblclick", "modificar(this)");
        cell.innerHTML = datarow[1];
    }

    cell = row.insertCell(7);
    cell.setAttribute("class", "celda");
    cell.innerHTML = "<button name=\"borrar\" value=\"" + dataarray[7] + "\" onclick=\"deleteRow(this)\" >Borrar fila</button>";
}


function deleteRow(x) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", 'eliminar.php', true);
    var data = new FormData();
    data.append("id", x.value);
    xmlhttp.send(data);
    document.getElementById("tabla-usuarios").deleteRow(x.parentNode.parentNode.rowIndex);
}