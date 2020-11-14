var comidas= new Array();


function showComida(id) {
			$.ajax({
                method: 'GET',
                url: '/api/pacos/'+id,
                dataType: "json",
                success: function (data, status, xhr) {

                	//limpiarmodel();
                    comida = data[0];

                   	if(comida != null){

                   		
                   		var i = comidas.indexOf(comidas.find(e => e.Categoria == id)); 

					    if (i !== -1) {
					    	var ini = i; var fin = i+1;
					    	var tmp= comidas.find(e => e.Categoria == id);

					    	comidas.splice(i, 1);	

					        
					    }	
                   		comidas.push(comida);
                   		listarplatos();
                   	}

                }, error: function (xhr, ajaxOptions, thrownError) {
                    
                }
            });
	
}

function limpiarmodel(){
}


function listarplatos(){

var platos = "" ;

if (comidas.length != 0){

comidas.forEach(cmd => platos += "comida: "+cmd.Nombre
                                );

}
  $('#Comidas').html(platos);
}
