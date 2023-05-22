document.addEventListener("DOMContentLoaded", function() {
    var navLinks = document.querySelectorAll("nav ul li a");
  
    navLinks.forEach(function(link) {
      link.addEventListener("click", function(event) {
        event.preventDefault();
        
        // Remove active class from all links
        navLinks.forEach(function(lnk) {
          lnk.classList.remove("active");
        });
  
        // Add active class to the clicked link
        link.classList.add("active");
  
        // Get the href value of the clicked link
        var href = link.getAttribute("href");
  
        // Check if the href value is not empty or #
        if (href && href !== "#") {
          // Delay the navigation to allow the color change to be visible
          setTimeout(function() {
            window.location.href = href;
          }, 300); // Adjust the delay time (in milliseconds) as needed
        }
      });
    });
  
    var currentURL = window.location.href;
  
    navLinks.forEach(function(link) {
      if (link.getAttribute("href") === currentURL) {
        link.classList.add("active");
      }
    });
  });
  