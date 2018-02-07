<?php 
	$id 		= null;
	$name 		= null;
	$email 		= null;
	$comment 	= null;
	if( isset( $_GET['id'] ) && (int)$_GET['id'] > 0) {
		require_once('dbconnect.php');
		$sql = "SELECT * FROM guestbook WHERE id = :id";
		$q = $conn->prepare($sql);
		$q->execute( array(':id' => (int) $_GET['id'] ));		
		
		$q->bindColumn(1, $id, PDO::PARAM_INT);
		$q->bindColumn(2, $name);
		$q->bindColumn(3, $email);
		$q->bindColumn(4, $comment);

		$row = $q->fetch();
	}
?>
<table width="400" border="0" align="center" cellpadding="3" cellspacing="0">
<tr>
	<td>
		<strong>Test Sign Guestbook </strong>
	</td>
</tr>
</table>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
	<form id="form1" name="form1" method="post" action="addguestbook.php">
		<td>
			<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
			<tr>
				<td width="117">
					Name
				</td>
				<td width="14">
					:
				</td>
				<td width="357">
					<input name="name" type="text" id="name" value="<?php echo htmlentities($name) ;?>" size="50"/>
				</td>
			</tr>
			<tr>
				<td>
					Email
				</td>
				<td>
					:
				</td>
				<td>
					<input name="email" type="text" id="email" value="<?php echo htmlentities($email) ;?>" size="50"/>
				</td>
			</tr>
			<tr>
				<td valign="top">
					Comment
				</td>
				<td valign="top">
					:
				</td>
				<td>
					<textarea name="comment" cols="40" rows="3" id="comment"><?php echo htmlentities($comment) ;?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					&nbsp;
				</td>
				<td>
					&nbsp;
				</td>
				<td>
					<input type="submit" name="Submit" value="Submit"/><input type="reset" name="Submit2" value="Reset"/>
					<input type="hidden" name="id" value="<?php echo $id ;?>"/>
				</td>
			</tr>
			</table>
		</td>
	</form>
</tr>
</table>
<table width="400" border="0" align="center" cellpadding="3" cellspacing="0">
<tr>
	<td>
		<strong><a href="viewguestbook.php">View Guestbook</a></strong>
	</td>
</tr>
</table>