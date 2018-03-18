<?php

class admin_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function userSearch() {
        return $this->db->select("SELECT * FROM users ");
    }

}
