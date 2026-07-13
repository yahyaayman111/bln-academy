(function () {
  'use strict';

  var contactForm = document.getElementById('contactForm');
  var contactSuccess = document.getElementById('contactSuccess');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      contactForm.style.display = 'none';
      if (contactSuccess) contactSuccess.style.display = 'block';
    });
  }

  var regForm = document.getElementById('regForm');
  var regCard = document.getElementById('registerCard');
  var regSuccess = document.getElementById('successMessage');
  var formFooter = document.getElementById('formFooter');
  if (regForm) {
    regForm.addEventListener('submit', function (e) {
      e.preventDefault();
      regForm.style.display = 'none';
      if (formFooter) formFooter.style.display = 'none';
      if (regSuccess) regSuccess.style.display = 'block';
    });
  }
})();
