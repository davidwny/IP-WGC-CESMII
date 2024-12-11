<?php
	// debug
	define('DEBUG', TRUE);
	if(DEBUG === TRUE) {
		error_reporting(E_ALL);
		ini_set("display_errors", 1);	
	}
	
	// password gen
	define('PEPPER', '');
		
	// get directory separator dealt with
	if( PHP_OS == 'WINNT' ) {
		define( 'DS', '/' );
	} else {
		define( 'DS', DIRECTORY_SEPARATOR );
	}

	// server defines
	define('SUBDIR', 'CESMII' . DS);
	define("SERVER_ROOT", $_SERVER['DOCUMENT_ROOT'] . DS . SUBDIR);
	define("SERVER_CLASSES", SERVER_ROOT . "classes" . DS);
	define("SERVER_CSS", SERVER_ROOT . "css" . DS);
	define("SERVER_IMAGES", SERVER_ROOT . "images" . DS);
	define("SERVER_INCLUDES", SERVER_ROOT . "includes" . DS);
	define("SERVER_CONFIG", SERVER_ROOT . "config" . DS);
	define("SERVER_CONFIG_FILE", SERVER_CONFIG . 'config.ini');
	
	
	// browser defines
	if(isset($_SERVER['HTTPS']) == true) {
		define("HOST_PROTOCOL", "https://");
	} else {
		define("HOST_PROTOCOL", "//");
	}
	
	define("BROWSER_ROOT", HOST_PROTOCOL . $_SERVER["HTTP_HOST"] . DS . SUBDIR);
	define("BROWSER_CSS", BROWSER_ROOT . "css" . DS);
	define("BROWSER_IMAGES", BROWSER_ROOT . "images" . DS);
	define("BROWSER_AUDIO", BROWSER_ROOT . "audio" . DS);
	define("BROWSER_AJAX", BROWSER_ROOT . "ajax" . DS);
	define("BROWSER_JS", BROWSER_ROOT . "js" . DS);
	define("BROWSER_INCLUDES", BROWSER_ROOT . "includes" . DS);
	
	// set default time zone
	date_default_timezone_set('America/New_York'); 

	// Default DB select
	define('DEFAULT_DB_SELECT', 'ipro');
	
	// version
	define( 'VERSION', '1.3');
	
	// define for file transfers
	define('FILE_NO_ERROR', 0);
	define('FILE_INVALID_TYPE', 1);
	define('FILE_TRANSFER_FAIL', 2);
	define('FILE_MISSING_FILE', 3);
	define('FILE_SYSTEM_ERROR', 4);
	
	// AJAX defines
	// AJAX Constants
	define('AJAX_STATUS_OK', 0);
	define('AJAX_STATUS_FAIL', 1);
	define('AJAX_STATUS_MISSING_CONFIG', 2);
	define('AJAX_STATUS_FAIL_SESSION', 3);
	define('AJAX_STATUS_INVALID_PARAMS_BUNDLE', 4);
	
	/************************************/
	// requires for global classes
	require_once(SERVER_CLASSES . "config.class.php");
	require_once(SERVER_CLASSES . "db.class.php");
	require_once(SERVER_CLASSES . "sanitize.class.php");
	require_once(SERVER_CLASSES . "error.class.php");
	require_once(SERVER_CLASSES . "errorLog.class.php");
	require_once(SERVER_CLASSES . "graphql.class.php");
	
	// HTTP includes for CESMII
	require_once (SERVER_INCLUDES . 'PEAR/Exception.php');
	require_once (SERVER_INCLUDES . 'Net/URL2.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2.php');

	require_once (SERVER_INCLUDES . 'HTTP/Request2/Exception.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2/Adapter.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2/ConnectionException.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2/CookieJar.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2/LogicException.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2/MessageException.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2/NotImplementedException.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2/Response.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2/SocketWrapper.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2/SOCKS5.php');

	require_once (SERVER_INCLUDES . 'HTTP/Request2/MultipartBody.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2/Response.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2/Adapter/Curl.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2/Adapter/Mock.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2/Adapter/Socket.php');
	require_once (SERVER_INCLUDES . 'HTTP/Request2/Observer/UncompressingDownload.php');
	
	require_once (SERVER_INCLUDES . 'debugOutput.php');

	// init
	configClass::getConfigFromFile();
	
	// CESMII defines
	define('INSTANCE_GRAPHQL_ENDPOINT', 'https://interfacetech.cesmii.thinkiq.net/graphql');

	/* These values come from your Authenticator, which you configure in the Developer menu > GraphQL Authenticator
		Rather than binding this connectivity directly to a user, we bind it to an Authenticator, which has its own
		credentials. The Authenticator, in turn, is linked to a user -- sort of like a Service Principle.
		In the Authenticator setup, you will also configure role, and Token expiry. */
	define('CLIENT_ID', 'RobotDataSend');
	define('CLIENT_SECRET', 'Freedom5!!');
	define('USER_NAME', 'Interfacetech27');
	define('ROLE', 'interfacetech_group');
	
	define('CONSOLE_DEBUG', FALSE);
	
	// instantiate graphql class and authenticate
	$graphql = new graphqlClass;
	
	define('WORKGROUP', 'AUTOSERGER01');
	define('WORKCELL', 'A');
	define('ACTION_SET_ERROR', 1);
	define('ACTION_NO_SIGNON', 2);
	

?>