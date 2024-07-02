<?php  
	$db = mysqli_connect( "localhost", "root", "", "property_rental" );

	if ( $db )  {
		// echo "Database Connection Successfully";
	}
	else {
		die("Mysqli_Error." . mysqli_error($db));
	}
?>