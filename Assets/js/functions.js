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
                /*let txtnombre = document.getElementById('txtnombre').value;
                let txtdireccion = document.getElementById('txtdireccion').value;  
                let txttelefono = document.getElementById('txttelefono').value; 
                let txtcelular = document.getElementById('txtcelular').value; 
                let txtciudad = document.getElementById('txtciudad').value; 
                let txtcorreo = document.getElementById('txtcorreo').value; 

                const div = document.createElement('div');

                div.className = 'card text-center mx-2';

                div.innerHTML = `
                    <div class="card-body">
                        <h5 class="card-title">`+ txtnombre  +`</h5>
                        <p>` + txtcorreo +`</p>
						<p> `+ txtdireccion + ` - ` + txtciudad + ` </p>
						<p> `+ txttelefono + ` - ` + txtcelular + ` </p>
						<a href="#" class="btn btn-primary">Editar</a>
                    </div>
                `;

                document.getElementById('listaSanatorios').appendChild(div);
                const inputs = document.querySelectorAll('#txtnombre, #txtdireccion, #txttelefono, #txtcelular, #txtciudad, #txtbarrio, #txtcorreo');
                inputs.forEach(input => {
                    input.value = '';
                });*/

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