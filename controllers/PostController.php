<?php
namespace Laetitia_Bernardi\projet5\Controller;
require_once ('models/PostManager.php');
require_once ('models/CommentManager.php');
require_once ('models/UserManager.php');

use \models\PostManager;
use \models\CommentManager;
use \models\UserManager;

class PostController 
{
    private $_post;
    private $_comment;    
    private $_posts;
    private $_user;

    public function __construct()
    {
        $this->_post = new \Laetitia_Bernardi\projet5\Model\PostManager();
        $this->_posts = new \Laetitia_Bernardi\projet5\Model\PostManager();
        $this->_comment = new \Laetitia_Bernardi\projet5\Model\CommentManager();
        $this->_user = new \Laetitia_Bernardi\projet5\Model\UserManager();
    }
// Page Afficher un chapitre + ses commentaires
    public function post($post_id,$commentReport)
    {   
        $postsTotal = $this->_posts->countPosts();  //connaitre le nombre de total films
        $commentsTotal=  $this->_comment->countComments(); //connaitre le nombre total de com 
        $commentReport=$commentReport;//affichage message confirmation signalé
        $commentsReportTotal = $this->_comment->countCommentsReport();//connaitre nombre total de coms signalés
        $post = $this->_post->getPost($post_id);// recuperer le chapitre selectionné
        $comments = $this->_comment->getComments($post_id);//tous les commentaires du chapitre selectionné  
        $usersTotal =$this->_user->countUsers();//connaitre le nombre total d'inscrits

        require('views/filmDetail.php');
    }


// Liste des chapitres( page d'accueil)
    public function listPosts()
    {
        $usersTotal =$this->_user->countUsers();//connaitre le nombre total d'inscrits      
        $posts = $this->_posts->getAllPosts();//recupère tous les films
        $postsTotal = $this->_posts->countPosts();  //connaitre le nombre de total chapitre    
        $commentsTotal  =$this ->_comment ->countComments();//connaitre le nombre de com 
        $commentsReportTotal = $this->_comment->countCommentsReport();//connaitre nombre total de coms signalés
        require('views/filmList.php');
     
    }



}
