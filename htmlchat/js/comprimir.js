if (!navigator.cookieEnabled) alert("Activa tus cookies para entrar al chat. Gracias.");

window.mobileAndTabletcheck = function() {
    var check = false;
    (function(a) {
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true;
    })(navigator.userAgent || navigator.vendor || window.opera);
    return check;
};

var contenidomovil = '<div style="display:none" id="cookie-banner" class="cookie"> Utilizamos cookies para optimizar su experiencia. <span class="button-info"><a href="https://tu-chat.com/privacidad" target="_blank">Política de privacidad</a></span> <span onclick="createAcceptCookie()" id="cookie-button" class="button-ok"><a href="#">Aceptar</a></span> </div> <iframe name="imgif" id="imgif" style="display:none" src="" title="Tu Chat img"></iframe> <div id="loading" style="position: absolute; top: 0; left: 0; z-index: 1002; width: 100vw; height: 100vh; background-color: rgba(192, 192, 192, 0.5); background-image: url(https://i.stack.imgur.com/MnyxU.gif); background-repeat: no-repeat; background-position: center;display: block;"></div> <div id="topcmm-123flashchat-userlistv2" class="topcmm-123flashchat-common-global-font-div" style="position: unset; display: none; height: auto; width: auto;"> <div style="z-index: 1;" class="topcmm-123flashchat-common-header"> <div class="topcmm-123flashchat-common-header-background" style="margin-left: auto; margin-right: auto; background: url(&quot;img/navidad/barra.gif&quot;) 0% 0% / auto; border-top: 1px solid rgba(255, 255, 255, 0.5); overflow: hidden; transition: all 0.5s ease 0s;"> <a id="topcmm-123flashchat-back-to-room" class="topcmm-123flashchat-common-header-left-add-arrow-btn" style="float: left; padding-top: 8px; width: 20%; height: 35px; border: none; border-radius: 20px; margin-top: -8px; }"> <span class="topcmm-123flashchat-common-header-title-text topcmm-123flashchat-text-shadow-dark-color" style="color:white;">Volver</span> </a> <span class="topcmm-123flashchat-common-header-title-text topcmm-123flashchat-text-shadow-dark-color">Usuarios</span><span style="position: absolute; right: 0px; color: white; margin: 10px; font-size: 20px;" id="contador-user">9</span> </div> <div id="topcmm-123flashchat-main-scroll-userlist-x" class="topcmm-123flashchat-roomlist-container topcmm-123flashchat-bottom-menu-area topcmm-123flashchat-add-head-area"> <div id="topcmm-123flashchat-userlist-containerx" class="topcmm-123flashchat-common-userlist-block topcmm-123flashchat-common-userlist-block-li-color"></div> </div> </div></div>';
var contenidopc = '<h1 class="ml16"> El Bunker </h1> <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe> <noscript> <p> Necesitas tener JavaScript activado para que el sitio funcione.</p> </noscript> <div style="display:none" id="cookie-banner" class="cookie center"> Utilizamos cookies para optimizar su experiencia. <span class="button-info"><a href="https://tu-chat.com/privacidad" target="_blank">Política de privacidad</a></span> <span onclick="createAcceptCookie()" id="cookie-button" class="button-ok"><a href="#">Aceptar</a></span> </div> <div style="display:none" id="cookie-bannerx" class="cookie center"> Tu-Chat está buscando testeadores de la página web con pagos remunerados si estás interesado envía un correo a admin@tu-chat.com <span onclick="createAcceptCookiex()" id="cookie-button" class="button-ok"><a href="#">Aceptar</a></span> </div> <iframe style="display:none" name="frame1x" id="frame1x" src=""></iframe> <form style="display: none;" action="uploadimg2.php" method="post" target="frame1x" enctype="multipart/form-data"> <input onchange="this.form.submit();" class="topcmm-123flashchat-file-input" type="file" name="file" id="topcmm-123flashchat-toolbar-style-send-image-btn-type2" accept="image/*"> <span class="topcmm-123flashchat-change-avatar-panel-upload-btn-text" style="left: 0px;">Cargar Avatar</span> </form> <iframe style="display:none" name="frame2x" id="frame2x" src=""></iframe> <form style="display: none;" action="uploadimg2.php" method="post" target="frame2x" enctype="multipart/form-data"> <input onchange="this.form.submit();" class="topcmm-123flashchat-file-input" type="file" name="file" id="topcmm-123flashchat-toolbar-style-send-image-btn-type3" accept="image/*"> <span class="topcmm-123flashchat-change-avatar-panel-upload-btn-text" style="left: 0px;">Cargar Avatar</span> </form>';

