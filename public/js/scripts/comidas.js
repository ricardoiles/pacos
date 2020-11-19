function showComida(id) {
	$.ajax({
    method: 'GET',
    url: '/api/pacos/'+id+'/comida',
    dataType: "json",
    success: function (data, status, xhr) {
      console.log(data);
      $('#Comidas').html(data);
    	
    }, error: function (xhr, ajaxOptions, thrownError) {
        
    }
  });
}
