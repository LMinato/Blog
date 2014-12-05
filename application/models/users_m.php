<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_m extends CI_Model {
    public function add_user($donnees)
    {
        $sql = "INSERT membres VALUES (NULL,\"".$donnees['login']."\",\"".$donnees['email']."\",
        \"".$donnees['pass']."\",1,0) ;";
        $this->db->query($sql);
    }

    public function verif_connexion($donnees)
    {
        $sql = "SELECT droit,login,email,valide from membres WHERE login=\"".$donnees['login']."\"
        and pass=\"".$donnees['pass']."\";";
        $query=$this->db->query($sql);
        if($query->num_rows()==1)
        {
            $row=$query->result_array();
            $donnees_resultat=$row[0];
            return $donnees_resultat;
        }
        else
            return false;
    }

    function EST_connecter()
    {
         return $this->session->userdata('login') &&  $this->session->userdata('droit') ;
    }

    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect();exit;
    }
    public function test_email($email)
    {
        $sql = "SELECT email  from membres WHERE email=\"".$email."\";";
        $query=$this->db->query($sql);
        if($query->num_rows()>=1)
            return true;
        else
            return false;
    }
    public function test_login($login)
    {
        $sql = "SELECT login  from membres WHERE login=\"".$login."\";";
        $query=$this->db->query($sql);
        if($query->num_rows()>=1)
            return true;
        else
            return false;
    }
}