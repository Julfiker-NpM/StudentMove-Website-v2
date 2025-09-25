document.addEventListener('DOMContentLoaded', () => {
  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth' });
      }
    });
  });

  // Animated counters
  const counters = document.querySelectorAll('.counter');
  const speed = 150;
  const animateCounters = () => {
    counters.forEach(counter => {
      const animate = () => {
        const value = +counter.getAttribute('data-target');
        const data = +counter.innerText;
        const increment = value / speed;
        if (data < value) {
          counter.innerText = Math.ceil(data + increment);
          setTimeout(animate, 8);
        } else {
          counter.innerText = value;
        }
      };
      animate();
    });
  };

  let statsVisible = false;
  window.addEventListener('scroll', () => {
    const statsSection = document.getElementById('stats');
    if (!statsVisible && statsSection && window.scrollY + window.innerHeight > statsSection.offsetTop + 60) {
      animateCounters();
      statsVisible = true;
    }
  });
});


