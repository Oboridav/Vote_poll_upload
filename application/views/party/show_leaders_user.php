<h1>Poll</h1>
<TABLE BORDER="1">
	<TR><TH>Leader</TH><TH>Party</TH></TR>
	<?php
	foreach ($members as $row) {
		echo '<tr><td>'.$row['member'].'</td>';
		echo '<td>'.$row['party'].'</td></tr>';
	}
	?>

</TABLE>
