<?php
namespace Laetitia_Bernardi\projet5\Controller;

require_once('models/UserManager.php');
require_once ('models/PostManager.php');
require_once ('models/CommentManager.php');

use \models\PostManager;
use \models\CommentManager;
use\models\UserManager;
use \Exception;


class UserController
{
    private $_user;
    private $_comment;
    private $_post;


    public function __construct()
    {
        $this->_user = new \Laetitia_Bernardi\projet5\Model\UserManager();
        $this->_post = new \Laetitia_Bernardi\projet5\Model\PostManager();
        $this->_comment = new \Laetitia_Bernardi\projet5\Model\CommentManager();
       
    }


// Inscription en excluant les utilsateurs et les adresses mails deja enregistrés
    public function registerUser($id_group, $pseudo, $password_hache, $email){
        $pseudoexist =$this->_user->getUser($pseudo);

        if($pseudoexist)
        {
            throw new Exception('Utilisateur déjà enregistré avec ce pseudo');
        }


        $emailexist =$this->_user->getUserByMail($email);
          if($emailexist)
        {
            throw new Exception('Adresse e-mail deja utilisée');
        }

        $registerUser = $this->_user->createUser($id_group, $pseudo, $password_hache, $email);
        if($registerUser === false)
        {
            throw new Exception('Impossible d\'inscrire le nouvel utilisateur');
        }
        else
        {
            echo "<h1 style='color:#9A97A5;text-align:center;padding:35px;'>Utilisateur crée avec succès , veuillez vous connecter</h1>";
            header('Refresh: 1.5; url=index.php?action=login' );
        }

    }



// Liste des membres
    public function adminListUsers()
    {
    	$usersTotal =$this->_user->countUsers();//connaitre le nombre total d'inscrits
        $users = $this->_user->getAllUsers();
        $postsTotal = $this->_post->countPosts();//connaitre le nombre total de chapitres
        $commentsTotal = $this->_comment->countComments();//connaitre le nombre total de commentaires
        $commentsReportTotal = $this->_comment->countCommentsReport();//connaitre le nombre total de commentaires
        require ('views/listUsersView.php');

    }

// Connexion
    public function logUser($pseudo,$pass)
    {
        $user = $this->_user->getUser($pseudo);
        $isPasswordCorrect  = password_verify($_POST['pass'], $user['pass']);
        if(!$user)
        {
           throw new Exception('Utilisateur incorrect');   

        }

        else{
            if($isPasswordCorrect && $user['id_group'] == 2)
            {
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['pseudo'] = $user['pseudo'];
                $_SESSION['pass'] = $user['pass'];
                $_SESSION['id_group'] = $user['id_group'];
                $id = $user['id'];
                $pseudo = $user['pseudo'];
                $pass_hash = $user['pass'];
                $group = $user['id_group'];
                setcookie('id', $id, time() + 1800, null, null, false, true);
                setcookie('pseudo', $pseudo, time() + 1800, null, null, false, true);
                setcookie('pass', $pass_hash, time() + 1800, null, null, false, true);
                setcookie('id_group', $group, time() + 1800, null, null, false, true);
                header('Location: index.php');
            }
            elseif($isPasswordCorrect && $user['id_group'] == 1)
            {
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['pseudo'] = $user['pseudo'];
                $_SESSION['pass'] = $user['pass'];
                $_SESSION['id_group'] = $user['id_group'];
                $id = $user['id'];
                $pseudo = $user['pseudo'];
                $pass_hash = $user['pass'];
                $group = $user['id_group'];
                setcookie('id', $id, time() + 1800, null, null, false, true);
                setcookie('pseudo', $pseudo, time() + 1800, null, null, false, true);
                setcookie('pass', $pass_hash, time() + 1800, null, null, false, true);
                setcookie('id_group', $group, time() + 1800, null, null, false, true);
                header('Location: index.php?action=administration');
            }
            else
            {
                throw new Exception('Mot de passe incorrect');
            }
        }
    }

// Supprimer un membre
    public function deleteUser($id)
    {
        $deleteUser = $this->_user->deleteUser($id);
        if($deleteUser === false)
        {
            throw new Exception('Impossible de supprimer l\'utilisateur' );
        }
        else
        {
            header('Location: index.php?action=adminListUsers');
        }
    }


// Deconnexion
    public function logoutUser()
    {
        session_start();
        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        // Suppression des cookies de connexion automatique
        setcookie('id', '');
        setcookie('pseudo', '');
        setcookie('pass', '');
        setcookie('id_group', '');


        header('Location: index.php');
    }
}