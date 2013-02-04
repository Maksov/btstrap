<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Baddress extends MY_Controller {
	
	
	function __construct()
	{	

		parent::__construct();
		$this->hasNav=FALSE;
	}
	
	
	public function index(){	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		
		
		
		$this->_render('welcome_message');
	}
	
}