function direBonjour() {
    alert("Hello depuis JavaScript 👋");
  }

  document.addEventListener("DOMContentLoaded", () => {
    const burger = document.getElementById("burger");
    const menu = document.getElementById("menu");
    const body = document.body;
  
    const line1 = document.getElementById("line1");
    const line2 = document.getElementById("line2");
    const line3 = document.getElementById("line3");
  
    burger.addEventListener("click", () => {
      // Affiche / cache le menu
      menu.classList.toggle("hidden");
  
      // Bloque / débloque le scroll
      body.classList.toggle("overflow-hidden");
  
      // Animation burger → croix
      line1.classList.toggle("rotate-45");
      line1.classList.toggle("translate-y-1.5");
  
      line2.classList.toggle("opacity-0");
  
      line3.classList.toggle("-rotate-45");
      line3.classList.toggle("-translate-y-1.5");
    });
  });
  