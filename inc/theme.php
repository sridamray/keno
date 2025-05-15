<?php

namespace Keno;

if (! defined ('ABSPATH')) {
    exit;
}
 
final class Theme 
{

    /*

     */

     private static $instance = null;

     public static function  instance(){
        if (is_null(self::$instance)){
            self::$instance = new self();
        }

        return self::$instance;
     }



     public function __construct() {
		$this->include_files();
	}

    
	/**
	 * Function to include files
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function include_files() {
		require_once get_template_directory() . '/inc/autoload.php';

		
	}



    
}



