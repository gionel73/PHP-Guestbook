<?php
	require_once('dbconnect.php');
	$sql = "SELECT * FROM guestbook WHERE id = :id";
	$q = $conn->prepare($sql);
	$result = $q->execute(
		array(
				':id'		=> $_POST['id'], 
				':email'	=> $_POST['email'], 
				':comment'	=> $_POST['comment'], 
				':datetime'	=> $datetime
			)
	);
	if($result){
		echo "Successful";
		echo "<BR>";
		echo "<a href='viewguestbook.php'>View guestbook</a>";
	}
	else{
		die("Execute query error, because: ". print_r($conn->errorInfo(), true));
	}