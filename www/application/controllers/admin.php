<?php


class Admin extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->hasNav=FALSE;
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
        $this->css=array('user.css');
    }

    public function index() {

        if ($this->ion_auth->logged_in()) {

            if($this->ion_auth->is_admin()) {

                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                //list the users
                $this->data['users'] = $this->ion_auth->users()->result();
                $user = $this->ion_auth->user()->row();
                $this->data['username']=$user->first_name;
                foreach ($this->data['users'] as $k => $user)
                {
                    $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
                }
                $this->_render("/pages/admin");

            } else redirect("/admin/operator",'refresh');


        } else redirect('/auth/login','refresh');

    }

    public function operator() {

        if ($this->ion_auth->logged_in()) {

            if(!$this->ion_auth->is_admin()) {

                $user=$this->ion_auth->user()->row();
                $groups=$this->ion_auth->get_users_groups($user->id)->result();


            } else redirect("/admin/",'refresh');


        } else redirect('/auth/login','refresh');

    }

    public function create_user() {


    }

    public function delete_user() {


    }

    public function create_phone()  {


    }

    public function  update_phone() {


    }

    public function  delete_phone() {


    }


}