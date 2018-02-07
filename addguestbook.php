<?php
	require_once('dbconnect.php');
	$id = (int) $_REQUEST['id'];
	if ( $id > 0 ) {
		$sql = "UPDATE guestbook SET name = :name, email = :email, comment = :comment  WHERE id = :id";
		$q = $conn->prepare($sql);
		
		$result = $q->execute(
			array(
					':name'		=> $_POST['name'], 
					':email'	=> $_POST['email'], 
					':comment'	=> $_POST['comment'], 
					':id'	=> $id
				)
		);
	}
	else {
		$sql = "INSERT INTO guestbook (name, email, comment, datetime) VALUES (:name,:email,:comment,:datetime)";
		$q = $conn->prepare($sql);
		$datetime=date("Y-m-d H:i:s"); //date time
		$result = $q->execute(
			array(
					':name'		=> $_POST['name'], 
					':email'	=> $_POST['email'], 
					':comment'	=> $_POST['comment'], 
					':datetime'	=> $datetime
				)
		);
	}
	
	if($result){
		echo "Successful";
		echo "<BR>";
		echo "<a href='viewguestbook.php'>View guestbook</a>";
	}
	else{
		die("Execute query error, because: ". print_r($conn->errorInfo(), true));
	}