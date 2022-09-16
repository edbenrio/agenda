/*** FUNCIONES PARA CREAR NUEVO SANATORIO ***/
function openModalSanatorioNuevo(){
    $('#modalFormSanatorioNuevo').modal('show');
}

function cerrarModalSanatorioNuevo(){
    $('#modalFormSanatorioNuevo').modal('hide');
}

$("#formSanatorioNuevo").submit(function(event){
	event.preventDefault();
	sanatorioNuevo();
});

function sanatorioNuevo(){
	var datos = $("#formSanatorioNuevo").serialize();
	$.ajax({
		type: "post",
		url:"sanatorio/insertar",
		data: datos,
		success: function(resultado){
			if(resultado > 0){
                $('#modalFormSanatorioNuevo').modal('hide');
                location.reload();
            }else{
                alert('Error: ' + resultado);
            }
		}
	});
}


/*** FUNCIONES PARA EDITAR SANATORIO *****/
function openModalSanatorioEditar(id){
    $('#modalFormSanatorioEditar').modal('show');
    let url = "sanatorio/versanatorio/"+id;
    $.ajax({
		type: "post",
		url: url,
        dataType:"json",
		success: function(resultado){
			document.getElementById('txtnombreEditar').value = resultado.nombre;
            document.getElementById('txtdireccionEditar').value = resultado.direccion;  
            document.getElementById('txttelefonoEditar').value = resultado.telefono; 
            document.getElementById('txtbarrioEditar').value = resultado.barrio; 
            document.getElementById('txtcelularEditar').value = resultado.celular; 
            document.getElementById('txtciudadEditar').value = resultado.ciudad; 
            document.getElementById('txtcorreoEditar').value = resultado.mail; 
            document.getElementById('hiddenidEditar').value = resultado.id;         
        }
	});
}

function cerrarModalSanatorioEditar(){
    $('#modalFormSanatorioEditar').modal('hide');
}

$("#formSanatorioEditar").submit(function(event){
	event.preventDefault();
	sanatorioEditar();
});

function sanatorioEditar(){
	var datos = $("#formSanatorioEditar").serialize();
	$.ajax({
		type: "post",
		url:"sanatorio/actualizar",
		data: datos,
		success: function(resultado){
			if(resultado > 0){
                $('#modalFormSanatorioEditar').modal('hide');
                location.reload();
            }else{
                alert('Error: ' + resultado);
            }
		}
	});
} 

/*** FUNCIONES PARA ELIMINAR SANATORIO */
function openModalSanatorioEliminar(id){
    $('#modalFormSanatorioEliminar').modal('show');
    document.getElementById('hiddenIdEliminar').value = id;
    //document.getElementById('hiddenidEliminar').value = id;
}

function cerrarModalSanatorioEliminar(){
    $('#modalFormSanatorioEliminar').modal('hide');
}

$("#formSanatorioEliminar").submit(function(event){
	event.preventDefault();
	sanatorioEliminar();
});

function sanatorioEliminar(){
    let id = document.getElementById("hiddenIdEliminar").value;
    let url = "sanatorio/eliminar/"+ id;
    $.ajax({
        type: "post",
        url: url,
        success: function(resultado){
            if(resultado > 0){
                location.reload();
            }else{
                alert('Error: ' + resultado);
            }
        }
    })
}

/*** FUNCIONES PARA CREAR NUEVO PACIENTE ***/
function openModalPacienteNuevo(){
    $('#modalFormPacienteNuevo').modal('show');
}

function cerrarModalPacienteNuevo(){
    $('#modalFormPacienteNuevo').modal('hide');
}

$("#formPacienteNuevo").submit(function(event){
	event.preventDefault();
	pacienteNuevo();
});

function pacienteNuevo(){
	var datos = $("#formPacienteNuevo").serialize();
	$.ajax({
		type: "post",
		url:"paciente/insertar",
		data: datos,
		success: function(resultado){
			if(resultado > 0){
                $('#modalFormPacienteNuevo').modal('hide');
                location.reload();
            }else{
                alert('Error: ' + resultado);
                console.log(resultado);
            }
		}
	});
}

/*** FUNCIONES PARA EDITAR PACIENTE *****/
function openModalPacienteEditar(id){
    $('#modalFormPacienteEditar').modal('show');
    let url = "paciente/verpaciente/"+id;
    $.ajax({
		type: "post",
		url: url,
        dataType:"json",
		success: function(resultado){
			document.getElementById('txtnombreEditar').value = resultado.nombre;
            document.getElementById('txtapellidoEditar').value = resultado.apellido;
            document.getElementById('txtdireccionEditar').value = resultado.direccion;  
            document.getElementById('txttelefonoEditar').value = resultado.telefono; 
            document.getElementById('txtbarrioEditar').value = resultado.barrio; 
            document.getElementById('txtciudadEditar').value = resultado.ciudad; 
            document.getElementById('txtestadoEditar').value = resultado.estado; 
            document.getElementById('txtcorreoEditar').value = resultado.email; 
            document.getElementById('hiddenidEditar').value = resultado.id;         
        }
	});
}

function cerrarModalPacienteEditar(){
    $('#modalFormPacienteEditar').modal('hide');
}

$("#formPacienteEditar").submit(function(event){
	event.preventDefault();
	pacienteEditar();
});

function pacienteEditar(){
	var datos = $("#formPacienteEditar").serialize();
	$.ajax({
		type: "post",
		url:"paciente/actualizar",
		data: datos,
		success: function(resultado){
			if(resultado > 0){
                $('#modalFormPacienteEditar').modal('hide');
                location.reload();
            }else{
                alert('Error: ' + resultado);
                console.log( resultado);
            }
		}
	});
} 

/*** FUNCIONES PARA ELIMINAR PACIENTE */
function openModalPacienteEliminar(id){
    $('#modalFormPacienteEliminar').modal('show');
    document.getElementById('hiddenIdEliminar').value = id;
    //document.getElementById('hiddenidEliminar').value = id;
}

function cerrarModalPacienteEliminar(){
    $('#modalFormPacienteEliminar').modal('hide');
}

$("#formPacienteEliminar").submit(function(event){
	event.preventDefault();
	pacienteEliminar();
});

function pacienteEliminar(){
    let id = document.getElementById("hiddenIdEliminar").value;
    let url = "paciente/eliminar/"+ id;
    $.ajax({
        type: "post",
        url: url,
        success: function(resultado){
            if(resultado > 0){
                location.reload();
            }else{
                alert('Error: ' + resultado);
            }
        }
    })
}
