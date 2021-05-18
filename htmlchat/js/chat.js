function ocultarradio() {
    var coll = document.getElementsByClassName("collapsible");
    var i;
    var todos = "block";

	if(document.getElementsByClassName("content") != undefined) var content = document.getElementsByClassName("content")[0];
		else var content = undefined;
		
    caja = document.querySelectorAll("#topcmm-123flashchat-main-messageview");
    salasicon = $("div[id^='topcmm-123flashchat-room-tab-topcmm-']");

    if (content != undefined && content.style.display === "block") {

		
		for (i = 0; i < caja.length; i++) {
			document.getElementsByClassName("content")[i].style.display = "none";
		}

        todos = "none";
        document.getElementById("topcmm-123flashchat-common-userlist-block-container").style.height = "100%";
        document.getElementById("topcmm-123flashchat-side-userlistview-body").style.height = "94%";
        document.getElementById("topcmm-123flashchat-side-friendlistview-body").style.height = "94%";
        document.getElementById("topcmm-123flashchat-side-roomlistview-body").style.height = "94%";
        document.getElementById("buttonx").style.marginBottom = "1px";
        return;
    } else if (content != undefined && content.style.display.length == 0) {
		
		for (i = 0; i < caja.length; i++) {
			if(document.getElementsByClassName("content")[i] != null) document.getElementsByClassName("content")[i].style.display = "none";
		}
		
        todos = "none";
        document.getElementById("topcmm-123flashchat-common-userlist-block-container").style.height = "100%";
        document.getElementById("topcmm-123flashchat-side-userlistview-body").style.height = "94%";
        document.getElementById("topcmm-123flashchat-side-friendlistview-body").style.height = "94%";
        document.getElementById("topcmm-123flashchat-side-roomlistview-body").style.height = "94%";
        document.getElementById("buttonx").style.marginBottom = "1px";
        return;
    } else if(content != undefined){
        document.getElementById("topcmm-123flashchat-common-userlist-block-container").style.height = "100%";
        var $win = $(window);
        $("#topcmm-123flashchat-side-userlistview-body").height($win.height() - 260);
        $("#topcmm-123flashchat-side-friendlistview-body").height($win.height() - 260);
        $("#topcmm-123flashchat-side-roomlistview-body").height($win.height() - 260);
        document.getElementById("buttonx").style.marginBottom = "175px";
        
		for (i = 0; i < caja.length; i++) {
			if(document.getElementsByClassName("content")[i] != null) document.getElementsByClassName("content")[i].style.display = "block";
		}
		
        todos = "block";
        return;
    }


}

function ocultarradio2() {
    var coll = document.getElementsByClassName("collapsible");
    var i;
	
	if(document.getElementsByClassName("content") != undefined) var content = document.getElementsByClassName("content")[0];
		else var content = undefined;
		
    caja = document.querySelectorAll("#topcmm-123flashchat-main-messageview");
    salasicon = $("div[id^='topcmm-123flashchat-room-tab-topcmm-']");

    setTimeout(function() {


        if (content != undefined && content.style.display === "none") {

			for (i = 0; i < caja.length; i++) {
				if(document.getElementsByClassName("content")[i] != null) document.getElementsByClassName("content")[i].style.display = "none";
			}

            document.getElementById("topcmm-123flashchat-common-userlist-block-container").style.height = "100%";
            document.getElementById("topcmm-123flashchat-side-userlistview-body").style.height = "94%";
            document.getElementById("topcmm-123flashchat-side-friendlistview-body").style.height = "94%";
            document.getElementById("topcmm-123flashchat-side-roomlistview-body").style.height = "94%";
            document.getElementById("buttonx").style.marginBottom = "1px";

        } else if(content != undefined) {
			
			for (i = 0; i < caja.length; i++) {
				if(document.getElementsByClassName("content")[i] != null) document.getElementsByClassName("content")[i].style.display = "block";
			}
			
            document.getElementById("topcmm-123flashchat-common-userlist-block-container").style.height = "100%";
            var $win = $(window);
            document.getElementById("buttonx").style.marginBottom = "175px";
            $("#topcmm-123flashchat-side-userlistview-body").height($win.height() - 260);
            $("#topcmm-123flashchat-side-friendlistview-body").height($win.height() - 260);
            $("#topcmm-123flashchat-side-roomlistview-body").height($win.height() - 260);


        }




    }, 100);




}