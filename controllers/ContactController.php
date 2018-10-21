<?php
namespace Laetitia_Bernardi\projet5\Controller;


class ContactController{
    private $_msg;
    private $_objet;
    private $_expediteur;
    private $_email;
    private $_destinataire = '33260laetitia.bernardi@gmail.com';
   
    //vérifier le $_Post du formulaire de contact et à la reception avec tinymce
 
    public function message(){
        extract($_POST);
        $this->_msg = nl2br(preg_replace('#^<br/>$#','',htmlspecialchars($msg)));
        $this->_objet = nl2br(preg_replace('#^<br/>$#','',htmlspecialchars($object)));
        $this->_expediteur = nl2br(preg_replace('#^<br/>$#','',htmlspecialchars($name)));
        $this->_email = nl2br(preg_replace('#^<br/>$#','',htmlspecialchars($email)));
    }
  
    // Permet d'envoyer un email si les champs ne sont pas vides.
   
    public  function email($function){
        $this->message();
        if(!empty($this->_msg)&& !empty($this->_objet)&& !empty($this->_expediteur)&& !empty($this->_email) && (filter_var($this->_email, FILTER_VALIDATE_EMAIL) == false)){
            $this->$function();
        }
        else{
            $this->sendEmail();
        }
    }
    //Envoie un mail apres le formulaire de contact.
    public function sendEmail(){
        
        $this->message();
        $destinataire = $this->_destinataire;
        $expediteur = $this->_expediteur;
        $objet = $this->_objet;
        $email = $this->_email;
        $this->recaptcha();
        $headers = 'MIME-Version: 1.0' . "\n";
        $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n";
        $headers .= 'Reply-To: ' . $email . "\n";
        $headers .= 'From: "Expediteur"<' . $expediteur . '>' . "\n";
        $headers .= 'Delivered-to: ' . $destinataire . "\n";
        $msg = '<div style="width: 100%; text-align: center; font-weight: bold">' . $this->_msg . '</div>';
          mail($destinataire, $objet, $msg, $headers);       
        $this->messag();        
        require('views/contactView.php');
               
    }
    
    //recaptcha
    public function recaptcha(){
        // Ma clé privée
        $secret = "6LcuTHUUAAAAALwpwWEfBeZDf0DyXy-VHQlcNsNP";
        // Paramètre renvoyé par le recaptcha
        $response = $_POST['g-recaptcha-response'];
        // On récupère l'IP de l'utilisateur
        $remoteip = $_SERVER['REMOTE_ADDR'];
        
        $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
            . $secret
            . "&response=" . $response
            . "&remoteip=" . $remoteip ;
        
        $decode = json_decode(file_get_contents($api_url), true);
        
        if ($decode['success'] == true) {
            // C'est un humain
        }
        
        else {
            // C'est un robot ou le code de vérification est incorrecte
        }
        
    }

    public function messag(){
          echo "<div id ='message'>Message envoyé avec succès</div>";

    }

}


