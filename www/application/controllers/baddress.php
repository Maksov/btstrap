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

        if(($litera=$this->input->post('rbt'))&&($admorgan=$this->input->post('admorgan')))  echo "Vse OK";
            else $this->_render('welcome_message');
		
		
		
		//;
	}
	
}