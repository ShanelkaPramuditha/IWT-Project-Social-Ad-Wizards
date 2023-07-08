window.addEventListener('DOMContentLoaded', function () {
   var alertBox = document.createElement('div');
   alertBox.classList.add('alert-box');
   alertBox.textContent = oMessage;
   document.body.appendChild(alertBox);
   setTimeout(function () {
       alertBox.style.display = 'none';
       window.location.href = "./src/views/home.php";
   }, 3000); // 3 sec
});