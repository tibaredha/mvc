<?php

class Model {
//$this->db->exec('SET NAMES utf8'); POUR PRISE EN CHAREGE ARABE 
	function __construct() {
		$this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
		
	}
	
	
	

}