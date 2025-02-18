function addEvent(obj, evType, fn){
    if(obj.addEventListener){
        obj.addEventListener(evType, fn, false);
        return true;
    }
    else if (obj.attachEvent){
        var r = obj.attachEvent("on"+evType, fn);
        return r;
    }
    else{
        return false;
    }
}

function initForms(){
    document.getElementById("agregar").onclick = function(){
        addProducts(document.frmedades.ingresados, document.frmedades.edad.value);
    }
    document.getElementById("enviar").onclick = function(){
        var contador = 0;
        for(var i=0; i<document.frmedades.ingresados.options.length; i++){
            if(document.frmedades.ingresados.options[i].selected){
                contador++;
            }
        }
        if(contador == 0){
            alert("No se han seleccionado elementos.");
            return false;                                                   
        }
    }
}

function addProducts(optionMenu, value){
   var posicion = optionMenu.length;
   optionMenu[posicion] = new Option(value, value);
}

addEvent(window, 'load', initForms);