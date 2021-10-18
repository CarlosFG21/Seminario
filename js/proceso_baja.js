function confirmacion(e) {

    if (confirm("¿Estás seguro que deseas dar de baja el registro?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete = document.querySelectorAll(".boton-eliminar");

for (var i = 0; i < linkDelete.length; i++) {
    linkDelete[i].addEventListener('click', confirmacion);
}