if (navigator.userAgent.match(/SAMSUNG|Samsung|SGH-[I|N|T]|GT-[I|N]|SM-[A|N|P|T|Z]|SHV-E|SCH-[I|J|R|S]|SPH-L/i)) {
    //movil
	$(document).ready(function() { $("body").append(contenidomovil); });
	$("head").append('<link rel="stylesheet" href="./css/font-awesome.min.css?203"> <script type="text/javascript" src="js/cookie.js?25"></script> <script type="text/javascript" src="./js/version.js?520"></script> <script type="text/javascript" src="./config/config9.js?16"></script> <script type="text/javascript" src="./js/loadingchat2.js?Beta690"></script> <script type="text/javascript" src="./js/scripts.js?Beta273"></script> <script type="text/javascript" src="./js/ping.js"></script>');
} else if (navigator.userAgent.match(/IN2013|ONEPLUS.*|GM.*|IN2.*/i)) {
    //movil
	$(document).ready(function() { $("body").append(contenidomovil); });
	$("head").append('<link rel="stylesheet" href="./css/font-awesome.min.css?203"> <script type="text/javascript" src="js/cookie.js?25"></script> <script type="text/javascript" src="./js/version.js?520"></script> <script type="text/javascript" src="./config/config9.js?16"></script> <script type="text/javascript" src="./js/loadingchat2.js?Beta690"></script> <script type="text/javascript" src="./js/scripts.js?Beta273"></script> <script type="text/javascript" src="./js/ping.js"></script>');
} else if (navigator.userAgent.match(/XT1092|moto.*|XT.*/i)) {
    //movil
	$(document).ready(function() { $("body").append(contenidomovil); });
	$("head").append('<link rel="stylesheet" href="./css/font-awesome.min.css?203"> <script type="text/javascript" src="js/cookie.js?25"></script> <script type="text/javascript" src="./js/version.js?520"></script> <script type="text/javascript" src="./config/config9.js?16"></script> <script type="text/javascript" src="./js/loadingchat2.js?Beta690"></script> <script type="text/javascript" src="./js/scripts.js?Beta273"></script> <script type="text/javascript" src="./js/ping.js"></script>');
} else if (navigator.userAgent.match(/Redmi.*/i)) {
    //movil
	$(document).ready(function() { $("body").append(contenidomovil); });
	$("head").append('<link rel="stylesheet" href="./css/font-awesome.min.css?203"> <script type="text/javascript" src="js/cookie.js?25"></script> <script type="text/javascript" src="./js/version.js?520"></script> <script type="text/javascript" src="./config/config9.js?16"></script> <script type="text/javascript" src="./js/loadingchat2.js?Beta690"></script> <script type="text/javascript" src="./js/scripts.js?Beta273"></script> <script type="text/javascript" src="./js/ping.js"></script>');
} else if (navigator.vendor != null && (navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i))){
	//movil2
	$(document).ready(function() { $("body").append(contenidomovil); });
	$("head").append('<link rel="stylesheet" href="./css/font-awesome.min.css?203"> <script type="text/javascript" src="js/cookie.js?25"></script> <script type="text/javascript" src="./js/version.js?520"></script> <script type="text/javascript" src="./config/config9.js?16"></script> <script type="text/javascript" src="./js/loadingchat.js?Beta690"></script> <script type="text/javascript" src="./js/scriptfinalbeta.js?Beta273"></script> <script type="text/javascript" src="./js/ping.js"></script>');
} else if (window.mobileAndTabletcheck() == true) {
    //movil2
	$(document).ready(function() { $("body").append(contenidomovil); });
	$("head").append('<link rel="stylesheet" href="./css/font-awesome.min.css?203"> <script type="text/javascript" src="js/cookie.js?25"></script> <script type="text/javascript" src="./js/version.js?520"></script> <script type="text/javascript" src="./config/config9.js?16"></script> <script type="text/javascript" src="./js/loadingchat.js?Beta690"></script> <script type="text/javascript" src="./js/scriptfinalbeta.js?Beta273"></script> <script type="text/javascript" src="./js/ping.js"></script>');
} else if (window.mobileAndTabletcheck() == false) {
    //pc
	$(document).ready(function() { $("body").append(contenidopc); });
	$("head").append('<link rel="stylesheet" href="./css/font-awesomepc.min.css?15"> <script type="text/javascript" src="js/cookie.js?25"></script> <script type="text/javascript" src="./config/config3.js?10233"></script> <script type="text/javascript" src="./webchat/pc2.js?20105"></script> <script type="text/javascript" src="./js/jquery.no-lag-scroll.js"></script>');
}