<?php
	require_once("init.php");
	

	$query = dbClass::dbSelectQuery("
		SELECT * FROM usermaster
	", '', 'ct');

	echo print_r($query, true);

?>