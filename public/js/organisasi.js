// Animasi masuk untuk kotak organisasi
document.addEventListener("DOMContentLoaded", () => {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("animate-fade-in");
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll(".org-box").forEach((box) => {
    observer.observe(box);
  });
});
