<?php
	require_once("init.php");
	
	//Call main program function

	// instantiate graphql class and authenticate
//	$graphql = new graphqlClass;
	
	// add test value
	$testArray = array(
		"2267" => "This is a test",
		"2268" => "This is a test",
		"2269" => "This is a test",
		"2270" => "This is a test",
		"2271" => "12345",
		"2284" => "David Weiner"
	);
	$smp_response = $graphql->updateAttributeValues( $testArray, "2022-11-15T00:00:00Z" );

	// Retrieve records
	$startTime = "2022-11-01T15:00:00Z";
	$endTime = "2022-11-16T00:00:00Z";

	$smp_response = $graphql->getAttributeRecordsByDate( $startTime, $endTime );

//console_log($smp_response, TRUE);
	$tmp = json_decode( $smp_response, TRUE );
echo print_r($tmp);

	foreach($tmp['data']['getRawHistoryDataWithSampling'] as $record) {
		// get value
		if( $record['dataType'] == "STRING" ) {
			$value = $record['stringvalue'];
		} else {
			$value = $record['intvalue'];
		}
		
		$record['ts'] = str_replace( "+00:00", "", $record['ts'] );
		$record['ts'] = str_replace( "T", " ", $record['ts'] );
		echo "Time: " . $record['ts'] . ", ID: " . $record['id'] . ", Name: " . $graphql->getAttributeDescription( $record['id'] ) . ", Value: " . $value . "<br/>";
	}
	
console_log("Response from SM Platform was... ");
console_log(json_encode($smp_response, JSON_PRETTY_PRINT));
console_log("");
/*
$query = dbClass::dbInsertQuery("
	INSERT INTO `cesmii`
	(`Workgroup`, `Workcell`, `Code`, `OperationNumber`, `TimeModified`)
	VALUES ('test workgroup', 'test workcell', 'test code', 5, '" . date('Y-m-d H:i:s') . "')
", '', 'ct');

$rows = dbClass::dbSelectQuery('SELECT * FROM cesmii', '', 'ct');
echo print_r($rows);
*/

?>