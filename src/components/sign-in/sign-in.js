// Open the sign-in pop-up
var openPopupButtons = document.getElementsByClassName("openPopup");
for (var i = 0; i < openPopupButtons.length; i++) {
  openPopupButtons[i].addEventListener("click", function() {
    document.getElementById("popupOverlay").style.display = "block";
    document.getElementById("popupContainer").style.display = "block";
  });
}

// Close the sign-in pop-up
document.getElementById("popupOverlay").addEventListener("click", function() {
  document.getElementById("popupOverlay").style.display = "none";
  document.getElementById("popupContainer").style.display = "none";
});