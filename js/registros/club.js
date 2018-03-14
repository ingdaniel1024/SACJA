
$.ajax({
	url: '/ajax/iglesias',
	dataType: 'JSON',
	success: function(response){

		$.each(response,function(index,value){//Por cada union añadir un option al select
			$('#id_iglesia')
    		.append($("<option></option>")
            .attr("value",value.id_iglesia)
            .text(value.nombre_iglesia));
			if(value.id_iglesia== php['id_iglesia']){//En caso de editar, selecciona la union existente
				$('#id_iglesia option[value='+php['id_iglesia']+']').attr("selected","selected");
			}
		});
	},
	error: function(error){
		alert('Hubo un error');
	}
});

$('#formulario_registro_club').submit(function(e){
	if($('#iglesia option:selected').val()==0){
		e.preventDefault();
		alert('Selecciona una iglesia.');
	}
});