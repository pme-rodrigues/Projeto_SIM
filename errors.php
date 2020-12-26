
<?php
 function errors_print($errors){
	if (count($errors) > 0 AND empty($errors) != TRUE){
		echo '<div class="error">';
		foreach($errors as $error){
			echo '<p>'. $error .'</p>';
		}
		echo '</div>';
	}	
 }
?>