

$('button[data-target]').on('click', function(e){
  e.preventDefault();
  $('#myModal').modal('show').find('.modal-body').load($(this).attr('data-target'));
});