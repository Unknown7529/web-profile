/* =============================================
   PORTFOLIO — main.js
   ============================================= */

// ---- Navbar scroll effect ----
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
  navbar.classList.toggle('scrolled', window.scrollY > 50);
});

// ---- Mobile nav toggle ----
const navToggle = document.getElementById('navToggle');
const navLinks  = document.getElementById('navLinks');
navToggle.addEventListener('click', () => {
  navLinks.classList.toggle('open');
  const spans = navToggle.querySelectorAll('span');
  const open  = navLinks.classList.contains('open');
  spans[0].style.transform = open ? 'translateY(7px) rotate(45deg)' : '';
  spans[1].style.opacity   = open ? '0' : '1';
  spans[2].style.transform = open ? 'translateY(-7px) rotate(-45deg)' : '';
});
navLinks.querySelectorAll('a').forEach(a => {
  a.addEventListener('click', () => {
    navLinks.classList.remove('open');
    navToggle.querySelectorAll('span').forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
  });
});

// ---- Back to top ----
const backToTop = document.getElementById('backToTop');
window.addEventListener('scroll', () => {
  backToTop.classList.toggle('visible', window.scrollY > 400);
});
backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

// ---- Intersection Observer ----
const io = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (!entry.isIntersecting) return;

    const el = entry.target;

    // Animate skill bars
    if (el.classList.contains('skill-card')) {
      const bar = el.querySelector('.skill-bar-fill');
      if (bar) bar.style.width = bar.dataset.level + '%';
    }

    // Animate counters (hero stats)
    if (el.classList.contains('hero-stats')) {
      el.querySelectorAll('.stat-num').forEach(num => {
        const target = parseInt(num.dataset.target, 10);
        let current = 0;
        const step = Math.ceil(target / 50);
        const timer = setInterval(() => {
          current = Math.min(current + step, target);
          num.textContent = current;
          if (current >= target) clearInterval(timer);
        }, 30);
      });
    }

    // Fade-in animation for generic elements
    el.style.opacity   = '1';
    el.style.transform = 'translateY(0)';

    io.unobserve(el);
  });
}, { threshold: 0.15 });

// Apply initial hidden state & observe
document.querySelectorAll('.skill-card, .project-card, .timeline-item, .highlight, .contact-item').forEach(el => {
  el.style.opacity   = '0';
  el.style.transform = 'translateY(24px)';
  el.style.transition = 'opacity .55s ease, transform .55s ease';
  io.observe(el);
});
const heroStats = document.querySelector('.hero-stats');
if (heroStats) io.observe(heroStats);

// ---- Active nav link on scroll ----
const sections = document.querySelectorAll('section[id]');
const navItems = document.querySelectorAll('.nav-links a');
window.addEventListener('scroll', () => {
  let current = '';
  sections.forEach(sec => {
    if (window.scrollY >= sec.offsetTop - 100) current = sec.id;
  });
  navItems.forEach(a => {
    a.style.color = a.getAttribute('href') === '#' + current
      ? 'var(--violet)' : '';
  });
});

// ---- Smooth appear on load ----
document.body.style.opacity = '0';
document.body.style.transition = 'opacity .4s';
window.addEventListener('load', () => { document.body.style.opacity = '1'; });
