//page d'accueil

anime.timeline({loop: true})
  .add({
    targets: '.ml5 .line',
    opacity: [0.5,1],
    scaleX: [0, 1],
    easing: "easeInOutExpo",
    duration: 700
  }).add({
    targets: '.ml5 .line',
    duration: 600,
    easing: "easeOutExpo",
    translateY: function(e, i, l) {
      var offset = -0.625 + 0.625*2*i;
      return offset + "em";
    }
  }).add({
    targets: '.ml5 .ampersand',
    opacity: [0,1],
    scaleY: [0.5, 1],
    easing: "easeOutExpo",
    duration: 600,
    offset: '-=600'
  }).add({
    targets: '.ml5 .letters-left',
    opacity: [0,1],
    translateX: ["0.5em", 0],
    easing: "easeOutExpo",
    duration: 600,
    offset: '-=300'
  }).add({
    targets: '.ml5 .letters-right',
    opacity: [0,1],
    translateX: ["-0.5em", 0],
    easing: "easeOutExpo",
    duration: 600,
    offset: '-=600'
  }).add({
    targets: '.ml5',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });


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
