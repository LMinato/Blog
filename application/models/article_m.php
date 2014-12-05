<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class article_m extends CI_Model {

	function getAllArticles(){
        $sql = "SELECT ARTICLES.id, login, titre, libelle, contenu, date_creation, date_modification
                FROM ARTICLES
                INNER JOIN THEMES ON THEMES.id = ARTICLES.id_theme
                INNER JOIN membres ON membres.id = ARTICLES.id_membre
                ORDER BY ARTICLES.id;";
                //"SELECT * FROM ARTICLES;";
        $query = $this->db->query($sql);
		return  $query->result();
    }

    function getUnArticle($id){
        $sql = "SELECT A.id, M.login, A.titre, A.id_theme ,T.libelle, A.contenu, A.date_creation, A.date_modification
                FROM THEMES T
                INNER JOIN ARTICLES A
                ON T.id = A.id_theme
                INNER JOIN membres M
                ON M.id = A.id_membre
                WHERE A.id=$id
                ORDER BY A.id;";
        $query = $this->db->query($sql);
        $data=$query->row_array();
        return $data;
    }

    function getUneQuote($id) {
        $sql = "SELECT contenu FROM DYK WHERE idDyk=$id ;";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getAllThemes() {
        $sql = "SELECT id, libelle FROM THEMES;";
        $query = $this->db->query($sql);
        return $query->result();
    }

	function insertArticle($donnees){
        $this->db->insert("ARTICLES",$donnees);
    }

    function supprimerArticle($idArticle){
        $this->db->delete("ARTICLES",array('id'=>$idArticle));
    }
    function modifierArticle($id_article, $donnees) {
        $this->db->where("id", $id_article);
        $this->db->update("ARTICLES", $donnees);
    }

    function getDroitArticleDropdown(){
        $this->db->from("droit")->order_by("id");
        $result=$this->db->get();
        $retour=array();
        if($result->num_rows()>0)
        {
            $retour['']="selectionner un champ";
            foreach ($result->result_array() as $row) {
                $retour[$row['id']]=$row['libelle'];
            }
        }
        return $retour;
    }

}
