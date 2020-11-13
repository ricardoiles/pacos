var comidas= new Array();

var comresv = {
	idcomida : 0,
	nombrecomida :"",
	ingredientes : "",
	preciocomida : 0,
	cant: 0,
	fotocomida: ""
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
   		comresv.fotocomida ="";
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
						"<div class='column is-4 box' style='line-height: 100%; text-align: justify; margin-left:20px; margin-right: 5px; margin-bottom: 10px; width: 33%'>"+
                            "<div class='columns is-desktop pacos-div-ordencomida'>"+
                                "<div class='column  pacos-ordenar-col-3-fotocomida'>"+
                                    "<image class='pacos-ordenar-fotocomida' src='"+asset_global+"/"+cmd.fotocomida+"'>"+
                                "</div>"+
                                  "<div class='column is-9' style='font-size: 13px; width: 70%'>"+
                                      "<b>"+cmd.nombrecomida+"</b>"+
                                      "<p>"+cmd.ingredientes+"</p>"+                                                                          
                                      "<p><b>Cantidad: <label>"+cmd.cant+"</label> </b> &middot; <b class='pacos-is-active'>$"+cmd.preciocomida+"</b></p>"+
                                      "<label class='remove-comida' onclick='removerComida("+cmd.idcomida+")'><i class='material-icons'>remove_circle</i></label>"+
                                      "<input type='hidden' name='idcomida["+cmd.idcomida+"]' value='"+cmd.idcomida+"'>"+
                                      "<input type='hidden' name='nombrecomida["+cmd.nombrecomida+"]' value='"+cmd.nombrecomida+"'>"+
                                      "<input type='hidden' name='preciocomida["+cmd.preciocomida+"]' value='"+cmd.preciocomida+"'>"+
                                      "<input type='hidden' name='cant["+cmd.cant+"]' min='1' value='"+cmd.cant+"'>"+
                                  "</div>"+
                             "</div>"+
                        "</div>"
                                );

}
  $('#Comidas').html(platos);
}
