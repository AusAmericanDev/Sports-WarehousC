(() => {
  const heroBanner = document.querySelector(".hero-banner");
  if (!heroBanner) return;

  const slides = Array.from(heroBanner.querySelectorAll(".hero-slide"));
  const dots = Array.from(heroBanner.querySelectorAll(".hero-dot"));
  if (slides.length <= 1 || dots.length !== slides.length) return;

  let activeIndex = 0;
  let autoTimer = null;
  const autoplayDelayMs = 4500;

  function setActiveSlide(nextIndex) {
    activeIndex = (nextIndex + slides.length) % slides.length;

    slides.forEach((slide, index) => {
      slide.classList.toggle("is-active", index === activeIndex);
    });

    dots.forEach((dot, index) => {
      dot.classList.toggle("is-active", index === activeIndex);
      dot.setAttribute(
        "aria-current",
        index === activeIndex ? "true" : "false",
      );
    });
  }

  function restartAutoplay() {
    if (autoTimer) {
      window.clearInterval(autoTimer);
    }

    autoTimer = window.setInterval(() => {
      setActiveSlide(activeIndex + 1);
    }, autoplayDelayMs);
  }

  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      setActiveSlide(index);
      restartAutoplay();
    });
  });

  heroBanner.addEventListener("mouseenter", () => {
    if (autoTimer) {
      window.clearInterval(autoTimer);
      autoTimer = null;
    }
  });

  heroBanner.addEventListener("mouseleave", () => {
    restartAutoplay();
  });

  setActiveSlide(0);
  restartAutoplay();
})();

(() => {
  const cartCounts = Array.from(document.querySelectorAll(".cart-count"));
  if (cartCounts.length === 0) return;

  let isActive = false;

  function setCartState(nextState) {
    isActive = nextState;
    cartCounts.forEach((cartCount) => {
      cartCount.classList.toggle("is-active", isActive);
      cartCount.setAttribute("aria-pressed", String(isActive));
    });
  }

  cartCounts.forEach((cartCount) => {
    cartCount.setAttribute("role", "button");
    cartCount.setAttribute("tabindex", "0");
    cartCount.setAttribute("aria-pressed", "false");

    cartCount.addEventListener("click", () => {
      setCartState(!isActive);
    });

    cartCount.addEventListener("keydown", (event) => {
      if (event.key === "Enter" || event.key === " ") {
        event.preventDefault();
        setCartState(!isActive);
      }
    });
  });
})();
