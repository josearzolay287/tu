function carga_formulario(id) {
	cajon=id;
	switch (cajon){
    	  case 'tienda_pack':
       		$('#container_principal').load('tienda.php');
      	break;
        case 'tienda_free':
       		$('#container_principal').load('edit_venta.php');
			   $("#buscar_").focus();
      	break;
        case 'ediciones_free':
       		$('#container_principal').load('edit.php');
      	break;
        case 'pack_free':
       		$('#container_principal').load('pack.php');
      	break;
		  case 'mix_pachanga':
       		$('#container_principal').load('mix_pachanga.php');
      	break;
		case 'pasarela_mp':
       		$('#container_principal').load('pasarela_mp.php');
      	break;
		  case 'pasarela_pago_efec':
       		$('#container_principal').load('pasarela_pago_efect.php');
      	break;
		  case 'planes':
			$('#container_principal').load('plan.php');
	   break;
	   case 'contactos':
			$('#container_principal').load('contacto.php');
	   break;
        case 'cerrar':
          //$('#area_principal').load('../index.php');
          window.location='login.php';
        break;
        case 'inicio':
          //$('#area_principal').load('../index.php');
          window.location='principal.php';
        break;
        
  	} 
}

