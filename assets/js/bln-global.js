(function () {
  'use strict';

  var toggle = document.getElementById('mobileToggle');
  var links = document.getElementById('navLinks');
  if (toggle && links) {
    toggle.addEventListener('click', function () {
      links.classList.toggle('open');
    });
  }

  window.addEventListener('scroll', function () {
    var nav = document.querySelector('.nav');
    if (nav) nav.classList.toggle('scrolled', window.scrollY > 10);
  });
})();
