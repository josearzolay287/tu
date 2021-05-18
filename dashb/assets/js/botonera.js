function carga_formulario(id) {
	cajon=id;
	switch (cajon){
    	  case 'dashboard':
       	//	$('#content_body').load('dashboard_1.php');
         // tabla_users(); 
         window.location='index.php';
      	break;
        case 'lista_usuarios':
       		$('#content_body').load('usuarios.php');
         // tabla_users(); 
      	break;
        case 'tipos_usuarios':
       		$('#content_body').load('tipos_usuarios.php');
           
      	break;
        case 'registrar_usuarios':
       		$('#content_body').load('registro_usuarios.php');
         // tabla_users(); 
      	break;
        case 'registrar_tipo_usuarios':
       		$('#content_body').load('registrar_tipo_usuarios.php');
         // tabla_users(); 
      	break;
        case 'slide_principal':
       		$('#content_body').load('slide_principal.php');
         // tabla_users(); 
      	break;
        case 'slide_principal_reg':
       		$('#content_body').load('slide_principal_reg.php');
         // tabla_users(); 
      	break;
        case 'about_me':
       		$('#content_body').load('about_me.php');
         // tabla_users(); 
      	break;
        case 'about_me_reg':
       		$('#content_body').load('about_me_reg.php');
         // tabla_users(); 
      	break;
        case 'servicios_ofrecidos':
       		$('#content_body').load('servicios_ofrecidos.php');
         // tabla_users(); 
      	break;
        case 'servicios_ofrecidos_reg':
       		$('#content_body').load('servicios_ofrecidos_reg.php');
         // tabla_users(); 
      	break;
        case 'banner_publicidad':
       		$('#content_body').load('banner_publicidad.php');
         // tabla_users(); 
      	break;
        case 'banner_publicidad_reg':
       		$('#content_body').load('banner_publicidad_reg.php');
         // tabla_users(); 
      	break;
        case 'zona_back':
          $('#content_body').load('zona_back.php');
        // tabla_users(); 
       break;
       case 'zona_back_reg':
          $('#content_body').load('zona_back_reg.php');
        // tabla_users(); 
       break;
       case 'mixes':
          $('#content_body').load('mixes.php');
        // tabla_users(); 
       break;
       case 'mixes_reg':
          $('#content_body').load('mixes_reg.php');
        // tabla_users(); 
       break;


       case 'ediciones':
        $('#content_body').load('ediciones.php');
      // tabla_users(); 
     break;
     case 'ediciones_reg':
        $('#content_body').load('ediciones_reg.php');
      // tabla_users(); 
     break;


     case 'packs':
      $('#content_body').load('packs.php');
    // tabla_users(); 
   break;
   case 'packs_reg':
      $('#content_body').load('packs_reg.php');
    // tabla_users(); 
   break;


       case 'planes_principales':
        $('#content_body').load('planes_principales.php');
      // tabla_users(); 
     break;
     case 'planes_principales_reg':
        $('#content_body').load('planes_principales_reg.php');
      // tabla_users(); 
     break;
     case 'eventos':
      $('#content_body').load('eventos.php');
    // tabla_users(); 
   break;
   case 'eventos_reg':
      $('#content_body').load('eventos_reg.php');
    // tabla_users(); 
   break;

   case 'generos':
    $('#content_body').load('generos.php');
  // tabla_users(); 
 break;
 case 'generos_reg':
    $('#content_body').load('generos_reg.php');
  // tabla_users(); 
 break;

 case 'estadisticas_dj':
    $('#content_body').load('estadisticas_dj.php');
  // tabla_users(); 
 break;
 case 'estadisticas_dj_reg':
    $('#content_body').load('estadisticas_dj_reg.php');
  // tabla_users(); 
 break;


  case 'historia_dj':
    $('#content_body').load('historia_dj.php');
  // tabla_users(); 
 break;
 case 'historia_dj_reg':
    $('#content_body').load('historia_dj_reg.php');
  // tabla_users(); 
 break;

  case 'sobre_nosotros':
    $('#content_body').load('sobre_nosotros.php');
  // tabla_users(); 
 break;
 case 'sobre_nosotros_reg':
    $('#content_body').load('sobre_nosotros_reg.php');
  // tabla_users(); 
 break;
 case 'fondo_perfiles':
  $('#content_body').load('fondo_perfiles.php');
// tabla_users(); 
break;
case 'fondo_perfiles_reg':
  $('#content_body').load('fondo_perfiles_reg.php');
// tabla_users(); 
break;
case 'tipo_cambio':
  $('#content_body').load('tipo_cambio.php');
// tabla_users(); 
break;
case 'tipo_cambio_reg':
  $('#content_body').load('tipo_cambio_reg.php');
// tabla_users(); 
break;
case 'beats':
  $('#content_body').load('beats.php');
// tabla_users(); 
break;
case 'beats_reg':
  $('#content_body').load('beats_reg.php');
// tabla_users(); 
break;
case 'libreria':
  $('#content_body').load('libreria.php');
// tabla_users(); 
break;
case 'libreria_reg':
  $('#content_body').load('libreria_reg.php');
// tabla_users(); 
break;
 case 'ventas':
    $('#content_body').load('ventas.php');
  // tabla_users(); 
 break;
        case 'cerrar':
          
          $.ajax({
            url: "sesiones.php",
             type: "POST",
             dataType: "html",
              data: "destroy='destroy'",
                error: function(){
            alert("error petición ajax");
          },
              success: function(resp){
                alert(resp);
      
                }, complete: function(){
                  window.location='../../../index.php';
               }
          });
          
        break;
        case 'inicio':
          //$('#area_principal').load('../index.php');
          window.location='principal.php';
        break;
        
  	} 
}
