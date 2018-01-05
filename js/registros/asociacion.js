
$.ajax({
	url: '/ajax/uniones',
	dataType: 'JSON',
	success: function(response){

		$.each(response,function(index,value){//Por cada union añadir un option al select
			$('#id_union')
         		.append($("<option></option>")
                .attr("value",value.id_union)
                .text(value.nombre_union));
			//console.log(value.id_union+' -> '+value.nombre_union);
		});
	},
	error: function(error){
		alert('Hubo un error');
	}
});