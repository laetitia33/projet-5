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

//remonter du bas vers le haut de la page
$(document).ready(function() {
     $('a[href=#top]').click(function(){
          $('html, body').animate({scrollTop:0}, 'slow');
          return false;
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



//heure sur formulaire d'entree de film
var timeControl = document.querySelector('input[type="time"]');

var startTime = document.getElementById("startTime");
var valueSpan = document.getElementById("value");

startTime.addEventListener("input", function() {
  valueSpan.innerText = startTime.value;
}, false);




var NS4 = (document.layers);    // Which browser?
var IE4 = (document.all);
var win = window;    // window to search.
var n   = 0;
function findInPage(str) {
var txt, i, found;
if (str == "")
return false;
// Find next occurance of the given string on the page, wrap around to the
// start of the page if necessary.
if (NS4) {
// Look for match starting at the current point. If not found, rewind
// back to the first match.
if (!win.find(str))
while(win.find(str, false, true))
n++;
else
n++;
// If not found in either direction, give message.
if (n == 0)
alert("Je suis navré, je n'ai rien trouvé. Vérifiez l'orthographe.");
}
if (IE4) {
txt = win.document.body.createTextRange();
// Find the nth match from the top of the page.
for (i = 0; i <= n && (found = txt.findText(str)) != false; i++) {
txt.moveStart("character", 1);
txt.moveEnd("textedit");
}
// If found, mark it and scroll it into view.
if (found) {
txt.moveStart("character", -1);
txt.findText(str);
txt.select();
txt.scrollIntoView();
  n++;
  }
// Otherwise, start over at the top of the page and find first match.

else {
if (n > 0) {
n = 0;
findInPage(str);
}
// Not found anywhere, give message.
else
alert("Je suis navré, je n'ai rien trouvé. Vérifiez l'orthographe.");
}
}
return false;
}