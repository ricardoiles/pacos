var platos= new Array();


function showComida(id) {
	$.ajax({
    method: 'GET',
    url: '/api/pacos/'+id+'/comida',
    dataType: "json",
    success: function (data, status, xhr) {
      console.log(id);
      var comida = platos.indexOf(platos.find(e => e.catcomida == id));
    	console.log(comida);
    }, error: function (xhr, ajaxOptions, thrownError) {
        
    }
  });
}

function listarComidas(){

var comidas = "" ;

  if (platos.length != 0){
    platos.forEach(cmd => comidas += "comida: "
    );
  }
  $('#Comidas').html(comidas);
}
