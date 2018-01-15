
$.ajax({
	url: '/ajax/iglesias',
	dataType: 'JSON',
	success: function(response){

		$.each(response,function(index,value){//Por cada union añadir un option al select
			$('#iglesia')
         		.append($("<option></option>")
                .attr("value",value.id_iglesia)
                .text(value.nombre_iglesia));
			//console.log(value.id_union+' -> '+value.nombre_union);
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