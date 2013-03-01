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

        $sql=$this->db->query("SELECT * FROM adm_organ");
        foreach ($sql->result() as $row)
        {
            $rows[]=array("id"=>$row->id, "title"=>$row->title, "short_title"=>$row->short_title);
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

    function json_safe_encode($value) {

        if (is_int($value)) {
            return (string)$value;
        } elseif (is_string($value)) {
            $value = str_replace(array('\\', '/', '"', "\r", "\n", "\b", "\f", "\t"),
                array('\\\\', '\/', '\"', '\r', '\n', '\b', '\f', '\t'), $value);
            $convmap = array(0x80, 0xFFFF, 0, 0xFFFF);
            $result = "";
            for ($i = mb_strlen($value) - 1; $i >= 0; $i--) {
                $mb_char = mb_substr($value, $i, 1);
                if (mb_ereg("&#(\\d+);", mb_encode_numericentity($mb_char, $convmap, "UTF-8"), $match)) {
                    $result = sprintf("\\u%04x", $match[1]) . $result;
                } else {
                    $result = $mb_char . $result;
                }
            }
            return '"' . $result . '"';
        } elseif (is_float($value)) {
            return str_replace(",", ".", $value);
        } elseif (is_null($value)) {
            return 'null';
        } elseif (is_bool($value)) {
            return $value ? 'true' : 'false';
        } elseif (is_array($value)) {
            $with_keys = false;
            $n = count($value);
            for ($i = 0, reset($value); $i < $n; $i++, next($value)) {
                if (key($value) !== $i) {
                    $with_keys = true;
                    break;
                }
            }
        } elseif (is_object($value)) {
            $with_keys = true;
        } else {
            return '';
        }
        $result = array();
        if ($with_keys) {
            foreach ($value as $key => $v) {
                $result[] = json_safe_encode((string)$key) . ':' . json_safe_encode($v);
            }
            return '{' . implode(',', $result) . '}';
        } else {
            foreach ($value as $key => $v) {
                $result[] = json_safe_encode($v);
            }
            return '[' . implode(',', $result) . ']';
        }
    }


}