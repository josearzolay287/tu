<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
</head>
<?php
session_start();
 
function loginForm(){
    echo'
    <div id="loginform">
    <form action="index.php" method="post">
        <p>Porfavor ingresar nombre de usuario:</p>
        <label for="name">User:</label>
        <input type="text" name="name" id="name" />
        <input type="submit" name="enter" id="enter" value="Enter" />
    </form>
    </div>
    ';
}
 
if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else{
        echo '<span class="error">Porfavor ingresar nombre de usuario</span>';
    }
}

if(!isset($_SESSION['name'])){
    loginForm();
}
else{
?>
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>    
    <div id="chatbox"><?php
if(file_exists("log.html") && filesize("log.html") > 0){
    $handle = fopen("log.html", "r");
    $contents = fread($handle, filesize("log.html"));
    fclose($handle);
     
    echo $contents;
}
?></div>
     
    <form name="message" action="" method=""> 
        <input name="text" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div>

<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
    //If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Seguro desea Salir?");
		if(exit==true){window.location = 'index.php?logout=true';}		
	});
    //If user submits the form
	
    	//Reload file every 2500 ms or x ms if you wish to chan
});
//Load the file containing the chat log
//Load the file containing the chat log
//If user submits the form
$("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
        $.post( "post.php",{text: clientmsg}, function( data ) {
  console.log( data );
});
	//	$.post("post.php", {text: clientmsg});				
		$("#usermsg").attr("value", "");
		return false;
	});
    function loadLog(){		
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
        //console.log("hola")
		$.ajax({
			url: "log.html",
			cache: false,
			success: function(html){		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div	
				
				//Auto-scroll			
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	},
		});
	}setInterval (loadLog, 1500);
</script>
<?php
}
if(isset($_GET['logout'])){ 
     
    //Simple exit message
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has left the chat session.</i><br></div>");
    fclose($fp);
     
    session_destroy();
    header("Location: index.php"); //Redirect the user
}
?>

</body>
</html>