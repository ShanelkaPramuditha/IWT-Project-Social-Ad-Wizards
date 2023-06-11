// Scroll with id
function scrollToSection(event, sectionId) {
   event.preventDefault();
   const section = document.getElementById(sectionId);
   if (section) {
      section.scrollIntoView({ behavior: 'smooth' });
      history.pushState(null, null, `#${sectionId}`);
   }
}

function navigateAndScroll(event, sectionId) {
   event.preventDefault();
   window.location.href = 'home.php#home';
   scrollToSection(sectionId);
 }
 