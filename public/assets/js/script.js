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

window.addEventListener('scroll', function () {
  if (window.scrollY >= 300) {
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
bgMusic.volume = 0.3;

function updateMusicIcon() {
  if (bgMusic.paused) {
    musicToggle.innerHTML = '<i class="fas fa-volume-xmark"></i>';
    musicToggle.classList.remove('playing');
  } else {
    musicToggle.innerHTML = '<i class="fas fa-volume-high"></i>';
    musicToggle.classList.add('playing');
  }
}

// Only auto-play on homepage
if (window.location.pathname === '/' || window.location.pathname === '') {
  const playPromise = bgMusic.play();
  if (playPromise !== undefined) {
    playPromise.then(updateMusicIcon).catch(() => {
      function startOnInteraction() {
        bgMusic.play().then(updateMusicIcon).catch(() => {});
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
    bgMusic.play().then(updateMusicIcon).catch(() => {});
  } else {
    bgMusic.pause();
    updateMusicIcon();
  }
});

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
