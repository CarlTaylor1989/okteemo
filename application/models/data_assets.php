<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_assets extends MY_Model {

    function __construct()
    {
        parent::__construct();
    }

    function champion_id($champId)
    {
    	$query = $this->db->query('SELECT name FROM champions WHERE id = '.$champId);

    	if($query->num_rows() <= 0)
    	{
    		return false;
    	} 
    	else 
    	{
            foreach ($query->result_array() as $row) {
                $datas[] = $row;
            }
	    	return $datas[0]['name'];
    	}
    }
}