<?php

namespace Laetitia_Bernardi\projet5\Controller;

require_once ('models/PostManager.php');
require_once ('models/CommentManager.php');
require_once ('models/UserManager.php');


use \models\PostManager;
use \models\CommentManager;
use \models\UserManager;


class AdministrationController
{
    private $_post;
    private $_comment;
    private $_user;


    public function __construct()
    {
        $this->_post = new \Laetitia_Bernardi\projet5\Model\PostManager();
        $this->_comment = new \Laetitia_Bernardi\projet5\Model\CommentManager();
        $this->_user = new \Laetitia_Bernardi\projet5\Model\UserManager();
       
    }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////COMMENTAIRES///////////////////////////////////////////



//page d'accueil de l'administrateur
    public function administration()
    {
        $usersTotal =$this->_user->countUsers();//connaitre le nombre total d'inscrits
        $post = $this->_post->getLastPost();// affichage dernier film
        $comment = $this->_comment->getLastComment();//affichage dernier commentaire
        $postsTotal = $this->_post->countPosts();//connaitre le nombre total de films
        $commentsTotal = $this->_comment->countComments();//connaitre le nombre total de commentaires
        $commentsReportTotal = $this->_comment->countCommentsReport();//connaitre le nombre total de commentaires signalés
        
        require('views/adminView.php');
    }

//page pour éditer un film
    public function adminNewPost(){

        $usersTotal =$this->_user->countUsers();//connaitre le nombre total d'inscrits
        $commentsReportTotal = $this->_comment->countCommentsReport();//connaitre le nombre total de commentaires signalés
        $postsTotal = $this->_post->countPosts();//connaitre le nombre total de films
        $commentsTotal  =$this ->_comment ->countComments();//connaitre le nombre total de commentaires
        require('views/newPostView.php');
    }
   
// Liste des commentaires (page de liste des commentaires admin)
    public function adminListComments()

    {
        $usersTotal =$this->_user->countUsers();//connaitre le nombre total d'inscrits
        $postsTotal = $this->_post->countPosts();//connaitre le nombre total de films
        $commentsReportTotal = $this->_comment->countCommentsReport();//connaitre le nombre total de commentaires signalés
        $commentsTotal  =$this ->_comment ->countComments();//connaitre le nombre total de commentaires
        $comments = $this->_comment->getAllComments();//recupere tous les commentaires
       require('views/listCommentsView.php');
    
    }



// Approuver un commentaire en  retirerant le signalement (page du detail de chaque films)
    public function approvedComment()
    {
        $post = $this->_post->getPost($_GET['post_id']);//récuperer le film selectionné
        $reportComment = $this->_comment->approvedComment($_GET['id']);//approuver un commentaire en fonction de son id
        header('Location: index.php?action=adminCommentsReport');
    }


//approuver tous les commentaires signalés (page des commentaires signalés admin)

