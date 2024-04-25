
  window.onscroll = function() {
    showTopButton();
  };
  
  function showTopButton() {
    var topButton = document.getElementById("topButton");
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      topButton.style.display = "block";
    } else {
      topButton.style.display = "none";
    }
  }
  
  function scrollToTop() {
      const topElement = document.documentElement || document.body;
    topElement.scrollIntoView({ behavior: 'smooth' });
    
  }
  window.onload = function () {
    window.scrollTo(0, 0);
};
// Fonction pour vérifier si un élément est visible à l'écran
function isElementInViewport(element) {
  var rect = element.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

// Fonction pour gérer le scroll
