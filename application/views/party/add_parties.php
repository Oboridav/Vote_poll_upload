<h1>Add new party</h1>
<FORM action="<?php echo site_url('party_admin/add_parties'); ?>" method="POST">
<TABLE>
	<TR><TD>Party</TD><TD><input type="text" name="fn" placeholder="Write your party" required="" /></TD></TR>
	<TR><TD>Number of votes</TD><TD><input type="text" name="ln"/></TD></TR>
	<TR><TD></TD><TD><input type="submit" name="btnSave" value="Save"/></TD></TR>
</TABLE>
</FORM>

<?php

if (isset($test)) {
	if ($test)
		echo 'Data Inserted';
	else 
		echo 'Something went wrong';
}
?>