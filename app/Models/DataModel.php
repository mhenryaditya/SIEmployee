<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    public function getQuery()
    {
        $query = $this->db->query("SELECT agenda_semester.kode_agenda, ket_agenda_semester.keterangan, agenda_semester.kode_smt, agenda_semester.date_open, agenda_semester.date_close FROM agenda_semester INNER JOIN ket_agenda_semester ON agenda_semester.kode_agenda = ket_agenda_semester.kode_agenda;");
        return $query->getResultArray();
    }
}