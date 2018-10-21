//pagination liste des films


var anumberOfItems = $('#page .list-group').length; 
var alimitPerPage = 2; 
$('#page .list-group:gt(' + (alimitPerPage - 1) + ')').hide(); 
var atotalPages = Math.round(anumberOfItems / alimitPerPage); 
$(".pagination").append("<li class='current-page active'><a href='javascript:void(0)'> " + 1 + "</a></li> "); 

for (var i = 2; i <= atotalPages; i++) {
  $(".pagination").append("<li class='current-page'><a href='javascript:void(0)'>" + i + "</a></li> "); 
}

// Add next button after all the page numbers  
$(".pagination").append("<li id='next-page'><a href='javascript:void(0)' aria-label=Next><span aria-hidden=true>&raquo;</span></a></li>");

// Function that displays new items based on page number that was clicked
$(".pagination li.current-page").on("click", function() {
  // Check if page number that was clicked on is the current page that is being displayed
  if ($(this).hasClass('active')) {
    return false; 
  } else {
    var acurrentPage = $(this).index(); 
    $(".pagination li").removeClass('active'); 
    $(this).addClass('active');
    $("#page .list-group").hide(); 
    var agrandTotal = alimitPerPage * acurrentPage; 

    // Loop through total items, selecting a new set of items based on page number
    for (var i = agrandTotal - alimitPerPage; i < agrandTotal; i++) {
      $("#page .list-group:eq(" + i + ")").show(); 
    }
  }

});

// Function to navigate to the next page when users click on the next-page id (next page button)
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

// Function to navigate to the previous page when users click on the previous-page id (previous page button)
$("#previous-page").on("click", function() {
  var acurrentPage = $(".pagination li.active").index(); 
  // Check to make sure that users is not on page 1 and attempting to navigating to a previous page
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
  $(".pagination1").append("<li class='current-page'><a href='javascript:void(0)'>" + i + "</a></li> "); // Insert page number into pagination tabs
}

// Add next button after all the page numbers  
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

// Function to navigate to the next page when users click on the next-page id (next page button)
$("#next-page").on("click", function() {
  var currentPage = $(".pagination1 li.active").index(); 

  if (currentPage === totalPages) {
    return false; 
  } else {
    currentPage++; 
    $(".pagination1 li").removeClass('active'); 
    $(".page1 .commentaires").hide(); 
    var grandTotal = limitPerPage * currentPage; 

    // Loop through total items, selecting a new set of items based on page number
    for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
      $(".page1 .commentaires:eq(" + i + ")").show(); 
    }

    $(".pagination1 li.current-page:eq(" + (currentPage - 1) + ")").addClass('active'); 
  }
});

// Function to navigate to the previous page when users click on the previous-page id (previous page button)
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


