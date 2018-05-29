<?php

class Disciplines_Hooks {

    public function get_disciplines() {
        $ci = & get_instance();
        date_default_timezone_set('America/Sao_Paulo');
        $now = date('Y-m-d');
        $ci->load->model('Disciplines_Model');
        $disciplines = $ci->Disciplines_Model->get_disciplines();

        if (!empty($disciplines)) {
            foreach ($disciplines as $key => $d) {
                //checa se disciplina esta ativa
                $discipline = $ci->Disciplines_Model->get_discipline($d['disc_id']);
                if (($now >= $discipline['start_date_lessons'] && $now < $discipline['end_date_lessons']) || ($now > $discipline['start_date_lessons'] && $now <= $discipline['end_date_lessons'])) {
                    $disciplines[$key]['active'] = 1;
                } else {
                    $disciplines[$key]['active'] = 0;
                }
            }
        }

        $ci->disciplines = $disciplines;
    }

}

?>