  public function approvedComments()
    {
        
        $reportComments = $this->_comment->approvedComments();
        echo "<h1 style='color:#9A97A5;text-align:center;padding:35px;'>Tous les commentaires approuvés avec succès</h1>";        
        header('Refresh: 1; url=index.php?action=adminCommentsReport#reportcom' );
        
        
    }


// Liste des commentaires signalés (page des commentaires signalés admin)
    public function adminCommentsReport()
    {
        $usersTotal =$this->_user->countUsers();//connaitre le nombre total d'inscrits
        $commentsReportTotal = $this->_comment->countCommentsReport();//connaitre le nombre total de commentaires signalés
        $postsTotal = $this->_post->countPosts();//connaitre le nombre total de films
        $commentsTotal  =$this ->_comment ->countComments();//connaitre le nombre total de commentaires
        $reportComments = $this->_comment->getReportComments();//récuperer les commentaires signalés
        require ('views/reportCommentsView.php');
    }



 
 //supprime tous les commentaires(page de detail de la liste des commentaires)
    public function deleteComments()
    {
        $deleteComments = $this->_comment->deleteAllComments();
          echo "<h1 style='color:#9A97A5;text-align:center;padding:35px;'>Tous les commentaires supprimés avec succès</h1>";     
        header('Refresh: 1; url=index.php?action=adminListComments#deleteCom' );
        
   
    }

//supprime tous les commentaires signalés
    public function deleteAllCommentReport()
    {
        $deleteAllCommentReport = $this->_comment->deleteCommentsReport();
          echo "<h1 style='color:#9A97A5;text-align:center;padding:35px;'>Tous les commentaires signalés supprimés avec succès</h1>";     
        header('Refresh: 1; url=index.php?action=adminCommentsReport#reportcom' );
        
   
    }

// Supprimer un commentaire dans la liste des commentaires
    public function deleteComment($id_comment)
    {
        $deleteComment = $this->_comment->deleteComment($id_comment);

        if($deleteComment === false)
        {
            throw new Exception('Impossible de supprimer le commentaire' );
        }
        else
        {
          
            header('Location:index.php?action=adminListComments#deleteCom' );
            
        }
    }

// Supprimer un commentaire dans la page film details
    public function deleteOneComment($id_comment)
    {
        $deleteComment = $this->_comment->deleteComment($id_comment);

        if($deleteComment === false)
        {
            throw new Exception('Impossible de supprimer le commentaire' );
        }
        else
        {
         
             header('Location: index.php?action=post&post_id=' . $_GET['post_id']);
            
        }
    }

//supprimer le commentaire signalé dans la page commentaire report
      public function deleteOneCommentInReport($id_comment)
    {
        $deleteComment = $this->_comment->deleteComment($id_comment);

        if($deleteComment === false)
        {
            throw new Exception('Impossible de supprimer le commentaire' );
        }
        else
        {
         
            header('Location:index.php?action=adminCommentsReport#reportcom');

            
        }
    }


//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////CHAPITRES//////////////////////////////////////////////



// Ajouter un film (page de creation d'un film)
    public function postAdd($author, $title,$horaires,$duree,$image,$video , $content )
    {
        $createPost = $this->_post->createPost($author, $title,$horaires,$duree,$image,$video, $content);
         echo "<h1 style='color:#9A97A5;text-align:center;padding:35px;'>Film ajouté avec succès</h1>";
        header('Refresh: 1; url= index.php?action=listPosts#episodes');
    }


// Page de modification d'un film
    public function adminUpdatePost()
    {
        $commentsReportTotal = $this->_comment->countCommentsReport();//nombre de commentaires signalés
        $postsTotal = $this->_post->countPosts();//nombre de films
        $commentsTotal  =$this ->_comment ->countComments();//nombre de commentaires
        $post = $this->_post->getPost($_GET['post_id']);//récupere un film selectionné
        $usersTotal =$this->_user->countUsers();//connaitre le nombre total d'inscrits

        require ('views/updatePostView.php');
    }




// Modification d'un film (page de modification d'un film)
      public function updatePost($post_id, $author, $title, $content,$horaires,$duree,$image,$video)
    {
        $updatePost = $this->_post->updatePost($post_id, $author, $title, $content,$horaires,$duree,$image,$video);

        if ($updatePost === false) {
            throw new Exception('Impossible de mettre à jour le film');
        } else {
            header('Location: index.php?action=listPosts');
        }
    }




// Supprimer un film (page de la liste des films admin , page du detail du film )
    public function deletePost($post_id)
    {
        $deletePost = $this->_post->deletePost($post_id);//supprimé un film selectionné
        $deleteComments = $this->_comment->deleteAllComments($post_id);//supprime tous les films 

        if ($deletePost === false) {
            throw new Exception('Impossible de supprimer le film');
        } elseif ($deleteComments === false) {
            throw new Exception('Impossible de supprimer les commentaire du film');
        } else {
            header('Location:index.php?action=listPosts');
        
        }
    }
}