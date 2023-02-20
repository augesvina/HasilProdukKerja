<?php
class M_Tiket extends CI_Model {

function getDataTiket() {
    $query = $this->db->get('tbl_tiket');
    return $query->result();
}
}