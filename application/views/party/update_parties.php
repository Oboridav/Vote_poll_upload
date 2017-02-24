<h1>Update parties</h1>
<FORM method="POST" action="<?php echo site_url('party_admin/update_parties'); ?>">
<TABLE>
	<TR><TH>Party</TH><TH>Number of votes</TH></TR>
	<?php
	foreach ($parties as $row) {
		echo '<input type="hidden" name=id[] value="'.$row['id_parties'].'"/>';
		echo '<tr><td><input type="text" name="fn[]" value="';
			echo $row['party'];
			echo '"/></td>';
		echo '<td><input type="text" name="ln[]" value="';
			echo $row['votes'];
			echo '"/></td></tr>';
	}
	?>
	<tr><td></td><td><input type="submit" name="btnSave" value="Save"/></td>
</TABLE>