

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



//formulaire contact
  $('form[id="first_form"]').validate({
    ignore: "",
    rules: {
      message:'required',
      name: 'required',
      object: 'required',
      email: {
        required: true,
        email: true,
      }
  
    },
    messages: {
      message: 'Ce champ est requis',
      name: 'Ce champ est requis',
      object: 'Ce champ est requis',
      email: 'Entrez une adresse e-mail valide',
   
    },


     submitHandler: function(form) {
      form.submit();
    }
  });


//formualire login

$(document).ready(function() {

 $('form[id="second_form"]').validate({
    rules: {

        pseudo:{
          required:true,
          minlength: 7,
        },
         pass: {
          required: true,
          minlength: 6,
        }
    
    
        },


        messages: {
          pseudo: 'Veuillez entrer un pseudo valide',
          pass:  'Veuillez entrer un mot de passe valide',
           


        },

  });

})
//commentaire 


$(document).ready(function() {
 $('form[id="thirst_form"]').validate({


  ignore: "",
    rules: {

        author:"required",
        comment:'required',
       
        },

        messages: {
          author: 'Veuillez entrer un auteur valide',
          comment:'veuillez entrer un commentaire',
     
        },
  });

})


//formulaire edition d'un film 
 $(document).ready(function() {
 $('form[id="four_form"]').validate({


  ignore: "",
    rules: {
        title :'required',
        horaires:'required',
        duree:'required',
        author:"required",
        image :'required',
        content:'required',
       
        },

        messages: {
          title:'Veuillez entrer un titre ',
          horaires:'Veuillez entrer un horaire ',
          duree:'Veuillez entrer une durée ',
          author: 'Veuillez entrer un auteur ',
          image :'veuillez entrer une affiche de film',
          content:'veuillez entrer un résumé',
     
        },
  });

})




 $(document).ready(function() {
 $('form[id="five_form"]').validate({


  ignore: "",
    rules: {
        title :'required',
        horaires:'required',
        duree:'required',
        author:"required",
        image :'required',
        content:'required',
       
        },

        messages: {
          title:'Veuillez entrer un titre ',
          horaires:'Veuillez entrer un horaire ',
          duree:'Veuillez entrer une durée ',
          author: 'Veuillez entrer un auteur ',
          image :'veuillez entrer une affiche de film',
          content:'veuillez entrer un résumé',
     
        },
  });

})


//ouverture de la meteo page information

 $(".accordion").on("click", ".accordion-header", function() {
  $(this).toggleClass("active").next().slideToggle();
 });


//fenetre modale ouvrant la page youtube
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


