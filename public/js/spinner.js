  // Wait for the entire page to load
  window.addEventListener("load", () => {
    const preloader = document.getElementById("preloader");
    const content = document.getElementById("content");
  
    // Hide the preloader and show the content
    preloader.style.opacity = "0"; // Smooth fade-out effect
    preloader.style.transition = "opacity 0.5s ease"; // Duration of the fade-out
  
    // Remove preloader after fade-out completes
    setTimeout(() => {
      preloader.style.display = "none";
      content.style.display = "block";
    }, 500); // Match the transition duration
  });