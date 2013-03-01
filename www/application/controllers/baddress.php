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

        $this->css=array("user.css");

        if(($litera=$this->input->post('rbt'))&&($admorgan=$this->input->post('admorgan')))  echo "Vse OK";
            else $this->_render('welcome_message');
		//;
	}


    public function otdel(){


       $sql=$this->db->query("SELECT * FROM adm_organ");
        foreach ($sql->result() as $row)
        {
            echo $row->id;
            echo ' | ';
            echo $row->title;
            echo ' | ';
            echo $row->short_title;
            echo '</br>';
        }

        echo 'Total Results: ' . $sql->num_rows();


    }

    public function search() {
        $this->javascript=array("ajax_litera.js");
        $this->css=array("user.css");
        $this->_render('pages/search.php');

    }

}