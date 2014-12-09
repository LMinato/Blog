<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_m extends CI_Model {
    public function add_user($donnees)
    {
        $sql = "INSERT MEMBRES VALUES (NULL,\"".$donnees['login']."\",\"".$donnees['email']."\",
        \"".$donnees['pass']."\",2,0) ;";
        $this->db->query($sql);
    }

    public function verif_connexion($donnees)
    {
        $sql = "SELECT id,droit,login,email,valide from MEMBRES WHERE login=\"".$donnees['login']."\"
        and pass=\"".$donnees['pass']."\";";
        $query=$this->db->query($sql);
        if($query->num_rows()==1)
        {
            $row=$query->result_array();
            $donnees_resultat = $row[0];
            return $donnees_resultat;
        }
        else
            return false;
    }

    function EST_connecter()
    {
         return $this->session->userdata('login') &&  $this->session->userdata('droit');
    }

    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect();exit;
    }
    public function test_email($email)
    {
        $sql = "SELECT email  from MEMBRES WHERE email=\"".$email."\";";
        $query=$this->db->query($sql);
        if($query->num_rows()>=1)
            return true;
        else
            return false;
    }
    public function test_login($login)
    {
        $sql = "SELECT login  from MEMBRES WHERE login=\"".$login."\";";
        $query=$this->db->query($sql);
        if($query->num_rows()>=1)
            return true;
        else
            return false;
    }
}