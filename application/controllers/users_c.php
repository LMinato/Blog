<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users_c extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('users_m');

        $this->load->database();
        $this->load->helper('url');

        //$this->load->library('grocery_CRUD');
        //$this->user = ($this->sitemodel->is_logged()) ? $this->sitemodel->get_user($this->session->userdata('lastname')) : false;
    }
    public function index()
    {
        $this->load->view('v_head');
        $this->load->view('v_menu');
        if( $this->session->userdata('droit')==2){
            redirect('admin_c');
        }
        if( $this->session->userdata('droit')==1){
            redirect('client_c');
        }
        $donnees['titre']="connexion";
        $this->load->view('users_index',$donnees);
    }


    public function inscription()
    {
        $this->load->view('v_head');
        $this->load->view('v_menu');
        $this->form_validation->set_rules('login','login','trim|required|is_unique[membres.login]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[membres.email]');
        $this->form_validation->set_rules('pass','Mot de passe','trim|required|matches[pass2]');
        $this->form_validation->set_rules('pass2','Mot de passe','trim|required');
                /* rappeler la vue à la fin de la méthode */
        if($this->form_validation->run()){
            $donnees= array(
                'login'=>$this->input->post('login'),
                'email'=>$this->input->post('email'),
                'pass'=>$this->input->post('pass'), //$this->encrypt->encode(  ; md5(
                'droit'=>1,
                'valide'=>0
                );
            $this->users_m->add_user($donnees);
                    // fin d'ajout et redirection
            redirect(base_url());
        }
        $donnees['titre']="inscription";
        $this->load->view('users_inscription',$donnees);
    }
    public function aff_connexion()
    {
        $this->load->view('v_head');
        $this->load->view('v_menu');
        if ($this->users_m->EST_connecter()){
            redirect('users_c/aff_deconnexion');
        }
        $this->form_validation->set_rules('login','login','trim|required');
        $this->form_validation->set_rules('pass','Mot de passe','trim|required');
        /* rappeler la vue à la fin de la méthode */
        if($this->form_validation->run()){
            $donnees= array(
                'login'=>$this->input->post('login'),
                'pass'=>$this->input->post('pass')
            );
            $donnees_session=$this->users_m->verif_connexion($donnees);
            if($donnees_session)                      // and valide ==1
            {
                $this->session->set_userdata($donnees_session);
                redirect('users_c/aff_connexion');
            }
            else{
                $donnees['erreur']="mot de passe ou login incorrect";
                $donnees['titre']="connexion";
            }
        }
        $donnees['titre']="connexion";
        // fin d'ajout et redirection
        $this->load->view('users_index',$donnees);
    }

    public function aff_deconnexion(){
        if( $this->session->userdata('droit')==2){
            redirect('admin_c');
        }
        if( $this->session->userdata('droit')==1){
            redirect('article_c');
        }
        print_r($this->session->all_userdata());
        $donnees['titre']="deconnexion";
        $this->load->view('users_index',$donnees);
    }
    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect('article_c');exit;
    }
    public function mdp_oublie()
    {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        /* rappeler la vue à la fin de la méthode */
        if($this->form_validation->run()){
            if($this->users_m->test_email($this->input->post('email'))){
                {
                    $donnees= array(
                        'email'=>$this->input->post('email')
                    );
                    $this->email->from('noreply@monsite.com','Mon site');
                    $this->email->to($this->input->post('email'),'mot de passe oublié');
                    $this->email->subject('votre mot de passe');
                    $this->email->message('<p>voici un nouveau de passe </p>....');
                    $this->email->send();
                   // $this->users_m->envoie_email($donnees);
                    // fin d'ajout et redirection
                    redirect(base_url());
                }
            }
            else{
                $donnees['erreur']="cet email n existe ps";
            }

        }
        $donnees['titre']="mot de passe oublié";
        $this->load->view('users_mdp_oublie',$donnees);
    }
}