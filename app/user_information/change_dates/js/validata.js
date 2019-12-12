function validar(){
    //alert("working!");
    var formulario = document.addForm;

    if(formulario.name.value.length == 0){
        document.getElementById('alert').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">The name can not are null<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> ';
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


    if(formulario.password.value.length == 0|| formulario.repeat_password.value.length == 0){
        document.getElementById('alert').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">The passwords can not are null<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> ';
        return false;
    }else{

        if(formulario.password.value != formulario.repeat_password.value){
            document.getElementById('alert').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">The Passwords do not match <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> ';
            formulario.repeat_password.focus();
            return false;
        }else{
            document.getElementById('alert').innerHTML = "";
    
    }
    }
    
    formulario.submit();
}
/*
var name, lastname, user, email, password, repeat_password;
name = document.getElementById('firstName');
lastname = document.getElementById('lastName');
user = document.getElementById('username');
email = document.getElementById('email');
password = document.getElementById('password');
repeat_password = document.getElementById('repeat_password');




*/