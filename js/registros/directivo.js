$(document).ready(()=>{
	$("#usuario").select2({
	    placeholder: "correo",
	    allowClear: true
	});
});

$.ajax({
    url: '/ajax/usuarios',
    dataType: 'JSON',
    success: function(response){
        $.each(response,function(index,value){//Listar cada usuario
            $('#usuario')
            .append($("<option></option>")
            .attr("value",value.id_usuario)
            .text(value.correo));
        });
    },
    error: function(error){
        alert('Hubo un error');
    }
});


$('#formulario_registro_directivo').submit(function(e){
	if($('#cargo option:selected').val()==0){
		e.preventDefault();
		alert('Selecciona un cargo.');
	}
});