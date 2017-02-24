<h1>VOTE!</h1>
<TABLE BORDER="1">
	<TR><TH>Party</TH><TH>Number of votes</TH><TH>Vote for selected party</TH></TR>
	<?php
	foreach ($parties as $row) {
		echo '<tr><td>'.$row['party'].'</td>';
		echo '<td>'.$row['votes'].'</td>';
		echo '<td>';
		echo '<button><a href="'.site_url('party_user/add_vote').'/'.
		$row['id_parties'].'">VOTE</a></button>';
		echo '</td></tr>';
	}
	?>
</TABLE>