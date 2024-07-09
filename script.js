function validarLetras(e){
	var charcode = e.keyCode;
	if (charcode == 13 || charcode == 32) {
		return true;
	} 

	var tipo = String.fromCharCode(charcode);
	var expresion = /^[a-zA-Z]+$/;

	if (expresion.test(tipo)) {
		return true;
	} else {
		e.preventDefault();
		return false;
	}


}

function validarCed(e){
	var ced = document.getElementById("ced").value;

	var charcode = e.keyCode;
	if (charcode == 13 || charcode == 32 || charcode == 8) {
		return true;
	} 

	var tipo = String.fromCharCode(charcode);
	var expresion = /\d/;

	if (expresion.test(tipo) && ced.length<10) {
		return true;
	} else {
		e.preventDefault();
		return false;
	}


}







function validarEdad(e) {
    var inputEdad = document.getElementById('edad').value;
    var filtro = inputEdad.replace(/[^0-9]/g, '');
    var edad = parseInt(filtro, 10);

    if (edad > 100) {
        e.preventDefault();
        // Si es mayor a 100, recorta el valor a 100
        document.getElementById('edad').value = '';
    } else {
        // Si hay caracteres no numéricos, actualiza el valor
        if (inputEdad !== filtro) {
            e.preventDefault();
            document.getElementById('edad').value = filtro;
        }
    }
}

document.getElementById('edad').addEventListener('input', validarEdad);



