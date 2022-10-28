<?php 
 if ( is_session_started() === FALSE ) session_start();
ini_set('display_errors','On');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
    

	class connection_db_con_dbclass
	{
		public $connection_db_con; 
		function __construct()
		{
			$url = $_SERVER['HTTP_HOST'];
			
			if($url == 'www.virktraders.com.pk' || $url == 'virktraders.com.pk') {
				$this->connection_db_con=new mysqli("localhost","virktraders","Virk@7860","virk_traders");
			}else{
				$this->connection_db_con=new mysqli("localhost","root","","virk_traders");
			}
			
			
			if ($this->connection_db_con) {
				$this->prefix="";
				$this->tables=array('products');  
				//echo "connect";
			}else{
				echo "error";
			}
		}
	} 
function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}
 ?>