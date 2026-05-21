'use strict';

// Mobile nav toggle
const navToggle = document.getElementById('navToggle');
const navMenu = document.getElementById('navMenu');

navToggle.addEventListener('click', function () {
  navMenu.classList.toggle('active');
});

// Close nav on link click (mobile)
document.querySelectorAll('.nav-link, .dropdown-link').forEach(link => {
  link.addEventListener('click', function () {
    if (window.innerWidth <= 991) {
      navMenu.classList.remove('active');
    }
  });
});

// Dropdown toggle on mobile
document.querySelectorAll('.dropdown > .nav-link').forEach(dropdownToggle => {
  dropdownToggle.addEventListener('click', function (e) {
    if (window.innerWidth <= 991) {
      e.preventDefault();
      this.parentElement.classList.toggle('open');
    }
  });
});

// Back to top
const backToTop = document.getElementById('backToTop');
const progressRing = document.getElementById('progressRing');
const ringCircumference = 113.1;

window.addEventListener('scroll', function () {
  const scrollTop = window.scrollY;
  const docHeight = document.documentElement.scrollHeight - window.innerHeight;
  const progress = docHeight > 0 ? scrollTop / docHeight : 0;

  if (progressRing) {
    progressRing.style.strokeDashoffset = ringCircumference * (1 - progress);
  }

  if (scrollTop >= 300) {
    backToTop.classList.add('active');
  } else {
    backToTop.classList.remove('active');
  }
});

// Close mobile nav on resize
window.addEventListener('resize', function () {
  if (window.innerWidth > 991) {
    navMenu.classList.remove('active');
    document.querySelectorAll('.dropdown.open').forEach(el => el.classList.remove('open'));
  }
});

// Background Music
const bgMusic = document.getElementById('bgMusic');
const musicToggle = document.getElementById('musicToggle');
bgMusic.volume = 0.2;

function updateMusicIcon() {
  if (bgMusic.paused) {
    musicToggle.innerHTML = '<i class="fas fa-volume-xmark"></i> Music';
    musicToggle.classList.remove('playing');
  } else {
    musicToggle.innerHTML = '<i class="fas fa-volume-high"></i> Music';
    musicToggle.classList.add('playing');
  }
}

// Only auto-play on homepage
if (window.location.pathname === '/' || window.location.pathname === '') {
  const playPromise = bgMusic.play();
  if (playPromise !== undefined) {
    playPromise.then(() => { updateMusicIcon(); vizStart(); }).catch(() => {
      function startOnInteraction() {
        bgMusic.play().then(() => { updateMusicIcon(); vizStart(); }).catch(() => {});
        document.removeEventListener('click', startOnInteraction);
        document.removeEventListener('touchstart', startOnInteraction);
      }
      document.addEventListener('click', startOnInteraction);
      document.addEventListener('touchstart', startOnInteraction);
    });
  }
}

musicToggle.addEventListener('click', function () {
  if (bgMusic.paused) {
    bgMusic.play().then(() => { updateMusicIcon(); vizStart(); }).catch(() => {});
  } else {
    bgMusic.pause();
    updateMusicIcon();
    vizStop();
  }
});

// Music visualizer
const vizCanvas = document.getElementById('visualizer');
let vizCtx, analyser, srcNode, vizAnimId, vizRunning = false;

function vizStart() {
  if (vizRunning || !vizCanvas || window.location.pathname !== '/' && window.location.pathname !== '') return;
  try {
    const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
    if (audioCtx.state === 'suspended') audioCtx.resume();
    analyser = audioCtx.createAnalyser();
    analyser.fftSize = 64;
    srcNode = audioCtx.createMediaElementSource(bgMusic);
    srcNode.connect(analyser);
    analyser.connect(audioCtx.destination);
    vizCtx = vizCanvas.getContext('2d');
    vizRunning = true;
    vizCanvas.classList.add('active');
    const bufferLength = analyser.frequencyBinCount;
    const dataArray = new Uint8Array(bufferLength);
    function draw() {
      if (!vizRunning) return;
      vizAnimId = requestAnimationFrame(draw);
      analyser.getByteFrequencyData(dataArray);
      vizCtx.clearRect(0, 0, vizCanvas.width, vizCanvas.height);
      const hs = getComputedStyle(document.documentElement).getPropertyValue('--accent-hs').trim();
      const w = vizCanvas.width, h = vizCanvas.height;
      const step = w / bufferLength;
      vizCtx.beginPath();
      vizCtx.moveTo(0, h);
      dataArray.forEach((val, i) => {
        const y = h - (val / 255) * h;
        vizCtx.lineTo(i * step, y);
      });
      vizCtx.lineTo(w, h);
      vizCtx.closePath();
      vizCtx.fillStyle = `hsla(${hs}, 0.6)`;
      vizCtx.fill();
    }
    draw();
  } catch (_) {}
}

