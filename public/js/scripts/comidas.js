function showComida(id) {
  var platos = "" ;
	$.ajax({
    method: 'GET',
    url: '/api/comxcat/'+id,
    dataType: "json",
    success: function (data, status, xhr) {
      comida = data;
      if(data != null){
        comida.forEach(cmd => platos += 
            "<div class='column is-4 box' style='line-height: 100%; text-align: justify; margin-right: 5px; margin-bottom: 10px; height: 130px;width: 32.16%;'>"+
              "<div class='columns is-desktop'>"+
                "<div class='column is-3' style='width: 30%'>"+
                    "<image class='pacos-ordenar-fotocomida' src='"+asset_global+"/"+cmd.fotocomida+"'>"+
                "</div>"+
                "<div class='column is-9' style='font-size: 13px; width: 70%; margin-left: -10px;'>"+
                    "<b>"+cmd.nombrecomida+"</b>"+
                    "<p>"+cmd.ingredientes+"</p>"+
                    "<p><b class='pacos-is-active'>$"+cmd.preciocomida+"</b></p>"+
                    "<div class='column is-12' style='text-align: left;'>"+
                      "<a href='' style='color: #414d58;'>"+
                        "<label class='reseñas'><i class='material-icons'>sms</i></label>"+
                      "</a>"+
                      "<a href='' style='color: #414d58;'>"+
                        "<label class='ordenar'><i class='material-icons'>room_service</i></label>"+
                      "</a>"+
                    "</div>"+
                "</div>"+
              "</div>"+
            "</div>"
        );
      }else{
        comida.forEach(cmd => platos += "<b>Esta categoria aun no tiene comida</b>");
      }
      $('#Comidas').html(platos);
    }, error: function (xhr, ajaxOptions, thrownError) {
        
    }
  });
}
