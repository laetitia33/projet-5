

 // ecriture phrase  d'accueil dans la liste des films


$('.ml12').each(function(){
  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
});

anime.timeline()
  .add({
    targets: '.ml12 .letter',
    opacity: [0,1],
    easing: "easeInOutQuad",
    duration: 2250,
    delay: function(el, i) {
      return 150 * (i+1)
    }

  });  


 //ouverture/fermeture des mentions légales
$( "#legal" ).click(function() {
  $( "#legalnotice" ).fadeIn( "slow", function() {
    // Animation complete
  });
});


$( "#closelegal" ).click(function() {
  $( "#legalnotice" ).fadeOut( "slow", function() {
    // Animation complete.
  });
});

//remonter du bas vers le haut de la page
$(document).ready(function() { 
      $('a[href=#top]').click(function(){

          $('html, body').animate({scrollTop:0}, 'slow');
          return false;
     });
});


//faire apparaitre et disparaitre le menu en responsive
  $(function() {
    $('#show_menu').click(function() {
      $('#mainmobil').first().show('slow', function showNextOne() {
        $(this).next('#mainmobil').show('slow', showNextOne);
      });    
    });
    $('#closemenu').click(function() {
      $('#mainmobil').first().hide('slow', function hideNextOne() {
        $(this).next('#mainmobil').hide('slow', hideNextOne);

      });
          
    });
  });



//ancre vers l'acceuil
$(document).ready(function() {
     $('a[href=#navigation]').click(function(){
          $('html, body').animate({scrollTop:$("#navigation").offset().top}, 'slow');
          return false;
     });
});

//ancre du bouton chapitre vers la liste des chapitres dans la page
$(document).ready(function() {
 
     $('a[href=#episodes]').click(function(){
          $('html, body').animate({scrollTop:$("#episodes").offset().top}, 'slow');
          return false;
     });
});


//fermeture du message alerte
$(document).ready(function(){
    setTimeout(function(){$("#message").fadeOut('normal');}, 5000);
});


//menu responsive
// On attend que la page soit chargée 
jQuery(document).ready(function()
{
   // On cache la zone de texte
   jQuery('#toggle').hide();
   // toggle() lorsque le lien avec l'ID #toggler est cliqué
   jQuery('a#toggler').click(function()
  {
      jQuery('#toggle').toggle(400);
      return false;
   });
});



//Validation des formulaires

$(function() {
  //valider mot de passe et pseudo
    jQuery.validator.addMethod("selectnic", function (value, element) {
        if (/^[a-zA-Z0-9]+$/i.test(value)) {
            return true;
        } else {
            return false;
        };
    }, "Seuls les caractères alphanumériques sont autorisés");


    //valider adresse mail
   jQuery.validator.addMethod("email", function (value, element) {
          if (/^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$/i.test(value)) {
              return true;
          } else {
              return false;
          };
      }, "Adresse email non valide");


$('form[class="form"]').validate(
    {
         onkeyup : false, 
        ignore: "",

        rules:
        {

            title :'required',

            horaires:'required',

            duree:'required',

            author:"required",

            image :'required',
            
            content:'required',

            comment:'required',

            video:'required',

            object:'required',
            
            msg:'required',

            name:
            {   
                required: true,
                minlength: 3,
            
            } ,    

            pseudo:
            {
                required: true,
                minlength: 3,
                maxlength: 20,
                selectnic:true,
               
            },


            password:
            {
                required: true,
                minlength: 6,
                selectnic:true,
            },


            password_confirm : {
                required : true,
                equalTo : "#password",

            },

            email:{
              required:true,
              email:true,
              minlength: 3,
            }
      
           

        },
        messages: 
        {
          
            title:'Veuillez entrer un titre ',

            horaires:'Veuillez entrer un horaire ',

            duree:'Veuillez entrer une durée ',

            author: 'Veuillez entrer un auteur ',

            image :'veuillez entrer une affiche de film',
           
            content:'veuillez entrer un résumé',

            msg:'veuillez entrer votre message',

            name :{
              required :'Ce champ est requis',
              minlength :'Veuillez entrer au moins 3 caractères'

            },

            object :'Ce champ est requis',

            video :'veuillez entrer le code de la vidéo',

            comment:'veuillez entrer un commentaire',

            email:   {
                required: 'Ce champ est requis ',
                minlength: "Veuillez entrer au moins 3 caractères"
               
            },
            

            pseudo:
            {
                required: 'Ce champ est requis ',
                minlength: "Veuillez entrer au moins 3 caractères",
                maxlength: "Veuillez ne pas dépasser 20 caractères"
            },

         
            password: {
                required: 'Mot de passe requis',
                minlength: "Veuillez insérer au moins 6 caractères"
            
            },

            password_confirm : {
                required: 'Veuillez confirmer votre mot de passe',
                equalTo : "les deux mots de passe doivent être identiques"
            },

          

        },

        submitHandler: function (form)
        {
            return true;
        }
    });



});






//formulaire pour login
$(function() {


  jQuery.validator.addMethod("selectnic", function (value, element) {
        if (/^[a-zA-Z0-9]+$/i.test(value)) {
            return true;
        } else {
            return false;
        };
  }, "Seuls les caractères alphanumériques sont autorisés");


$('form[class="formLogin"]').validate(
    {


        onkeyup : false,    
        ignore: "",

        rules:
        {

            pseudo:
            {
                required: true,
                minlength: 3,
                selectnic:true    
            },

            pass:
            {
                required: true,
                minlength: 6,
                selectnic:true 
            },

          
        },

        messages: 
        {
            
            pseudo:
            {
                required: 'Ce champ est requis',
                minlength: "Veuillez insérer au moins 3 caractères"
               
            },

            pass: {
              required: 'mot de passe requis',
              minlength: "Veuillez insérer au moins 6 caractères"
            
            },
      

        },

        submitHandler: function (form)
        {
            return true;
        }
    });



});



//ouverture de la meteo page information

 $(".accordion").on("click", ".accordion-header", function() {
  $(this).toggleClass("active").next().slideToggle();
 });


//fenetre modale ouvrant la page youtube
//----OPEN
$(function() {

  $('[data-popup-open]').on('click', function(e) {
    var targeted_popup_class = jQuery(this).attr('data-popup-open');
    $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

    e.preventDefault();
  });

  //----- CLOSE

  $('[data-popup-close]').on('click', function(e) {
    var targeted_popup_class = jQuery(this).attr('data-popup-close');
    $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);


    e.preventDefault();

  });

//arreter la video a la fermeture de la modale
jQuery('[data-popup-close]').click(function (e) {
  var $videoEl = jQuery(this).closest('.popup-inner').find('iframe');
  $videoEl.attr('src', $videoEl.attr('src'));
});

  
});




