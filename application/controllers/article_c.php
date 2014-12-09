<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class article_c extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */

        $this->load->library('grocery_CRUD');

    }

	public function index()
	{
		$this->load->view('v_head');
		$this->load->view('v_menu');
        $rand = rand(1,12);
        $donnees['didyouknow'] = $this->article_m->getUneQuote($rand);
        $donnees['articles']=$this->article_m->getAllArticles();
        $donnees['themes'] = $this->article_m->getAllThemes();
        $this->load->view('accueil',$donnees);
		$this->load->view('v_foot');
	}

    public function membres()
    {
        $this->grocery_crud->set_table('MEMBRES');
        $output = $this->grocery_crud->render();

        $this->_example_output($output);
    }
    function _example_output($output = null)

    {
        $this->load->view('our_template.php',$output);
    }

	public function afficherArticle()
	{
		$this->load->view('v_head');
		$this->load->view('v_menu');
        $donnees['articles']=$this->article_m->getAllArticles();
		$this->load->view('v_table_article',$donnees);
		$this->load->view('v_foot');
	}

    public function afficherUnArticle($id) {
        $this->load->view('v_head');
        $this->load->view('v_menu');
        $donnees['article']=$this->article_m->getUnArticle($id);
        $donnees['commentaire'] = $this->article_m->getCommentaires($id);
        $this->load->view('v_afficheArticle',$donnees);
        $this->load->view('v_foot');
    }

	public function formCreerArticle()
	{
		$this->load->view('v_head');
		$this->load->view('v_menu');

        $donnees['themes'] = $this->article_m->getAllThemes();
		/*$donnees['droit']=$this->article_m->getDroitArticleDropdown();*/

		$this->load->view('v_form_ajout_article',$donnees);
		$this->load->view('v_foot');
	}

	public function valideCreerArticle()
	{
		$this->form_validation->set_rules('article_titre', 'titre', 'required|min_length[5]');
		$this->form_validation->set_rules('article_contenu', 'contenu', 'required|min_length[5]');
        //$this->form_validation->set_rules('article_themes', 'id_theme', 'required|min_length[5]');
        $donnees['id_theme'] = $_POST['themes'];
        $donnees['id_membre'] = $this->session->userdata("id");
        $donnees['titre']=$_POST['article_titre'];
		$donnees['contenu']=$_POST['article_contenu'];
        $donnees['date_creation']=date(("Y-m-d H:i:s"));
        $donnees['date_modification'] = date(("Y-m-d H:i:s"));
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('v_head');
			$this->load->view('v_menu');
            $donnees['themes'] = $this->article_m->getAllThemes();
			$this->load->view('v_form_ajout_article',$donnees);
			$this->load->view('v_foot');
		}
		else
		{
			$this->article_m->insertArticle($donnees);
			redirect('article_c/afficherArticle');
		}
		
	}
	public function supprimerArticle($idArticle)
	{
		$this->article_m->supprimerArticle($idArticle);
		redirect('article_c/afficherArticle');
	}

	public function formModifierArticle($id)
	{
		$this->load->view('v_head');
		$this->load->view('v_menu');
		$donnees=$this->article_m->getUnArticle($id);
        $donnees['themes'] = $this->article_m->getAllThemes();
		$this->load->view('v_form_modifier_article',$donnees);
		$this->load->view('v_foot');
	}

	public function valideModifierArticle()
	{

		$this->form_validation->set_rules('article_titre', 'titre', 'required|min_length[5]');
		$this->form_validation->set_rules('article_contenu', 'contenu', 'required|min_length[5]');
		$donnees['id']=$_POST['article_id'];
        $donnees['id_theme'] = $_POST['themes'];
        $donnees['id_membre'] = 1;
		$donnees['titre']=$_POST['article_titre'];
		$donnees['contenu']=$_POST['article_contenu'];
        $donnees['date_modification']=date(("Y-m-d H:i:s"));
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('v_head');
			$this->load->view('v_menu');
            $donnees['themes'] = $this->article_m->getAllThemes();
			$this->load->view('v_form_modifier_article',$donnees);
			$this->load->view('v_foot');
		}
		else
		{		
			$this->article_m->modifierArticle($donnees['id'],$donnees);
			redirect('article_c/afficherArticle');
		}
    }

        /*
         *      Contrôles sur les commentaires
         */

        public function validCommentaire($id) {
            $donnees['id_article'] = $id;
            if ($this->session->userdata('login') == 0)
                $donnees['auteur'] = $this->session->userdata('login');
            else
                redirect('article_c/afficherUnArticle/'.$id);
            $donnees['commentaire'] = $_POST['contenu'];
            $donnees['date_commentaire'] = date(("Y-m-d H:i:s"));
            $this->article_m->addCommentaire($donnees);
            redirect('article_c/afficherUnArticle/'.$id);
        }

}
