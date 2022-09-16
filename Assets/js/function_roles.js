function openModal(){
    $('#modalFormRol').modal('show');
}
function openModalSanatorioNuevo(){
    $('#modalFormSanatorioNuevo').modal('show');
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
                let txtnombre = document.getElementById('txtnombre').value;
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
                });

            }else{
                alert('Error: ' + resultado);
            }
		}
	});
} 

function openModalSanatorioEditar(id){
    $('#modalFormSanatorioEditar').modal('show');
    let url = "versanatorio/"+id;
    $.ajax({
		type: "get",
		url: url,
		success: function(resultado){
			console.log(resultado);

            }
	});
}