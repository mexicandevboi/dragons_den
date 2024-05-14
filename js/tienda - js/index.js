function menuVer() {
    var x = document.getElementById("Links2");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function inicioS() {
    var user = document.getElementById("username");
    var password = document.getElementById("password");
    var x = document.getElementById("main");
    var y = document.getElementById("body");
    var cont = document.getElementById("contenido");
    if (user.value == 'username' && password.value == 'password') {  
        x.style.background =  'linear-gradient(0deg, white 100%, var(--grisClaro) 30%)';
        y.style.display = 'block'
        y.style.height = 'auto'
        y.style.minHeight = '70vh'
        y.style.overflow = 'auto'
        y.style.backgroundColor = 'transparent'
        y.style.display = 'block'
        document.getElementById("inicioS").style.display = 'none';
        cont.style.display = "block"
        }
    if(user.value != 'username'){
        document.getElementById("wronguser").style.display = "block";
        }
    if(password.value !='password'){
        document.getElementById("wrongpass").style.display = "block";
        }
        }

function eliminarWarning(){
    document.getElementById("wronguser").style.display = "none";
    document.getElementById("wrongpass").style.display = "none";
}

function agregarElemento(){
    sec = document.getElementById("agregarInv").style.display = "block";
}
function cerrar(n){
    document.getElementById("agregarInv").style.display="none";

    }
function abrir(){
    document.getElementById("agregarInv").style.display="block";
}
function Agregar(){
    document.getElementById("agregarInv").style.display="block";
}