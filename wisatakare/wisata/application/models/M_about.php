<?php
class M_About extends CI_Model {

function getDataAbout() {
    $query = $this->db->get('tbl_about');
    return $query->result();
}
}