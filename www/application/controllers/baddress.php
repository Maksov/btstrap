<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Baddress extends MY_Controller {
	
	
	function __construct()
	{	
		parent::__construct();
		$this->hasNav=FALSE;
        $this->css=array("user.css");
        $sql=$this->db->query("SELECT * FROM adm_organ");
        $rows=$sql->result();
        $this->data=array("adm_organs"=>$rows);
	}


	public function index(){

        if($id_admorg=$this->input->post('admorg')) {

            $sql=$this->db->query("SELECT faces.short_fio, dolznost.title as dolznost, otdel.title as otdel, faces.room, faces.phone_number, faces.phone_vts
                                FROM faces
                                INNER JOIN dolznost ON faces.id_fk_dolz=dolznost.id
                                INNER JOIN otdel ON faces.id_fk_otd=otdel.id
                                WHERE otdel.id_fk_admorg=$id_admorg");
            $rows=$sql->result();
            $this->data['rows']=$rows;
            $this->data['id_admorg']=$id_admorg;
            $this->_render("pages/index");

        } else {

            $sql=$this->db->query("SELECT faces.short_fio, dolznost.title as dolznost, otdel.title as otdel, faces.room, faces.phone_number, faces.phone_vts
                                FROM faces
                                INNER JOIN dolznost ON faces.id_fk_dolz=dolznost.id
                                INNER JOIN otdel ON faces.id_fk_otd=otdel.id");
            $rows=$sql->result();
            $this->data['rows']=$rows;
            $this->_render("pages/index");

        }

	}



   private  function _getContentPage($url){
        $c = curl_init($url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, 1);
        $text = curl_exec($c);
        curl_close($c);
        return $text;
    }

    public function search() {

        $cbr_xml = str_replace(array("\n","\r","\t"),"", $this->_getContentPage('http://www.cbr.ru/scripts/XML_daily.asp?date_req='.date('d/m/Y',strtotime("+1 day"))));

        if(preg_match_all('~<Valute.*?>(.*?)</Valute>~i',$cbr_xml,$Valute)){

            $table="<table class='tablesorter'><thead><tr><th>Код</th><th>Сокращение</th><th>Количество</th><th>Наименование</th><th>Стоимость</th></tr></thead><tbody>";
            foreach($Valute[1] as $data){
                $table.="<tr>";
                preg_match('~<NumCode>(.*?)</NumCode>~i',$data,$NumCode);
                $table.="<td>".$NumCode[1]."</td>";
                preg_match('~<CharCode>(.*?)</CharCode>~i',$data,$CharCode);
                $table.="<td>".$CharCode[1]."</td>";
                preg_match('~<Nominal>(.*?)</Nominal>~i',$data,$Nominal);
                $table.="<td>".$Nominal[1]."</td>";
                preg_match('~<Name>(.*?)</Name>~i',$data,$Name);
                $table.="<td>".$Name[1]."</td>";
                preg_match('~<Value>(.*?)</Value>~i',$data,$Value);
                $table.="<td>".$Value[1]."</td>";
                $table.="</tr>";
            }
            $table.="</tbody></table>";
        }
            echo $table;
}

}