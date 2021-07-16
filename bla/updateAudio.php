<?php

//this will print out the received name, temp name, type, size, etc.
$input = $_FILES['audio_data']['tmp_name']; //get the temporary name that PHP gave to the uploaded file
//letting the client control the filename is a rather bad idea
$output ="audios/".$_FILES['audio_data']['name'].".ogg";
//move the file from temp name to local folder using $output name
move_uploaded_file($input, $output);

?>