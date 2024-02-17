const h1 = document.body.getElementsByTagName("h1").item(0);

// Animation using anime.js
anime({
  targets: h1,
  translateY: [
    { value: 50, duration: 500, easing: "easeInOutQuad" },
    { value: 0, duration: 800, easing: "easeInOutQuad" },
  ],
  color: [
    { value: "#3498db", duration: 500 },
    { value: "#e74c3c", duration: 800 },
  ],
  loop: true,
});
