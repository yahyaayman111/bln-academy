(function () {
  "use strict";

  // ── Mobile menu toggle ──────────────────────────────────────────────────
  var toggle = document.getElementById("mobileToggle");
  var links = document.getElementById("navLinks");
  if (toggle && links) {
    toggle.addEventListener("click", function () {
      links.classList.toggle("open");
    });
  }

  // ── Scroll shadow on nav ────────────────────────────────────────────────
  window.addEventListener("scroll", function () {
    var scrolled = window.scrollY > 10;
    var nav = document.querySelector(".nav");
    if (nav) nav.classList.toggle("scrolled", scrolled);
    var elHeaders = document.querySelectorAll(
      ".elementor-location-header, header.elementor-section"
    );
    for (var i = 0; i < elHeaders.length; i++) {
      elHeaders[i].classList.toggle("is-scrolled", scrolled);
    }
  });

  // ── Floating motif characters ───────────────────────────────────────────
  // Injects animated mathematical/letter characters into hero and quote
  // sections, matching the Vercel reference design.
  var motifChars = ["7", "A", "2", "5", "3", "X", "0", "\u03A3", "B", "\u221E", "\u0394", "9"];
  var motifPositions = [
    { top: "12%", left: "8%", size: 72 },
    { top: "25%", right: "12%", size: 48 },
    { bottom: "20%", left: "15%", size: 96 },
    { top: "60%", right: "6%", size: 56 },
    { top: "15%", right: "30%", size: 40 },
    { bottom: "30%", right: "25%", size: 64 },
    { top: "45%", left: "5%", size: 36 },
    { bottom: "10%", right: "35%", size: 80 },
    { top: "8%", left: "40%", size: 44 },
    { bottom: "40%", left: "30%", size: 52 },
    { top: "70%", left: "45%", size: 38 },
    { top: "35%", left: "55%", size: 60 },
  ];

  function injectMotifs(container) {
    if (!container || container.querySelector(".motifs")) return;

    var motifsDiv = document.createElement("div");
    motifsDiv.className = "motifs";
    motifsDiv.setAttribute("aria-hidden", "true");

    for (var i = 0; i < motifChars.length && i < motifPositions.length; i++) {
      var span = document.createElement("span");
      span.className = "motif-char";
      span.textContent = motifChars[i];
      span.style.fontSize = motifPositions[i].size + "px";
      if (motifPositions[i].top) span.style.top = motifPositions[i].top;
      if (motifPositions[i].bottom) span.style.bottom = motifPositions[i].bottom;
      if (motifPositions[i].left) span.style.left = motifPositions[i].left;
      if (motifPositions[i].right) span.style.right = motifPositions[i].right;
      motifsDiv.appendChild(span);
    }

    container.style.position = "relative";
    container.style.overflow = "hidden";
    container.insertBefore(motifsDiv, container.firstChild);
  }

  // Find hero-like sections (full viewport height with dark background)
  // and quote sections, then inject motifs
  function initMotifs() {
    var sections = document.querySelectorAll(
      ".e-con.e-parent, .elementor-section"
    );
    for (var i = 0; i < sections.length; i++) {
      var section = sections[i];
      var style = window.getComputedStyle(section);
      var height = section.offsetHeight;
      var bg = style.backgroundColor;

      // Hero sections: tall sections with dark backgrounds
      if (height > window.innerHeight * 0.8 && isDarkColor(bg)) {
        injectMotifs(section);
      }
      // Quote sections: medium sections with dark backgrounds
      else if (height > 200 && height < 600 && isDarkColor(bg)) {
        injectMotifs(section);
      }
    }
  }

  function isDarkColor(color) {
    if (!color || color === "transparent" || color === "rgba(0, 0, 0, 0)")
      return false;
    var match = color.match(
      /rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*[\d.]+)?\)/
    );
    if (!match) return false;
    var r = parseInt(match[1], 10);
    var g = parseInt(match[2], 10);
    var b = parseInt(match[3], 10);
    var luminance = (0.299 * r + 0.587 * g + 0.114 * b) / 255;
    return luminance < 0.4;
  }

  // Run on DOM ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initMotifs);
  } else {
    initMotifs();
  }
})();