function vizStop() {
  vizRunning = false;
  cancelAnimationFrame(vizAnimId);
  if (vizCanvas) vizCanvas.classList.remove('active');
  if (srcNode) { try { srcNode.disconnect(); } catch(_) {} }
}

// Start visualizer on first play (homepage only)
if (window.location.pathname === '/' || window.location.pathname === '') {
  bgMusic.addEventListener('play', vizStart, { once: true });
}

// Server Status
function updateServerStatus() {
  const statusDot = document.querySelector('.status-indicator');
  const statusText = document.querySelector('.status-text');
  const playersSpan = document.querySelector('.server-players span');
  if (statusDot && statusText && playersSpan) {
    const online = Math.floor(Math.random() * 500) + 1000;
    playersSpan.textContent = online.toLocaleString() + ' Players Online';
    const isOnline = Math.random() > 0.05;
    statusDot.className = 'status-indicator ' + (isOnline ? 'online' : 'offline');
    statusText.textContent = isOnline ? 'Online' : 'Maintenance';
  }
}
updateServerStatus();
setInterval(updateServerStatus, 30000);

// Floating Particles
const particleCanvas = document.createElement('canvas');
particleCanvas.id = 'particleCanvas';
particleCanvas.style.cssText = 'position:fixed;inset:0;width:100%;height:100%;pointer-events:none;z-index:0';
document.body.prepend(particleCanvas);
const pctx = particleCanvas.getContext('2d');
let p = [];

function resizeParticles() {
  particleCanvas.width = window.innerWidth;
  particleCanvas.height = window.innerHeight;
}
resizeParticles();
window.addEventListener('resize', resizeParticles);

class Spark {
  constructor() { this.reset(); }
  reset() {
    this.x = Math.random() * particleCanvas.width;
    this.y = Math.random() * particleCanvas.height;
    this.size = Math.random() * 3 + 1;
    this.speedX = (Math.random() - 0.5) * 0.3;
    this.speedY = (Math.random() - 0.5) * 0.3;
    this.o = Math.random() * 0.4 + 0.1;
  }
  update() {
    this.x += this.speedX;
    this.y += this.speedY;
    if (this.x < 0 || this.x > particleCanvas.width || this.y < 0 || this.y > particleCanvas.height) this.reset();
  }
  draw(hs) {
    pctx.beginPath();
    pctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
    pctx.fillStyle = `hsla(${hs}, ${this.o})`;
    pctx.fill();
  }
}

for (let i = 0; i < 50; i++) p.push(new Spark());
(function animate() {
  pctx.clearRect(0, 0, particleCanvas.width, particleCanvas.height);
  const hs = getComputedStyle(document.documentElement).getPropertyValue('--accent-hs').trim();
  p.forEach(v => { v.update(); v.draw(hs); });
  requestAnimationFrame(animate);
})();

// Custom Cursor
const swordCursor = document.getElementById('swordCursor');

document.addEventListener('mousemove', function (e) {
  swordCursor.style.left = e.clientX + 'px';
  swordCursor.style.top = e.clientY + 'px';
});

document.querySelectorAll('a, button, input, .shop-card, .featured-card, .news-card').forEach(el => {
  el.addEventListener('mouseenter', () => swordCursor.classList.add('hover'));
  el.addEventListener('mouseleave', () => swordCursor.classList.remove('hover'));
});

