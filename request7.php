<?php
	require_once("init.php");
	
	//Call main program function

	// instantiate graphql class and authenticate

	// Retrieve records
	$startTime = "2023-01-01T01:00:00Z";
	$endTime = "2023-01-31T23:00:00Z";

	$smp_response = $graphql->getAttributeRecordsByDate( $startTime, $endTime );

//console_log($smp_response, TRUE);
	$tmp = json_decode( $smp_response, TRUE );
//print("<pre>" . print_r($tmp, true) . "</pre>");

$tmp2 = $tmp['data']['getRawHistoryDataWithSampling'];	
	foreach( $tmp2 as $key => $row ) {
		$ts[$key] = $row['ts'];
	}
	array_multisort($ts, SORT_DESC, $tmp2);
//print("<pre>" . print_r($tmp2, true) . "</pre>");
	
	$oldTimeStamp = '';
	
//	foreach($tmp['data']['getRawHistoryDataWithSampling'] as $record) {
	foreach($tmp2 as $record) {
		// get value
		if( $record['dataType'] == "STRING" ) {
			$value = $record['stringvalue'];
		} else {
			$value = $record['intvalue'];
		}
		
		$record['ts'] = str_replace( "+00:00", "", $record['ts'] );
		$record['ts'] = str_replace( "T", " ", $record['ts'] );
		
		if( $oldTimeStamp != $record['ts'] ) {
			$oldTimeStamp = $record['ts'];
			echo '---------------------------' . '<br />';
		}
		echo "Time: " . $record['ts'] . ", ID: " . $record['id'] . ", Name: " . $graphql->getAttributeDescription( $record['id'] ) . ", Value: " . $value . "<br/>";
	}
	
console_log("Response from SM Platform was... ");
console_log(json_encode($smp_response, JSON_PRETTY_PRINT));
console_log("");

?>