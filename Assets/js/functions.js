/** PRIMER INICIO */
$("#formPrimerInicio").submit(function(event){
	event.preventDefault();
	PrimerInicio();
});

function PrimerInicio(){
	var datos = $("#formPrimerInicio").serialize();
	$.ajax({
		type: "post",
		url:"registrar/insertar",
		data: datos,
		success: function(resultado){
			if(resultado == true){
                window.location.replace("dashboard");
            }else{
                alert('Error: ' + resultado);
                console.log(resultado);
            }
		}
	});
}

/** LOGIN */
$("#formLogin").submit(function(event){
	event.preventDefault();
	login();
});

function login(){
    var datos = $("#formLogin").serialize();
	$.ajax({
		type: "post",
		url:"login/nuevasession",
		data: datos,
		success: function(resultado){
			if(resultado == true){
                window.location.replace("dashboard");
            }else{
                alert('Error: ' + resultado);
                console.log(resultado);
            }
		}
	});
}

/*** FUNCIONES PARA CREAR NUEVO SANATORIO ***/
function setModal(modal, opcion){
    $('#'+modal).modal(opcion);
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
$("#formPacienteNuevo").submit(function(event){
	event.preventDefault();
	pacienteNuevo();
});

function openTabFicha(){
    $('[href="#tabFicha"]').tab('show');
}

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
function openModalPacienteEditar(id){ //no eliminar
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
            
            document.getElementById('txtenfermedadesbaseEditar').value = resultado.enfermedades_base;  
            document.getElementById('txtalergiaEditar').value = resultado.alergias;  
            document.getElementById('txtobservacionesEditar').value = resultado.observaciones;  

        }
	});
}

function openTabFichaEditar(){
    $('[href="#tabFichaEditar"]').tab('show');
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
function openModalPacienteEliminar(id){ //no eliminar
    $('#modalFormPacienteEliminar').modal('show');
    document.getElementById('hiddenIdEliminar').value = id;
    //document.getElementById('hiddenidEliminar').value = id;
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


/*** FUNCIONES PARA CREAR NUEVO ASISTENTE ***/
function openModalAsistenteNuevo(){
    $('#modalFormAsistenteNuevo').modal('show');
}

$("#formAsistenteNuevo").submit(function(event){
	event.preventDefault();
	asistenteNuevo();
});

function asistenteNuevo(){
	var datos = $("#formAsistenteNuevo").serialize();
    let contrasena = document.getElementById("txtcontrasena").value;
    let verify = document.getElementById("txtcontrasenaverify").value;
    console.log(contrasena+' '+verify);
    if (contrasena == verify){
        	$.ajax({
		type: "post",
		url:"asistente/insertar",
		data: datos,
		success: function(resultado){
            console.log(resultado);
			if(resultado > 0){
                $('#modalFormAsistenteNuevo').modal('hide');
                location.reload();
            }else{
                alert('Error: ' + resultado);
                console.log(resultado);
            }
		}
	});
    }else{
        alert('Las contraseñas no coinciden');
    }

}

/*** FUNCIONES PARA EDITAR ASISTENTE *****/
function openModalAsistenteEditar(id){ //no eliminar
    $('#modalFormAsistenteEditar').modal('show');
    let url = "asistente/verasistente/"+id;
    $.ajax({
		type: "post",
		url: url,
        dataType:"json",
		success: function(resultado){
			document.getElementById('txtnombreEditar').value = resultado.nombre;
            document.getElementById('txtapellidoEditar').value = resultado.apellido; 
            document.getElementById('txtestadoEditar').value = resultado.estado; 
            document.getElementById('hiddenidEditar').value = resultado.id;         
        }
	});
}

$("#formAsistenteEditar").submit(function(event){
	event.preventDefault();
	asistenteEditar();
});

function asistenteEditar(){
	var datos = $("#formAsistenteEditar").serialize();
	$.ajax({
		type: "post",
		url:"asistente/actualizar",
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

/*** FUNCIONES PARA ELIMINAR ASISTENTE */
function openModalAsistenteEliminar(id){ //no eliminar
    $('#modalFormAsistenteEliminar').modal('show');
    document.getElementById('hiddenIdEliminar').value = id;
    //document.getElementById('hiddenidEliminar').value = id;
}

$("#formAsistenteEliminar").submit(function(event){
	event.preventDefault();
	asistenteEliminar();
});

function asistenteEliminar(){
    let id = document.getElementById("hiddenIdEliminar").value;
    let url = "asistente/eliminar/"+ id;
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