// Theme Toggle
const themeToggle = document.getElementById('themeToggle');
const rootTheme = document.documentElement;
const themes = [
  { name: 'Red', hs: '0, 99%, 46%', accent: 'hsla(0, 99%, 46%, 0.76)', hover: 'hsla(0, 99%, 50%, 0.9)', glow: 'hsla(0, 99%, 46%, 0.25)', s35: 'hsla(0, 99%, 46%, 0.35)', s30: 'hsla(0, 99%, 46%, 0.3)', s25: 'hsla(0, 99%, 46%, 0.25)', b30: 'hsla(0, 99%, 46%, 0.3)', a60: 'hsla(0, 99%, 46%, 0.6)', a15: 'hsla(0, 99%, 46%, 0.15)', a10: 'hsla(0, 99%, 46%, 0.1)', a08: 'hsla(0, 99%, 46%, 0.08)', a06: 'hsla(0, 99%, 46%, 0.06)', a04: 'hsla(0, 99%, 46%, 0.04)' },
  { name: 'Gold', hs: '42, 99%, 46%', accent: 'hsla(42, 99%, 46%, 0.8)', hover: 'hsla(42, 99%, 50%, 0.9)', glow: 'hsla(42, 99%, 46%, 0.25)', s35: 'hsla(42, 99%, 46%, 0.35)', s30: 'hsla(42, 99%, 46%, 0.3)', s25: 'hsla(42, 99%, 46%, 0.25)', b30: 'hsla(42, 99%, 46%, 0.3)', a60: 'hsla(42, 99%, 46%, 0.6)', a15: 'hsla(42, 99%, 46%, 0.15)', a10: 'hsla(42, 99%, 46%, 0.1)', a08: 'hsla(42, 99%, 46%, 0.08)', a06: 'hsla(42, 99%, 46%, 0.06)', a04: 'hsla(42, 99%, 46%, 0.04)' },
  { name: 'Green', hs: '145, 40%, 40%', accent: 'hsla(145, 40%, 40%, 0.8)', hover: 'hsla(145, 40%, 45%, 0.9)', glow: 'hsla(145, 40%, 40%, 0.25)', s35: 'hsla(145, 40%, 40%, 0.35)', s30: 'hsla(145, 40%, 40%, 0.3)', s25: 'hsla(145, 40%, 40%, 0.25)', b30: 'hsla(145, 40%, 40%, 0.3)', a60: 'hsla(145, 40%, 40%, 0.6)', a15: 'hsla(145, 40%, 40%, 0.15)', a10: 'hsla(145, 40%, 40%, 0.1)', a08: 'hsla(145, 40%, 40%, 0.08)', a06: 'hsla(145, 40%, 40%, 0.06)', a04: 'hsla(145, 40%, 40%, 0.04)' },
];

function applyTheme(index) {
  const t = themes[index];
  rootTheme.style.setProperty('--accent-hs', t.hs);
  rootTheme.style.setProperty('--accent', t.accent);
  rootTheme.style.setProperty('--accent-hover', t.hover);
  rootTheme.style.setProperty('--accent-glow', t.glow);
  rootTheme.style.setProperty('--accent-shadow-35', t.s35);
  rootTheme.style.setProperty('--accent-shadow-30', t.s30);
  rootTheme.style.setProperty('--accent-shadow-25', t.s25);
  rootTheme.style.setProperty('--accent-border-30', t.b30);
  rootTheme.style.setProperty('--accent-060', t.a60);
  rootTheme.style.setProperty('--accent-015', t.a15);
  rootTheme.style.setProperty('--accent-010', t.a10);
  rootTheme.style.setProperty('--accent-008', t.a08);
  rootTheme.style.setProperty('--accent-006', t.a06);
  rootTheme.style.setProperty('--accent-004', t.a04);
  themeToggle.innerHTML = `<i class="fas fa-${index === 0 ? 'fire' : index === 1 ? 'crown' : 'leaf'}"></i> Theme`;
  localStorage.setItem('valkaTheme', index);
}

const savedTheme = localStorage.getItem('valkaTheme');
const themeIndex = savedTheme !== null ? parseInt(savedTheme) : 0;
applyTheme(themeIndex);

themeToggle.addEventListener('click', function () {
  const next = (parseInt(localStorage.getItem('valkaTheme') || '0') + 1) % themes.length;
  applyTheme(next);
});

// Image lightbox
(function() {
  const overlay = document.createElement('div');
  overlay.className = 'lightbox';
  overlay.innerHTML = '<button class="lightbox-close"><i class="fas fa-times"></i></button><img class="lightbox-img" src="" alt=""><span class="lightbox-caption"></span>';
  document.body.appendChild(overlay);
  const img = overlay.querySelector('.lightbox-img');
  const caption = overlay.querySelector('.lightbox-caption');
  const closeBtn = overlay.querySelector('.lightbox-close');
  function open(src, alt) {
    img.src = src;
    caption.textContent = alt || '';
    overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  }
  function close() {
    overlay.classList.remove('active');
    document.body.style.overflow = '';
  }
  closeBtn.addEventListener('click', close);
  overlay.addEventListener('click', function(e) { if (e.target === overlay) close(); });
  document.addEventListener('keydown', function(e) { if (e.key === 'Escape') close(); });
  // Shop card images
  document.querySelectorAll('.shop-card-img img').forEach(el => {
    el.style.cursor = 'pointer';
    el.addEventListener('click', function(e) {
      e.stopPropagation();
      const parent = this.closest('.shop-card');
      const name = parent ? parent.querySelector('.shop-card-title')?.textContent || '' : '';
      open(this.src, name);
    });
  });
  // Partner card images
  document.querySelectorAll('.featured-card img').forEach(el => {
    el.style.cursor = 'pointer';
    el.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      const parent = this.closest('.featured-card');
      const name = parent ? parent.querySelector('h3')?.textContent || '' : '';
      open(this.src, name);
    });
  });
  // News card images
  document.querySelectorAll('.news-card-img').forEach(el => {
    el.style.cursor = 'pointer';
    el.addEventListener('click', function() {
      open(this.src, '');
    });
  });
})();

