var comidas= new Array();

var comresv = {
	idcomida : 0,
	nombrecomida :"",
	ingredientes : "",
	preciocomida : 0,
	cant: 0
};


function agregarComida(id) {

			

			$.ajax({
                method: 'GET',
                url: '/api/pacos/'+$('#Paccos')[0].textContent+'/'+id,
                dataType: "json",
                success: function (data, status, xhr) {

                	//limpiarmodel();
                    comida = data[0];

                   	if(comida != null){

                   		
                   		var i = comidas.indexOf(comidas.find(e => e.idcomida == id)); 

					    if (i !== -1) {
					    	var ini = i; var fin = i+1;
					    	var tmp= comidas.find(e => e.idcomida == id);

					    	comidas.splice(i, 1);	

					        comida.cant = tmp.cant+1;
					    }	


                   		comidas.push(comida);
                   		listarplatos();
                   	}

                }, error: function (xhr, ajaxOptions, thrownError) {
                    
                }
            });
	
}

function limpiarmodel(){
  		comresv.idcomida = 0;
   		comresv.nombrecomida = "";
   		comresv.ingredientes = "";
   		comresv.preciocomida = 0;
   		comresv.cant =0;

}

function removerComida(id) {

	var i = comidas.indexOf(comidas.find(e => e.idcomida == id)); 

    if (i !== -1) {
        comidas.splice(i, 1);
    }

     listarplatos();
  
}

function listarplatos(){

var platos = "" ;

if (comidas.length != 0){

comidas.forEach(cmd => platos += 
                            '<div class="columns is-desktop">'+
                                '<div class="column is-3">'+
                                    '<div class="pacos-reservas-fotopacos" style="background-image: url("asset("storage"."/"."/".'+cmd.fotocomida+')");margin-top: 20%"></div>'+
                                '</div>'+
                                '<div class="column is-9 pacos-comida-elementocreado--inforightpacos">'+
                                    '<b>'+cmd.nombrecomida+'</b>'+
                                    '<p>'+cmd.ingredientes+'</p>'+
                                    '<p><input class="form-control" type="number" min="1" value="'+cmd.cant+'" >   <b>'+cmd.preciocomida+'</b></p>'+
                                    '<input  class="form-control" type="hidden" name="plato" value="'+cmd.idcomida+'">'+
                                    '<input  class="form-control" type="hidden" name="platonombre" value="'+cmd.nombrecomida+'">'+
                                    '<input  class="form-control" type="hidden" name="platoprecio" value="'+cmd.preciocomida+'">'+
                                '</div>'+
                                '<button class="button is-rounded" onclick="removerComida('+cmd.idcomida+')"><i class="material-icons">remove_circle</i></button>'+
                           '</div>' );



}

  

  $('#Comidas').html(platos);
}