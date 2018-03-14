
$.ajax({
	url: '/ajax/asociaciones',
	dataType: 'JSON',
	success: function(response){

		$.each(response,function(index,value){//Por cada union añadir un option al select
		$('#id_asociacion')
		.append($("<option></option>")
        .attr("value",value.id_asociacion)
        .text(value.nombre_asociacion));
        if(value.id_asociacion== php['id_asociacion']){//En caso de editar, selecciona la union existente
			$('#id_asociacion option[value='+php['id_asociacion']+']').attr("selected","selected");
		}
		});
	},
	error: function(error){
		alert('Hubo un error');
	}
});

$('#formulario_registro_distrito').submit(function(e){
	if($('#id_asociacion option:selected').val()==0){
		e.preventDefault();
		alert('Selecciona una asociación.');
	}
});