// Dynamic page title
(function() {
  const origTitle = document.title;
  let isFlashing = false;
  document.addEventListener('visibilitychange', function() {
    if (document.hidden) {
      document.title = 'Come back! 👇';
      isFlashing = true;
    } else {
      document.title = origTitle;
      isFlashing = false;
    }
  });
})();

// Countdown timer
(function() {
  const elDays = document.getElementById('countdown-days');
  const elHours = document.getElementById('countdown-hours');
  const elMins = document.getElementById('countdown-minutes');
  const elSecs = document.getElementById('countdown-seconds');
  if (!elDays) return;
  // Set target to 7 days from now
  const target = new Date();
  target.setDate(target.getDate() + 7);
  target.setHours(20, 0, 0, 0);
  function tick() {
    const diff = target - new Date();
    if (diff <= 0) {
      elDays.textContent = '00';
      elHours.textContent = '00';
      elMins.textContent = '00';
      elSecs.textContent = '00';
      return;
    }
    const d = Math.floor(diff / 86400000);
    const h = Math.floor((diff % 86400000) / 3600000);
    const m = Math.floor((diff % 3600000) / 60000);
    const s = Math.floor((diff % 60000) / 1000);
    elDays.textContent = String(d).padStart(2, '0');
    elHours.textContent = String(h).padStart(2, '0');
    elMins.textContent = String(m).padStart(2, '0');
    elSecs.textContent = String(s).padStart(2, '0');
  }
  tick();
  setInterval(tick, 1000);
})();

// Active nav highlight on scroll
(function() {
  const navLinks = document.querySelectorAll('.nav-link');
  const sections = [];
  const sectionIds = ['home', 'shop', 'features'];

  sectionIds.forEach(id => {
    const el = document.getElementById(id);
    if (el) sections.push({ id, el });
  });

  function updateActive() {
    const path = window.location.pathname;
    // Page-level highlighting
    let activeSection = '';
    if (path === '/' || path === '') {
      // Scroll-based on homepage
      let maxVisibility = 0;
      sections.forEach(s => {
        const rect = s.el.getBoundingClientRect();
        const visible = Math.min(rect.bottom, window.innerHeight) - Math.max(rect.top, 0);
        if (visible > maxVisibility) {
          maxVisibility = visible;
          activeSection = s.id;
        }
      });
    } else if (path.includes('/ranking')) {
      activeSection = 'ranking';
    } else if (path.includes('/guide')) {
      activeSection = 'guide';
    } else if (path.includes('/contact')) {
      activeSection = 'contact';
    } else if (path.includes('/login')) {
      activeSection = 'login';
    } else if (path.includes('/register')) {
      activeSection = 'register';
    }

    navLinks.forEach(link => {
      link.classList.remove('active');
      const href = link.getAttribute('href') || '';
      if (activeSection === 'home' && (href === '/' || href.includes('#home'))) {
        link.classList.add('active');
      } else if (activeSection && href.includes(activeSection)) {
        link.classList.add('active');
      }
    });
  }

  updateActive();
  window.addEventListener('scroll', updateActive);
})();

// Typing animation
(function() {
  const el = document.getElementById('typed-text');
  if (!el) return;
  const texts = ['Welcome to ', 'Valka Online'];
  const classes = ['', 'highlight'];
  let charIndex = 0, textIndex = 0, charPos = 0;
  function type() {
    if (textIndex >= texts.length) return;
    const current = texts[textIndex];
    if (charPos < current.length) {
      const span = document.createElement('span');
      if (classes[textIndex]) span.className = classes[textIndex];
      span.textContent = current[charPos];
      el.appendChild(span);
      charPos++;
      setTimeout(type, 60);
    } else {
      textIndex++;
      charPos = 0;
      setTimeout(type, 200);
    }
  }
  setTimeout(type, 800);
})();


