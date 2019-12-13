function validar(){
    //alert("working!");
    var formulario = document.addForm;
    /*
    if(formulario.name.value.length == 0){
        document.getElementById('alertName').innerHTML = '<div class="invalid-feedback">The name can not are null</div> ';
        formulario.name.focus();
        return false;
    }else{
        document.getElementById('alert').innerHTML = "";
    }

    if(formulario.lastname.value.length == 0){
        document.getElementById('alert').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">The Lastname can not are null<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> ';
        formulario.lastname.focus();
        return false;
    }else{
        document.getElementById('alert').innerHTML = "";
    }

    if(formulario.user.value.length == 0){
        document.getElementById('alert').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">The Username can not are null<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> ';
        formulario.user.focus();
        return false;
    }else{
        document.getElementById('alert').innerHTML = "";
    }

    if(formulario.email.value.length == 0){
        document.getElementById('alert').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">The email can not are null<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> ';
        formulario.email.focus();
        return false;
    }else{
        document.getElementById('alert').innerHTML = "";
    }
 */
formulario.password.addEventListener("keyup", function()
{   
    
    intervalo = setInterval(function(){ //Y vuelve a iniciar
        alert ("Has dejado de escribir"); //Cumplido el tiempo, se muestra el mensaje
        clearInterval(intervalo); //Limpio el intervalo
    }, 1500);
}, false);

clearInterval(intervalo); //Al escribir, limpio el intervalo

    
   // formulario.submit();
}


 function soloLetras(e){
     key = e.keyCode || e.which;
     teclado = String.fromCharCode(key).toLowerCase();
     letras="_abcdefghijklmnoprstuvwxyz1234567890";
     especiales ="8-37-38-95";
     teclado_especial = false;

     for(var i in especiales){
         if(key==especiales[i]){
             teclado_especial = true;
             break;
         }

         if(letras.indexOf(teclado)==-1 && !teclado_especial){
            return false;
         }
     }
 }

 function soloLetras2(e){
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras="abcdefghijklmnñoprstuvwxyz";
    especiales ="8-37-38-95";
    teclado_especial = false;

    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial = true;
            break;
        }

        if(letras.indexOf(teclado)==-1 && !teclado_especial){
           return false;
        }
    }
}

function soloLetras3(e){
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras="@.abcdefghijklmnñoprstuvwxyz1234567890_-";
    especiales ="8-37-38-95";
    teclado_especial = false;

    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial = true;
            break;
        }

        if(letras.indexOf(teclado)==-1 && !teclado_especial){
           return false;
        }
    }
}