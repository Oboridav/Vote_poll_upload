<h1>Poll</h1>
<TABLE BORDER="1">
	<TR><TH>Party</TH><TH>Number of votes</TH></TR>
	<?php
	foreach ($parties as $row) {
		echo '<tr><td>'.$row['party'].'</td>';
		echo '<td>'.$row['votes'].'</td></tr>';
	}
	?>
</TABLE>
