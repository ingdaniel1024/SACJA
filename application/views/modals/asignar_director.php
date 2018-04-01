<form action="/club/asignar_director" method="POST">
    <?php if(isset($id_club) && $id_club!=null){ echo form_hidden('id_club', $id_club);}?>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Selecciona un director</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" id="director" name="director" required style="width: 100%;">
            </select>
        </div>
    </div>
    
    <br><br><br><br>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">Aceptar</button>
        </div>
    </div>
</form>

<script type="text/javascript">
    $("#director").select2({
        placeholder: "correo",
        allowClear: true
    });

    $.ajax({
        url: '/ajax/usuarios',
        dataType: 'JSON',
        success: function(response){
            $.each(response,function(index,value){//Listar cada usuario
                $('#director')
                .append($("<option></option>")
                .attr("value",value.id_usuario)
                .text(value.correo));
            });
        },
        error: function(error){
            alert('Hubo un error');
        }
    });
</script>