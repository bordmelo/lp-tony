<?php		

  define('DB_NAME', 'tony');	

  define('DB_USER', 'root');

  define('DB_PASSWORD', 'root');

  define('DB_HOST', 'localhost');	

  if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

  if ( !defined('BASEURL') )		
    define('BASEURL', 'tony.test/server');

  if ( !defined('DBAPI') )		
    define('DBAPI', ABSPATH . 'inc/database.php');
  
?>