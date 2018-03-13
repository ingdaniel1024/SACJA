
$.ajax({
	url: '/ajax/uniones',
	dataType: 'JSON',
	success: function(response){

		$.each(response,function(index,value){//Por cada union añadir un option al select
			$('#id_union')
    		.append($("<option></option>")
            .attr("value",value.id_union)
            .text(value.nombre_union));

            if(value.id_union== php['id_union']){//En caso de editar, selecciona la union existente
				$('#id_union option[value='+php['id_union']+']').attr("selected","selected");
			}
		});
	},
	error: function(error){
		alert('Hubo un error');
	}
});

$('#formulario_registro_asociacion').submit(function(e){
	if($('#id_union option:selected').val()==0){
		e.preventDefault();
		alert('Selecciona una unión.');
	}
});