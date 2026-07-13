(function () {
  "use strict";

  var toggle = document.getElementById("mobileToggle");
  var links = document.getElementById("navLinks");
  if (toggle && links) {
    toggle.addEventListener("click", function () {
      links.classList.toggle("open");
    });
  }

  window.addEventListener("scroll", function () {
    var scrolled = window.scrollY > 10;
    var nav = document.querySelector(".nav");
    if (nav) nav.classList.toggle("scrolled", scrolled);
    var elHeaders = document.querySelectorAll(
      ".elementor-location-header, header.elementor-section",
    );
    for (var i = 0; i < elHeaders.length; i++) {
      elHeaders[i].classList.toggle("is-scrolled", scrolled);
    }
  });
})();
