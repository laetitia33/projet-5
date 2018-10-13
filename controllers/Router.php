<?php
require('controllers/PostController.php');
require('controllers/CommentController.php');
require('controllers/AdminController.php');
require('controllers/UserController.php');
require('controllers/ContactController.php');
require('controllers/Autoload.php');
require('controllers/viewController.php');

use \controllers\ContactController;
use \controllers\UserController;
use \controllers\PostController;
use \controllers\CommentController;
use \controllers\AdminController;
use \controllers\viewController;
use \controllers\Autoload;


class Routeur
{
        private $_postCtrl, $_commentCtrl, $_administrationCtrl, $_contactCtrl, $_userCtrl, $_templateCtrl,$_viewCtrl;



        public function __construct()
        {
            \Laetitia_Bernardi\projet5\Controller\Autoload::register();
            $this->_postCtrl = new \Laetitia_Bernardi\projet5\Controller\PostController();
            $this->_commentCtrl = new \Laetitia_Bernardi\projet5\Controller\CommentController();
            $this->_administrationCtrl = new \Laetitia_Bernardi\projet5\Controller\AdministrationController();
            $this->_userCtrl = new \Laetitia_Bernardi\projet5\Controller\UserController();
            $this->_contactCtrl = new \Laetitia_Bernardi\projet5\Controller\ContactController();
            $this->_viewCtrl = new \Laetitia_Bernardi\projet5\Controller\viewController();
        }


        public function RouteRequest()
        {
        try{
            if(isset($_SESSION['id']) && $_SESSION['id_group'] == 1)
            {
                if (isset($_GET['action']) && !empty($_GET['action']))
                {
                    // ADMIN - administration
                    if ($_GET['action'] == 'administration')
                    {
                       
                       $this->_administrationCtrl->administration();
                    }
                  
        //redirection concernant les chapitres

                    // ADMIN - Creation d'un film
                    elseif ($_GET['action'] == 'createPost')
                    {
                        if ($_POST['author'] != NULL && $_POST['title'] != NULL && $_POST['horaires'] != NULL && $_POST['duree'] != NULL && $_POST['image'] != NULL && $_POST['video'] != NULL && $_POST['content'] != NULL )
                        {
                           
                           $this->_administrationCtrl->postAdd($_POST['author'], $_POST['title'],$_POST['horaires'], $_POST['duree'],$_POST['image'],$_POST['video'], $_POST['content']);
                           
                        }
                     
                    }

                     // ADMIN - Page pour créer un film
                    elseif ($_GET['action'] == 'adminNewPost')
                    {
                     
                       $this->_administrationCtrl->adminNewPost();
                    }

                    // ADMIN - Liste des films
                    elseif ($_GET['action'] == 'listPosts')
                    {
                       
                        $this->_postCtrl->listPosts();
                    }



                    //ADMIN - film avec ses commentaires
                    elseif ($_GET['action'] == 'post') 
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0) 
                        {
                           
                              if(isset($_GET['commentReport']))
                                {
                                   $commentReport = true;
                                }else{
                                    $commentReport = false;
                                }
                            $this->_postCtrl->post($_GET['post_id'],$commentReport);
                              
                        } else 
                        {
                            throw new Exception('Erreur. Pas de chapitre séléctionné !');
                        }
                    }
             
                    // ADMIN - page de MAJ d'un film
                    elseif ($_GET['action'] == 'adminUpdatePost')
                    {
                       
                        $this->_administrationCtrl->adminUpdatePost();
                    }

                    // ADMIN - Mise à jour d'un film
                    elseif ($_GET['action'] == 'updatePost')
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                        {
                            if ($_POST['author'] != NULL && $_POST['title'] != NULL && $_POST['horaires'] != NULL && $_POST['duree'] != NULL && $_POST['image'] != NULL && $_POST['video'] != NULL  && $_POST['content'] != NULL )
                            {
                                
                                $this->_administrationCtrl->updatePost($_GET['post_id'], $_POST['author'], $_POST['title'],$_POST['horaires'],$_POST['duree'], $_POST['image'], $_POST['video'], $_POST['content']);
                            }
                          
                     
                                 else
                            {
                                throw new Exception('Tous les champs ne sont pas remplis..');
                            }
                        }
                        else
                        {
                            throw new Exception('Aucun identifiant de chapitre envoyé !');
                        }
                    }
                    // ADMIN - suppression d'un film
                    elseif ($_GET['action'] == 'deletePost')
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                        {
                           
                            $this->_administrationCtrl->deletePost($_GET['post_id']);
                        }
                        else
                        {
                            throw new Exception('Aucun identifiant de chapitre envoyé !');
                        }
                    }
          
        //redirection concernant les commentaires 
         
