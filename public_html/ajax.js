function muestra_oculta(id){
    if (document.getElementById){ //se obtiene el id
        var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
        el.style.display = (el.style.display == 'block') ? 'none' : 'block  '; //damos un atributo display:none que oculta el div
    }
}
    
window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
    muestra_oculta('cont_noti');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
}

window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
    muestra_oculta('cont_prop');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
}

window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
    muestra_oculta('contenido');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
}

function muestra_oculto(id1,id2,id3){
    
    
    if (document.getElementById){ //se obtiene el id
        var el = document.getElementById(id1); //se define la variable "el" igual a nuestro div
        el.style.display = (el.style.display == 'block') ? 'block' : 'block'; //damos un atributo display:block que muestra el div
           
    }
    if (document.getElementById){ //se obtiene el id
        var el2 = document.getElementById(id2); //se define la variable "el" igual a nuestro div
        el2.style.display = (el2.style.display == 'none') ? 'none' : 'none'; //damos un atributo display:none que oculta el div
        
    }
    if (document.getElementById){ //se obtiene el id
        var el3 = document.getElementById(id3); //se define la variable "el" igual a nuestro div
        el3.style.display = (el3.style.display == 'none') ? 'none' : 'none'; //damos un atributo display:none que oculta el div
        
    }
}

window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
    muestra_oculto(id1,id2,id3);/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
}

function muestra_oculte(id){
    if (document.getElementById){ //se obtiene el id
        var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
        el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
    }
}


window.onload = function(){ //hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
    muestra_oculte('ventana');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
}

function muestra_btn(id){
    if (document.getElementById){ //se obtiene el id
        var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
        el.style.display = (el.style.display == 'block') ? 'block' : 'block'; //damos un atributo display:none que oculta el div
    }
}

//SIN FUNCIONAMIENTO
var emailInput = document.getElementById('password');

function disable_form(id){
    
    // evento para el input radio del "no"  
    //document.getElementById("idInputEnElDom").disabled = false; // habilitar
    document.getElementById('resetSubmit').addEventListener('click', function(e) {
        print("durante");
        console.log('Vamos a deshabilitar el form');
        emailInput.disabled = true;
    });

}


var clipboard = new Clipboard('.btn');

//var codigoACopiar = document.getElementById('TextoACopiar');
//navigator.clipboard.writeText(codigoACopiar.innerHTML)

function copyToClickBoard(id){
    var content = document.getElementById('textArea').innerHTML;

    navigator.clipboard.writeText(content)
        .then(() => {
        console.log("Texto copiado.")
    })
        .catch(err => {
        console.log('No copiado, algo salió mal.', err);
    })

    if (document.getElementById){ //se obtiene el id
        var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
        el.style.display = (el.style.display == 'block') ? 'block' : 'block'; //damos un atributo display:none que oculta el div
    }
 
}

function comprado(){
    window.location.replace('index.php');  
    
}