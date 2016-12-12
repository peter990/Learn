<?php
	if(isset($_FILES['picture']))
	{
		//$filetype = $_FILES['picture']['type']; 
		//if($filetype == 'image/jpeg'){
		//	$type ='.jpg'; 
		//} 
		//if ($filetype == 'image/jpg') { 
		//	$type ='.jpg'; 
		//} 
		//	if ($filetype == 'image/pjpeg') { 
		//	$type ='.jpg'; 
		//} 
		//if($filetype == 'image/gif'){ 
		//	$type ='.gif'; 
		//} 
		$target_path = "Textures/";
		$target_path = $target_path.basename($_FILES['picture']['tmp_name']).'.png';
		echo file_get_contents($_FILES['picture']['tmp_name']);
		if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_path)) {
			echo "The file ".  basename( $_FILES['picture']['tmp_name']).
				" has been uploaded";
		} else{
			  echo "There was an error uploading the file, please try again!";
		}
		//$bool = move_uploaded_file($_FILES['picture']['tmp_name'],'/htdocs/php/Textures/notice.png');
	}
?>