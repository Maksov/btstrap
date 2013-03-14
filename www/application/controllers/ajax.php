<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rails
 * Date: 27.02.13
 * Time: 11:35
 * To change this template use File | Settings | File Templates.
 */
class Ajax extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->hasNav=FALSE;
    }


    public function ajax_litera() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            redirect('/');
            die();
        }
        $sql=$this->db->query("SELECT faces.short_fio, dolznost.title as dolznost, otdel.title as otdel, faces.room, faces.phone_number, faces.phone_vts
                                FROM faces
                                INNER JOIN dolznost ON faces.id_fk_dolz=dolznost.id
                                INNER JOIN otdel ON faces.id_fk_otd=otdel.id");
        foreach ($sql->result() as $row)
        {
            $rows[]=array("short_fio"=>$row->short_fio, "dolznost"=>$row->dolznost, "otdel"=>$row->otdel, "room"=>$row->room,
                "phone_number"=>$row->phone_number, "phone_vts"=>$row->phone_vts);
        }
       echo preg_replace_callback(
           '/\\\u([0-9a-fA-F]{4})/',
           create_function('$match', 'return mb_convert_encoding("&#" . intval($match[1], 16) . ";", "UTF-8", "HTML-ENTITIES");'),
           json_encode($rows)
       );
    }

    public function ajax_otdel() {


    }

    public function ajax_search() {


    }





}