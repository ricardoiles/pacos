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
            "<div class='column is-4 box pacos-comida pacos-box-comida'>"+
              "<div class='columns is-desktop'>"+
                "<div class='column is-3' style='width: 30%'>"+
                    "<image class='pacos-ordenar-fotocomida' src='"+asset_global+"/"+cmd.fotocomida+"'>"+
                "</div>"+
                "<div class='column is-9 pacos-column-infocomida'>"+
                    "<b>"+cmd.nombrecomida+"</b>"+
                    "<p>"+cmd.ingredientes+"</p>"+
                    "<p><b class='pacos-is-active'>$"+cmd.preciocomida+"</b></p>"+
                    "<div class='column is-12' style='text-align: left;'>"+
                      '<a href="'+url_reseñas_global+'/'+cmd.namepacos+'/'+cmd.idcomida+'/reseña" style="color: #414d58;" style="cursor: pointer;">'+
                        "<label style='cursor: pointer;' class='reseñas'><i class='material-icons'>sms</i></label>"+
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

function VerPacosxCat(idcat) {
  var platos = "";
  $.ajax({
    method: 'GET',
    url: '/api/pacosxcat/'+idcat,
    dataType: "json",
    success: function (data, status, xhr) {
      pacos = data;
      if(data != null){
        pacos.forEach(cmd => platos += 
            '<div class="column box is-3 pacos-sitio ">'+
          '<article class="media">'+
            '<div class="media-left">'+
              '<figure class="image">'+
                "<img src='"+asset_global+"/"+cmd.fotoperfil+"'"+
                  'style="border-radius: 50%; width: 50px; height: 50px;">'+
              '</figure>'+
            '</div>'+
            '<div class="media-content">'+
              '<div class="content" style="line-height: 100%; height: 80px; max-height: 80px">'+
                '<p>'+
                  '<strong> '+cmd.namerest+'</strong> &middot; <small> '+cmd.catrest+' </small>'+
                  '<br>'+
                    '<small>'+cmd.ciudad+' &middot; '+cmd.direccion+' &middot; '+cmd.barriovere+'</small>'+
                  '<br>'+
                    '<small> '+cmd.descripcion.substr(0, 40)+'...</small>'+
                '</p>'+
              '</div>'+
              '<nav class="level is-mobile" style="margin-bottom: 5px">'+
                '<div class="level-left">'+
                  "<a href='"+url_reseñas_global+"/"+cmd.namerest+"/reseñas'' class='level-item tooltip' data-tooltip='Reseñas' aria-label='reply'>"+
                    '<span class="icon is-small">'+
                      '<i class="material-icons">how_to_vote</i>'+
                    '</span>'+
                  '</a>'+
                  '<a href="'+url_reseñas_global+'/'+cmd.namerest+'" class="level-item tooltip" data-tooltip="Ir al sitio" aria-label="retweet">'+
                    '<span class="icon is-small">'+
                      '<i class="material-icons">open_in_new</i>'+
                    '</span>'+
                  '</a>'+
                '</div>'+
              '</nav>'+
            '</div>'+
          '</article>'+
        "</div>"
        );
      }else{
        pacos.forEach(cmd => platos += "<b>Esta categoria aun no tiene comida</b>");
      }
      $('#Pacos').html(platos);

      console.log($('.pacos-column-catselected')); 
      console.log($('.pacos-column-catselected').length);    
      despint();

      $("#"+idcat+"").removeClass("pacos-column-categoria");
      $("#"+idcat+"").addClass("pacos-column-catselected");   
      
      $("#labelid").addClass("cat-white");
      
    }, error: function (xhr, ajaxOptions, thrownError) {
        
    }
  });
}

function despint(){

  if($('.pacos-column-catselected').length != 0){
      $('.pacos-column-catselected').addClass('pacos-column-categoria'); 
      $('.pacos-column-catselected').removeClass('pacos-column-catselected');
      $("#labelid").addClass("cat-black");

      }else{
        $("#Todos").removeClass("pacos-column-todospacos");
        $("#labelid").addClass("cat-white");
        $("#Todos").addClass("pacos-column-categoria");
      }
}

function VerTodosPacos() {
  var platos = "";
  $.ajax({
    method: 'GET',
    url: '/api/todopacos',
    dataType: "json",
    success: function (data, status, xhr) {
      pacos = data;
      if(data != null){
        pacos.forEach(cmd => platos += 
            '<div class="column box is-3 pacos-sitio ">'+
          '<article class="media">'+
            '<div class="media-left">'+
              '<figure class="image">'+
                "<img src='"+asset_global+"/"+cmd.fotoperfil+"'"+
                  'style="border-radius: 50%; width: 50px; height: 50px;">'+
              '</figure>'+
            '</div>'+
            '<div class="media-content">'+
              '<div class="content" style="line-height: 100%; height: 80px; max-height: 80px">'+
                '<p>'+
                  '<strong> '+cmd.namerest+'</strong> &middot; <small> '+cmd.catrest+' </small>'+
                  '<br>'+
                    '<small>'+cmd.ciudad+' &middot; '+cmd.direccion+' &middot; '+cmd.barriovere+'</small>'+
                  '<br>'+
                    '<small> '+cmd.descripcion.substr(0, 40)+'...</small>'+
                '</p>'+
              '</div>'+
              '<nav class="level is-mobile" style="margin-bottom: 5px">'+
                '<div class="level-left">'+
                  "<a href='"+url_reseñas_global+"/"+cmd.namerest+"/reseñas'' class='level-item tooltip' data-tooltip='Reseñas' aria-label='reply'>"+
                    '<span class="icon is-small">'+
                      '<i class="material-icons">how_to_vote</i>'+
                    '</span>'+
                  '</a>'+
                  '<a href="'+url_reseñas_global+'/'+cmd.namerest+'" class="level-item tooltip" data-tooltip="Ir al sitio" aria-label="retweet">'+
                    '<span class="icon is-small">'+
                      '<i class="material-icons">open_in_new</i>'+
                    '</span>'+
                  '</a>'+
                '</div>'+
              '</nav>'+
            '</div>'+
          '</article>'+
        "</div>"
        );
      }else{
        pacos.forEach(cmd => platos += "<b>Esta categoria aun no tiene comida</b>");
      }
      $('#Pacos').html(platos);

        despint();

      $("#Todos").addClass("pacos-column-todospacos");
      $("#Todos").removeClass("pacos-column-categoria");

      //$(".pacos-columns-categorias").removeClass("pacos-column-todospacos");
    }, error: function (xhr, ajaxOptions, thrownError) {
        
    }
  });
}

function limpiar(temp){
  var divcat = $("#"+temp+"")[0].id;
  
  $("#Todos").removeClass("pacos-column-todospacos");
  $("#Todos").addClass("pacos-column-categoria");
  $("#"+divcat+"").addClass("pacos-column-catselected");
}

function remove(temp, divcat){
  console.log(temp+''+idcat+''+divcat);
  console.log('llego a la otra validacion');
  
}