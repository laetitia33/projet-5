//pagination liste des films


var anumberOfItems = $('#page .list-group').length; 
var alimitPerPage = 2; 
$('#page .list-group:gt(' + (alimitPerPage - 1) + ')').hide(); 
var atotalPages = Math.round(anumberOfItems / alimitPerPage); 
$(".pagination").append("<li class='current-page active'><a href='javascript:void(0)'> " + 1 + "</a></li> "); 

for (var i = 2; i <= atotalPages; i++) {
  $(".pagination").append("<li class='current-page'><a href='javascript:void(0)'>" + i + "</a></li> "); 
}

// bouton next
$(".pagination").append("<li id='next-page'><a href='javascript:void(0)' aria-label=Next><span aria-hidden=true>&raquo;</span></a></li>");

//// Fonction qui affiche les nouveaux éléments en fonction du numéro de page sur lequel l'utilisateur a cliqué
$(".pagination li.current-page").on("click", function() {
  // Vérifie si le numéro de page sur lequel l'utilisateur a cliqué est la page en cours d'affichage
  if ($(this).hasClass('active')) {
    return false; 
  } else {
    var acurrentPage = $(this).index(); 
    $(".pagination li").removeClass('active'); 
    $(this).addClass('active');
    $("#page .list-group").hide(); 
    var agrandTotal = alimitPerPage * acurrentPage; 

//Parcourt le nombre total d'éléments en sélectionnant un nouvel ensemble d'éléments en fonction du numéro de page.
   
    for (var i = agrandTotal - alimitPerPage; i < agrandTotal; i++) {
      $("#page .list-group:eq(" + i + ")").show(); 
    }
  }

});


//Fonction permettant de passer à la page suivante lorsque les utilisateurs cliquent sur l'id de la page suivante (bouton de la page suivante)
$("#next-page").on("click", function() {
  var acurrentPage = $(".pagination li.active").index(); 
  if (acurrentPage === atotalPages) {
    return false; 
  } else {
    acurrentPage++; 
    $(".pagination li").removeClass('active'); 
    $("#page .list-group").hide(); 
    var agrandTotal = alimitPerPage * acurrentPage; 


    for (var i = agrandTotal - alimitPerPage; i < agrandTotal; i++) {
      $("#page .list-group:eq(" + i + ")").show(); 
    }

    $(".pagination li.current-page:eq(" + (acurrentPage - 1) + ")").addClass('active'); 
  }
});


//Fonction permettant de naviguer vers la page précédente lorsque les utilisateurs cliquent sur l'id de la page précédente (bouton de la page précédente)
$("#previous-page").on("click", function() {
  var acurrentPage = $(".pagination li.active").index(); 
  // Assurez-vous que les utilisateurs ne sont pas à la page 1 et tentent de naviguer vers une page précédente
  if (acurrentPage === 1) {
    return false; 
  } else {
    acurrentPage--; 
    $(".pagination li").removeClass('active'); 
    $("#page .list-group").hide(); 
    var agrandTotal = alimitPerPage * acurrentPage; 

    for (var i = agrandTotal - alimitPerPage; i < agrandTotal; i++) {
      $("#page .list-group:eq(" + i + ")").show();
    }

    $(".pagination li.current-page:eq(" + (acurrentPage - 1) + ")").addClass('active'); 
  }
});

  if(anumberOfItems ==0 ){
     $(".pagination").css("display","none");
  }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////pagination pour commentaires, utilsateurs et commentaires signalés///////////////////////////////////





var numberOfItems = $('.page1 .commentaires').length; 
var limitPerPage = 2; 
$('.page1 .commentaires:gt(' + (limitPerPage - 1) + ')').hide(); 
var totalPages = Math.round(numberOfItems / limitPerPage); 
$(".pagination1").append("<li class='current-page active'><a href='javascript:void(0)'> " + 1 + "</a></li> "); 


for (var i = 2; i <= totalPages; i++) {
  $(".pagination1").append("<li class='current-page'><a href='javascript:void(0)'>" + i + "</a></li> "); 
}

// Ajouter le bouton suivant après tous les numéros de page
$(".pagination1").append("<li id='next-page'><a href='javascript:void(0)' aria-label=Next><span aria-hidden=true>&raquo;</span></a></li>");


$(".pagination1 li.current-page").on("click", function() {

  if ($(this).hasClass('active')) {
    return false; 
  } else {
    var currentPage = $(this).index(); 
    $(".pagination1 li").removeClass('active'); 
    $(this).addClass('active'); 
    $(".page1 .commentaires").hide(); 
    var grandTotal = limitPerPage * currentPage; 


    for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
      $(".page1 .commentaires:eq(" + i + ")").show(); 
    }
  }

});

// Fonction permettant de passer à la page suivante lorsque les utilisateurs cliquent sur l'id de la page suivante (bouton de la page suivante)
$("#next-page").on("click", function() {
  var currentPage = $(".pagination1 li.active").index(); 

  if (currentPage === totalPages) {
    return false; 
  } else {
    currentPage++; 
    $(".pagination1 li").removeClass('active'); 
    $(".page1 .commentaires").hide(); 
    var grandTotal = limitPerPage * currentPage; 

    //Parcourt le nombre total d'éléments en sélectionnant un nouvel ensemble d'éléments en fonction du numéro de page.
    for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
      $(".page1 .commentaires:eq(" + i + ")").show(); 
    }

    $(".pagination1 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active'); 
  }
});

// Fonction permettant de naviguer vers la page précédente lorsque les utilisateurs cliquent sur l'id de la page précédente (bouton de la page précédente)
$("#previous-page").on("click", function() {
  var currentPage = $(".pagination1 li.active").index(); 
  if (currentPage === 1) {
    return false; 
  } else {
    currentPage--; 
    $(".pagination1 li").removeClass('active');
    $(".page1 .commentaires").hide(); 
    var grandTotal = limitPerPage * currentPage; 

    for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
      $(".page1 .commentaires:eq(" + i + ")").show(); 
    }

    $(".pagination1 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active'); 
  }

  


});


if(numberOfItems ==0 ){
     $(".pagination1").css("display","none");
  }


