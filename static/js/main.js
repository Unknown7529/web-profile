/* ========================
   NAV SCROLL
   ======================== */
const nav = document.getElementById('nav');
window.addEventListener('scroll', () => {
  nav.classList.toggle('scrolled', window.scrollY > 40);
});

/* ========================
   TYPING EFFECT
   ======================== */
const titles = [
  'Full-Stack Developer',
  'UI / UX Engineer',
  'Python Enthusiast',
  'Open Source Builder',
];

let tIdx = 0, cIdx = 0, isDeleting = false;
const typedEl = document.getElementById('typedTitle');

function type() {
  const current = titles[tIdx];
  if (!isDeleting) {
    typedEl.textContent = current.slice(0, ++cIdx);
    if (cIdx === current.length) {
      isDeleting = true;
      setTimeout(type, 1800);
      return;
    }
  } else {
    typedEl.textContent = current.slice(0, --cIdx);
    if (cIdx === 0) {
      isDeleting = false;
      tIdx = (tIdx + 1) % titles.length;
    }
  }
  setTimeout(type, isDeleting ? 45 : 80);
}
setTimeout(type, 1200);

/* ========================
   ANIMATED GRID CANVAS
   ======================== */
const canvas = document.getElementById('gridCanvas');
const ctx = canvas.getContext('2d');
let dots = [], W, H, mouse = { x: -999, y: -999 };

function resize() {
  W = canvas.width  = canvas.parentElement.offsetWidth;
  H = canvas.height = canvas.parentElement.offsetHeight;
  initDots();
}

function initDots() {
  const COLS = Math.floor(W / 60);
  const ROWS = Math.floor(H / 60);
  dots = [];
  for (let r = 0; r <= ROWS; r++) {
    for (let c = 0; c <= COLS; c++) {
      dots.push({
        x: c * (W / COLS),
        y: r * (H / ROWS),
        ox: c * (W / COLS),
        oy: r * (H / ROWS),
        vx: 0, vy: 0
      });
    }
  }
}

canvas.parentElement.addEventListener('mousemove', e => {
  const rect = canvas.getBoundingClientRect();
  mouse.x = e.clientX - rect.left;
  mouse.y = e.clientY - rect.top;
});
canvas.parentElement.addEventListener('mouseleave', () => {
  mouse.x = -999; mouse.y = -999;
});

function drawFrame() {
  ctx.clearRect(0, 0, W, H);
  const R = 120;

  dots.forEach(d => {
    const dx = d.x - mouse.x;
    const dy = d.y - mouse.y;
    const dist = Math.sqrt(dx * dx + dy * dy);
    if (dist < R) {
      const force = (1 - dist / R) * 12;
      d.vx += (dx / dist) * force;
      d.vy += (dy / dist) * force;
    }
    d.vx += (d.ox - d.x) * 0.05;
    d.vy += (d.oy - d.y) * 0.05;
    d.vx *= 0.82;
    d.vy *= 0.82;
    d.x += d.vx;
    d.y += d.vy;

    ctx.beginPath();
    ctx.arc(d.x, d.y, 1.5, 0, Math.PI * 2);
    ctx.fillStyle = '#00D4AA';
    ctx.fill();
  });

  requestAnimationFrame(drawFrame);
}

window.addEventListener('resize', resize);
resize();
drawFrame();

/* ========================
   SCROLL REVEAL
   ======================== */
const observer = new IntersectionObserver(
  (entries) => entries.forEach(e => {
    if (e.isIntersecting) {
      e.target.classList.add('visible');
      observer.unobserve(e.target);
    }
  }),
  { threshold: 0.12 }
);

document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

/* ========================
   MOBILE MENU
   ======================== */
const burger = document.getElementById('navBurger');
const navLinks = document.querySelector('.nav-links');

burger.addEventListener('click', () => {
  const isOpen = navLinks.style.display === 'flex';
  if (isOpen) {
    navLinks.style.display = '';
    navLinks.style.flexDirection = '';
  } else {
    navLinks.style.display = 'flex';
    navLinks.style.flexDirection = 'column';
    navLinks.style.position = 'absolute';
    navLinks.style.top = '64px';
    navLinks.style.left = '0';
    navLinks.style.right = '0';
    navLinks.style.background = 'rgba(10,15,30,0.97)';
    navLinks.style.padding = '1.5rem 2rem';
    navLinks.style.gap = '1.5rem';
    navLinks.style.borderBottom = '1px solid #1E2D45';
    navLinks.style.backdropFilter = 'blur(12px)';
  }
});

navLinks.querySelectorAll('a').forEach(a => {
  a.addEventListener('click', () => {
    navLinks.style.display = '';
  });
});
