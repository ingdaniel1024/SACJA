$("#fecha_nacimiento").inputmask();
$.ajax({
	url: '/ajax/clases_conquistadores',
	dataType: 'JSON',
	success: function(response){

		$.each(response,function(index,value){//Por cada union añadir un option al select
			$('#id_clase')
    		.append($("<option></option>")
            .attr("value",value.id_clase)
            .text(value.nombre_clase));
            if(value.id_clase== php['id_clase']){//En caso de editar, selecciona la union existente
				$('#id_clase option[value='+php['id_clase']+']').attr("selected","selected");
			}
		});
	},
	error: function(error){
		alert('Hubo un error');
	}
});
$('#correo').on('input',function(){
	console.log('Validacion con Ajax en proceso');
});
/*$('#fecha_nacimiento').on('input',function(){
	var fecha_original = $('#fecha_nacimiento').val();
	var f = fecha_original.split('/');
	var fecha_nueva = f[2]+'-'+f[1]+'-'+f[0];
	console.log('Date: '+ fecha_original);
	console.log('Nueva: '+ fecha_nueva);
});
*/