                    // ADMIN - Liste des commentaires
                    elseif ($_GET['action'] == 'adminListComments')
                    {
                        
                        $this->_administrationCtrl->adminListComments();
                    }

                    // ADMIN - Ajoute un commentaire dans le film selectionné
                    elseif ($_GET['action'] == 'addComment')
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                        {
                            if (!empty($_POST['author']) && !empty($_POST['comment']))
                            {
                                
                                $this->_commentCtrl->addComment($_GET['post_id'], $_POST['author'], $_POST['comment']);
                            }
                         
                        }
                        else
                        {
                            throw new Exception('Aucun identifiant de chapitre envoyé !');
                        }
                    }

                    // ADMIN - Liste des commentaires signalés
                    elseif ($_GET['action'] == 'adminCommentsReport')
                    {
                        
                       $this->_administrationCtrl->adminCommentsReport();
                    }
                    //  ADMIN - Signaler un commentaire
                    elseif ($_GET['action'] == 'report') 
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0) 
                        {
                            if (isset($_GET['id']) && $_GET['id'] > 0) 
                            {                                
                            
                                $this->_commentCtrl->reportingComment();             
                         
                            }
                            else
                            {
                                throw new Exception('Aucun identifiant de commentaire envoyé pour pouvoir le signaler!');
                            }
                        } else {
                            throw new Exception('Aucun identifiant de chapitre envoyé pour revenir sur la page précédente!');
                        }
                    }

                    // ADMIN - Supprimer un commentaire
                    elseif ($_GET['action'] == 'deleteComment')
                    {
                        if (isset($_GET['id']) && $_GET['id'] > 0)
                        {
                           
                           $this->_administrationCtrl->deleteComment($_GET['id']);
                        }
                        else
                        {
                            throw new Exception('Aucun identifiant de commentaire envoyé !');
                        }
                    }

                    // ADMIN - Supprimer un commentaire dans la  page detail film
                    elseif ($_GET['action'] == 'deleteOneComment')
                    {
                        if (isset($_GET['id']) && $_GET['id'] > 0)
                        {
                        
                            $this->_administrationCtrl->deleteOneComment($_GET['id']);
                        }
                        else
                        {
                            throw new Exception('Aucun identifiant de commentaire envoyé !');
                        }
                    }
                    
                    // ADMIN - Supprimer un commentaire dans la  comment report
                    elseif ($_GET['action'] == 'deleteOneCommentInReport')
                    {
                        if (isset($_GET['id']) && $_GET['id'] > 0)
                        {
                          
                            $this->_administrationCtrl->deleteOneCommentInReport($_GET['id']);
                        }
                        else
                        {
                            throw new Exception('Aucun identifiant de commentaire envoyé !');
                        }
                    }

                    // ADMIN - Supprimer tous les commentaires signalés dans la  comment report
                    elseif ($_GET['action'] == 'deleteAllCommentReport')
                    {
                              
                            $this->_administrationCtrl->deleteAllCommentReport();
                    }
       
                    // ADMIN - Supprimer tous les commentaires
                       elseif ($_GET['action'] == 'deleteComments')
                    {           
                          
                           $this->_administrationCtrl->deleteComments();
                          
                    }

                    // ADMIN - Approuver un commentaire 
                    elseif ($_GET['action'] == 'approvedComment')
                    {
                       
                        $this->_administrationCtrl->approvedComment();
                    }

                    // ADMIN - Approuver tous les commentaires
                    elseif ($_GET['action'] == 'approvedComments')
                    {
                        
                        $this->_administrationCtrl->approvedComments();
                    }
                   
                    // ADMIN - Ajoute un commentaire dans le chapitre selectionné
                    elseif ($_GET['action'] == 'addCommentAdmin')
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                        {
                            if (!empty($_POST['comment']))
                            {
                                
                               $this->_commentCtrl->addCommentAdmin($_GET['post_id'], $_POST['comment']);
                            }
                          
                        }
                        else
                        {
                            throw new Exception('Aucun identifiant de chapitre envoyé !');
                        }
                    }

                    // ADMIN - Page de connexion
                    elseif ($_GET['action'] == 'login')
                    {
                        
                        $this->_userCtrl->login();
                       
                    }


                     // ADMIN - Inscription
                    elseif ($_GET['action'] == 'register') {
                        if (!empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['password_confirm']) && !empty($_POST['email'])) {
                            // Sécurité
                            $pseudo = htmlspecialchars($_POST['pseudo']);
                            $email = htmlspecialchars($_POST['email']);
                            // Hachage du mot de passe
                            $password_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
                            // On vérifie la Regex pour l'adresse email
                            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {
                                // On vérifie que les 2 mots de passe sont identiques.
                                if ($_POST['password'] == $_POST['password_confirm']) {
                                    $this->_userCtrl->registerUser(2, $pseudo, $password_hache, $email);
                                } else {
                                    throw new Exception('Les 2 mots de passe ne sont pas identiques, recommencez !');
                                }
                            } else {
                                throw new Exception('L\'adresse email ' . $email . ' n\'est pas valide, recommencez !');
                            }
                        } else {
                            throw new Exception('Tous les champs doivent être remplis !');
                        }
                    }
                    
                   // ADMIN - connexion
                    elseif ($_GET['action'] == 'log')
                    {
                    
                        if (!empty($_POST['pseudo']) && !empty($_POST['pass']))
                        {
                
                             
                              $this->_userCtrl->logUser($_POST['pseudo'],$_POST['pass']);
                        } 
                   
                    }

                    // ADMIN - Deconnexion
                    elseif ($_GET['action'] == 'logout')
                    {
                  
                        $this->_userCtrl->logoutUser();
                    }
        //ADMIN - Utilisateurs
                    // ADMIN - Page utilisateurs
                    elseif ($_GET['action'] == 'adminListUsers')
                    {
                        $this->_userCtrl->adminListUsers();
                    }
              
                  // ADMIN - Supprimer un utilisateur
                    elseif ($_GET['action'] == 'deleteUser')
                    {
                        if (isset($_GET['id_user']) && $_GET['id_user'] > 0)
                        {
                            $this->_userCtrl->deleteUser($_GET['id_user']);
                        }
                        else
                        {
                            throw new Exception('Aucun identifiant d\'utilisateur envoyé !');
                        }
                    }
                }
                // ADMIN - Retourne a l'administration.
                else
                {
                    $this->_administrationCtrl->administration();
                }
            }



