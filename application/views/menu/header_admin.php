 <?php
 include "libchart/classes/libchart.php";
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Vote poll 2017</title>
 <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>/css/mystyle.css"> 
</head>
<body>

<h1>Welcome, admin!, to the Vote poll 2017!</h1>
<ul>
	<li><a href="<?php echo site_url('party_admin/show_parties');?>">Show parties</a></li>
	<li><a href="<?php echo site_url('party_admin/show_members');?>">Show members</a></li>
	<li><a href="<?php echo site_url('party_admin/add_parties');?>">Add a party</a></li>
	<li><a href="<?php echo site_url('party_admin/delete_parties');?>">Delete a party</a></li>
	<li><a href="<?php echo site_url('party_admin/update_parties');?>">Update parties</a></li>
	<li><a href="<?php echo site_url('party_admin/vote');?>">VOTE!</a></li>
	<li><a href="<?=base_url('./The vote poll application.docx')?>" target="_blank">Show page document</a></li>
</ul>

