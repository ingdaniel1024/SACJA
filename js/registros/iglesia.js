
$.ajax({
	url: '/ajax/distritos',
	dataType: 'JSON',
	success: function(response){

		$.each(response,function(index,value){//Por cada union añadir un option al select
		$('#id_distrito')
		.append($("<option></option>")
        .attr("value",value.id_distrito)
        .text(value.nombre_distrito));
		if(value.id_distrito== php['id_distrito']){//En caso de editar, selecciona la union existente
			$('#id_distrito option[value='+php['id_distrito']+']').attr("selected","selected");
		}
		});
	},
	error: function(error){
		alert('Hubo un error');
	}
});

$('#formulario_registro_iglesia').submit(function(e){
	if($('#id_distrito option:selected').val()==0){
		e.preventDefault();
		alert('Selecciona un distrito.');
	}
});