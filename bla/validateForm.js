

//validar formulario de validación
document.addEventListener("DOMContentLoaded", function() {

  document.getElementById("formularioRegister").addEventListener('submit', validarFormularioRegistro);


})

function validarFormularioRegistro(evento){
  evento.preventDefault();
  let usuario = document.getElementById('usuario').value;
  let email = document.getElementById('email').value;
  let password = document.getElementById('password').value;
  let passwordRepetir = document.getElementById('passwordRepetir').value;
  let question = document.getElementById('question').value;
  let answer = document.getElementById('answer').value;


  if(usuario.length == 0) {
	  swal.fire({
	  title: 'Por Favor verifique!',
	  text: 'Debe introducir un usuario',
	  icon: 'error',
	  confirmButtonText: 'Cool'
		})
    return;
  }
  if(email.length == 0) {
    swal.fire({
	  title: 'Por Favor verifique!',
	  text: 'Debe escribir un Email',
	  icon: 'error',
	  confirmButtonText: 'Cool'
		})
    return;
  }
  if(password.length == 0) {
    swal.fire({
		  title: 'Por Favor verifique!',
		  text: 'Debe escribir una contraseña',
		  icon: 'error',
		  confirmButtonText: 'Cool'
		})
    return;
  }
  if(passwordRepetir.length == 0) {
  	swal.fire({
		  title: 'Por Favor verifique!',
		  text: 'Debe confirmar su contraseña',
		  icon: 'error',
		  confirmButtonText: 'Cool'
		})
    return;
  }
  if(password !== passwordRepetir) {
  	swal.fire({
		  title: 'Por Favor verifique!',
		  text: 'Contraseñas no coinciden',
		  icon: 'error',
		  confirmButtonText: 'Cool'
		})
    return;
  }
  this.submit();

}

