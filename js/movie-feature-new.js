jQuery(document).ready(function( $ ) {


  // open navigation menu
  $(".openbtn").on("click", function() {
    $("#sidenav").addClass("show-me");
    $("#fixed-nav").addClass("hide-me");
    // document.getElementById("site-nav").style.width = "250px";
    // $(".site-nav").style.width = "100%";
  });

  // close navigation menu
  $(".closebtn").on("click", function() {
    $("#sidenav").removeClass("show-me");
    $("#fixed-nav").removeClass("hide-me");
    // $(".site-nav").style.width = "0";
  });

  // show content based on tab selection
  $("li.tab").click(function() {
    if ($(this).hasClass("current") !== true) {
      var tab = $(this).attr("data-tab");

      $("li.tab").removeClass("current");
      $(".movie-day").removeClass("current");

      $(this).addClass("current");
      $("#" + tab).addClass("current");
    }
  });

  // show and hide extra movie content on button selection
  $(".toggle").next().hide();

  $(".toggle").click(function() {
    var toggle = $(this);
    $(this).next().slideToggle("fast", function() {
      if (toggle.html().slice(0,4) === "view") {
        toggle.html("hide movie info and preview &#9650;");
      } else {
        toggle.html("view movie info and preview &#9660;");
      }
    });
  });

});
