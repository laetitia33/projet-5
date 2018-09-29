<?php
namespace Laetitia_Bernardi\projet5\Controller;


class ViewController{

	
    // page Accueil
    public function accueil()
    {   
     
        require('views/accueilView.php');
    }

    //page informations
  	public function info()
    {   
     
        require('views/infoView.php');
    }

	//page contact
    public function mailView(){   

       require ('views/contactView.php');
    }

    //page de connexion
 	public function login()
    {
        require('views/loginView.php');
    }

    //page salles de cinemas
    public function cinemas()
    {
        require('views/cinemasView.php');
    }

}
