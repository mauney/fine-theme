jQuery(document).ready(function( $ ) {

  
  // open navigation menu
  $(".openbtn").on("click", function() {
    $("#sidenav").addClass("show-me");
    // document.getElementById("site-nav").style.width = "250px";
    // $(".site-nav").style.width = "100%";
  });
  
  // close navigation menu
  $(".closebtn").on("click", function() {
    $("#sidenav").removeClass("show-me");
    // $(".site-nav").style.width = "0";
  });
  
  // stick the tab calendar bar to the top when scrolling
  var stickyNavTop = $(window).width() / 2.4675; // magic number from header3.png aspect ratio
  console.log('stickyNavTop: ' + stickyNavTop);
  var stickyNav = function(){
    var scrollTop = $(window).scrollTop();
  	console.log('scrollTop: ' + scrollTop);
       
    if (scrollTop >= stickyNavTop) { 
      $('#tabs').addClass('sticky');
      $('.movie-day').css('margin-top', $("#tabs").outerHeight());
    } else {
      $('#tabs').removeClass('sticky');
      $('.movie-day').css('margin-top', "");
    }
  };
    
  stickyNav();
  
  // var scrollFires = 0;
  
  $(window).scroll(function() {
  	stickyNav();
  // 	scrollFires++;
  });
  
  // show content based on tab selection
  $("li.tab").click(function() {
    // console.log('scrollFires: ' + scrollFires);
    if ($(this).hasClass("current") !== true) {
      var tab = $(this).attr("data-tab");

      $("li.tab").removeClass("current");
      $(".movie-day").removeClass("current");

      $(this).addClass("current");
      $("#" + tab).addClass("current");
    }
    
    // scroll to top of movie content if tabs are sticky and a new tab is selected
    if ($('#tabs').hasClass('sticky')) {
      window.scrollTo(0, stickyNavTop);
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
