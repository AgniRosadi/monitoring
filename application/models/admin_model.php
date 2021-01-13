<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class admin_model extends CI_Model
{
	public function getAdmin()
	{
		$sql = "SELECT pemasukan, id_parsial from data_parsial";
		return $this->db->query($sql)->result();
	}
}