//INSCRITS
            elseif(isset($_SESSION['id']) && $_SESSION['id_group'] == "2")
            {
                if (isset($_GET['action']) && !empty($_GET['action']))
                {


                    // INSCRITS - page infos pratiques
                    
                    if ($_GET['action'] == 'information')
                    {
                        
                        $this->_viewCtrl->info();
                       
                    }

                    // INSCRITS - page information salles de cinemas

                    if ($_GET['action'] == 'cinemas')
                    {
                        
                        $this->_viewCtrl->cinemas();
                       
                    }


                    // INSCRITS - Accueil visiteurs /Liste des films
                   if ($_GET['action'] == 'listPosts') 
                    {
                 
                        $this->_postCtrl->listPosts();
                    }

                    // INSCRITS -  Affiche le film avec ses commentaires
                    elseif ($_GET['action'] == 'post') 
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0)

                        {
                            
                                if(isset($_GET['commentReport']))
                                {
                                   $commentReport = true;
                                }else{
                                    $commentReport = false;
                                }

                            $this->_postCtrl->post($_GET['post_id'],$commentReport);
                              
                        } else 
                        {
                            throw new Exception('Erreur. Pas de chapitre séléctionné !');
                        }
                    }
        
                    // INSCRITS - Page de connexion
                    elseif ($_GET['action'] == 'login')
                    {
                        
                        $this->_viewCtrl->login();
                       
                    }

                    // INSCRITS - Inscription
                    elseif ($_GET['action'] == 'register') {
                        if (!empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['password_confirm']) && !empty($_POST['email'])) {
                            // Sécurité
                            $pseudo = htmlspecialchars($_POST['pseudo']);

                            $email = htmlspecialchars($_POST['email']);
                            // Hachage du mot de passe
                            $password_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
                            // On vérifie la Regex pour l'adresse email
                            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {
                                // On vérifie que les 2 mots de passe sont identiques.
                                if ($_POST['password'] == $_POST['password_confirm']) {
                                    $this->_userCtrl->registerUser(2, $pseudo, $password_hache, $email);
                                } else {
                                    throw new Exception('Les 2 mots de passe ne sont pas identiques, recommencez !');
                                }
                            } else {
                                throw new Exception('L\'adresse email ' . $email . ' n\'est pas valide, recommencez !');
                            }
                        } else {
                            throw new Exception('Tous les champs doivent être remplis !');
                        }
                    }
                    
                    // INSCRITS - Connexion
                    elseif ($_GET['action'] == 'log') {
                        if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
                            $this->_userCtrl->logUser($_POST['pseudo'], $_POST['pass']);
                        }
                    }


                    // INSCRITS - Deconnexion
                    elseif ($_GET['action'] == 'logout')
                    {
                     
                        $this->_userCtrl->logoutUser();
                    }

                    // INSCRITS - page mail
                    elseif ($_GET['action'] == 'email') 
                    {
                      
                        $this->_viewCtrl->mailView();
                    }
                    

                    // INSCRITS - envoi un mail
                    elseif ($_GET['action'] == 'addMail') 
                    {
                                
                       if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['object']) && !empty($_POST['msg'])) 
                        {
                          
                            $this->_contactCtrl->sendEmail();
                          } else {
                            throw new Exception('Tous les champs doivent être remplis !');
                        }
                      
               
                    }

                    // INSCRITS - Ajoute un commentaire dans le film selectionné
                    elseif ($_GET['action'] == 'addComment') 
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0) 
                        {
                            if (!empty($_POST['author']) && !empty($_POST['comment'])) 
                            {
                      
                                $this->_commentCtrl->addComment($_GET['post_id'], $_POST['author'], $_POST['comment']);
                            } 
                        
                        } 
                        else 
                        {
                            throw new Exception('Aucun identifiant de chapitre envoyé !');
                        }
                    }

                    // INSCRITS - Signaler un commentaire
                    elseif ($_GET['action'] == 'report') 
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0) 
                        {
                            if (isset($_GET['id']) && $_GET['id'] > 0) 
                            {                                
                            
                                $this->_commentCtrl->reportingComment();
                         
                            }
                            else
                            {
                                throw new Exception('Aucun identifiant de commentaire envoyé pour pouvoir le signaler!');
                            }
                        } else {
                            throw new Exception('Aucun identifiant de chapitre envoyé pour revenir sur la page précédente!');
                        }
                    }
                   
                }

                // INSCRITS - Retourne à l'index.Accueil
                else
                {
                   
                   $this->_postCtrl->listPosts();
                }
            }
            else

            {
                if (isset($_GET['action']) && !empty($_GET['action']))
                {


                    // page infos pratiques
                    
                    if ($_GET['action'] == 'information')
                    {
                        
                        $this->_viewCtrl->info();
                       
                    }

                    // page information salles de cinemas

                    if ($_GET['action'] == 'cinemas')
                    {
                        
                        $this->_viewCtrl->cinemas();
                       
                    }


                    // Accueil visiteurs /Liste des films
                   if ($_GET['action'] == 'listPosts') 
                    {
                 
                        $this->_postCtrl->listPosts();
                    }

                    // Affiche le film avec ses commentaires
                    elseif ($_GET['action'] == 'post') 
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0)

                        {
                         
                            
                                if(isset($_GET['commentReport']))
                                {
                                   $commentReport = true;
                                }else{
                                    $commentReport = false;
                                }

                            $this->_postCtrl->post($_GET['post_id'],$commentReport);
                              
                        } else 
                        {
                            throw new Exception('Erreur. Pas de chapitre séléctionné !');
                        }
                    }
              
                    // Page de connexion
                    elseif ($_GET['action'] == 'login')
                    {
                        
                        $this->_viewCtrl->login();
                       
                    }

                     // Inscription
                    elseif ($_GET['action'] == 'register') {
                        if (!empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['password_confirm']) && !empty($_POST['email'])) {
                            // Sécurité
                            $pseudo = htmlspecialchars($_POST['pseudo']);

                            $email = htmlspecialchars($_POST['email']);
                            // Hachage du mot de passe
                            $password_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
                            // On vérifie la Regex pour l'adresse email
                            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {
                                // On vérifie que les 2 mots de passe sont identiques.
                                if ($_POST['password'] == $_POST['password_confirm']) {
                                    $this->_userCtrl->registerUser(2, $pseudo, $password_hache, $email);
                                } else {
                                    throw new Exception('Les 2 mots de passe ne sont pas identiques, recommencez !');
                                }
                            } else {
                                throw new Exception('L\'adresse email ' . $email . ' n\'est pas valide, recommencez !');
                            }
                        } else {
                            throw new Exception('Tous les champs doivent être remplis !');
                        }
                    }

                    // Connexion
                    elseif ($_GET['action'] == 'log') {
                        if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
                            $this->_userCtrl->logUser($_POST['pseudo'], $_POST['pass']);
                        }
                    }


                    // page mail
                    elseif ($_GET['action'] == 'email') 
                    {
                      
                        $this->_viewCtrl->mailView();
                    }
                    

                    //envoi un mail
                    elseif ($_GET['action'] == 'addMail') 
                    {
                                
                       if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['object']) && !empty($_POST['msg'])) 
                        {
                          
                            $this->_contactCtrl->sendEmail();
                         } else {
                            throw new Exception('Tous les champs doivent être remplis !');
                        }
                      
               
                    }

                   
                   
                }

                // Retourne à l'index.Accueil
                else
                {
                   
                   $this->_postCtrl->listPosts();
                }
            }

        }
        catch (Exception $e)
        {
            $errorMessage = $e->getMessage();
            require('views/errorView.php');
        }
    }
   
}