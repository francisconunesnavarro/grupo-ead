<?php

Class Auth extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * LOGIN
     * @param string $name or $email
     * @param string $password
     * @return string OK, NOTFOUND, ERROR
     */
    function login($login, $password) {
        $query = $this->db->select('*')
                        ->from('users')
                        ->where('password', $password)
                        ->where('email', $login)
                        ->limit(1)
                        ->get()->row_array();

        if (!empty($query)) {
            return $query['id'];
        } else {
            $query2 = $this->db->select('*')
                            ->from('users')
                            ->where('password', $password)
                            ->where('name', $login)
                            ->limit(1)
                            ->get()->row_array();

            if (!empty($query2)) {
                return $query2['id'];
            } else {
                return "NOTFOUND";
            }
        }
    }

}

?>