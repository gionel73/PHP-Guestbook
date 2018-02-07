<?php 
	require_once('dbconnect.php');
	$sql = "DELETE FROM guestbook WHERE id = :id";
	$q = $conn->prepare($sql);
	$result = $q->execute(
		array(
				':id'		=> $_REQUEST['id']
			)
	);
	
	if($result){
		echo "Successful";
		echo "<BR>";
		echo "<a href='viewguestbook.php'>View guestbook</a>";
	}