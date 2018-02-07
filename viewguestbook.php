<?php 
	require_once('dbconnect.php');
	$sql = "SELECT * FROM guestbook ORDER BY datetime DESC";
	$q   = $conn->prepare($sql);
	$q->execute();
	
	$q->bindColumn(1, $id, PDO::PARAM_INT);
	$q->bindColumn(2, $name);
	$q->bindColumn(3, $email);
	$q->bindColumn(4, $comment);
	$q->bindColumn(5, $datetime);
	
?><table width="400" border="0" align="center" cellpadding="3" cellspacing="0">
<tr>
	<td>
		<strong>View Guestbook | <a href="guestbook.php">Sign Guestbook</a></strong>
	</td>
</tr>
</table>
<br>
<table width="80%" align="center" cellpadding="0" cellspacing="1" border="0">
	<thead>
		<tr>
			<th align="left"><b>ID</b></th>
			<th align="left"><b>Name</b></th>
			<th align="left"><b>Email</b></th>
			<th align="left"><b>Comment</b></th>
			<th align="left"><b>Date/Time</b></th>
			<th align="left"><b>Options</b></th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = $q->fetch()): ?>
		<tr>
			<td align="left"><?php echo $id; ?></td>
			<td align="left"><?php echo ucwords($name); ?></td>
			<td align="left"><?php echo $email; ?></td>
			<td align="left"><?php echo $comment; ?></td>
			<td align="left"><?php echo $datetime; ?></td>
			<td align="left"><a href="guestbook.php?id=<?php echo $id; ?>">Edit</a> | <a onclick="return confirm('Are you sure you want to delete this guestbook?')" href="deleteguestbook.php?id=<?php echo $id; ?>">Delete</a></td>
		</tr>
		<?php endwhile; ?>
	</tbody>	
</table>