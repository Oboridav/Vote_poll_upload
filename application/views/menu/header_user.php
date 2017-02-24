 <?php
 include "libchart/classes/libchart.php";
 ?>
 
<!DOCTYPE html>
<html>
<head>
<title>Vote poll 2017</title>
 <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>/css/mystyle.css"> 
</head>
<body>

<h1>Welcome, user!, to the Vote poll 2017!</h1>
<ul>

	<li><a href="<?php echo site_url('party_user/start_show_parties');?>">Show parties</a></li>
	<li><a href="<?php echo site_url('party_user/vote');?>">VOTE!</a></li>
	<li><a href="<?php echo site_url('party_user/start_show_members');?>">Show members</a></li>
</ul>

