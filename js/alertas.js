const { default: Swal } = require("sweetalert2");

const boton = document.querySelector('#formUsuario');
boton.addEventListener('submit', aplicar);

function aplicar(e){
  e.preventDefault();
  const valor = document.querySelector('#data[correo]').value;

  if(valor === ""){
    Swal.fire({
      title:'Hola',
      text:'prueba',
      icon:'error',
      confirmedButtonText:'confirmar'
    })
  }else{
    Swal.fire({
      title:'Hola',
      text:'prueba',
      icon:'Success',
      confirmedButtonText:'confirmar'
    })
  }
}