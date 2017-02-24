<h1>Delete parties</h1>
<TABLE BORDER="1">
	<TR><TH>Party</TH><TH>Number of votes</TH><TH>Delete selected</TH></TR>
	<?php
	foreach ($parties as $row) {
		echo '<tr><td>'.$row['party'].'</td>';
		echo '<td>'.$row['votes'].'</td>';
		echo '<td>';
		echo '<button><a href="'.site_url('party_admin/remove_party').'/'.
		$row['id_parties'].'">Delete</a></button>';
		echo '</td></tr>';
	}
	?>
</TABLE>