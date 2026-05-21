<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Valka Online')</title>
  <meta name="description" content="@yield('description', 'Valka Online - Create & Manage Matches. Join the battle and prove your worth!')">
  <meta name="keywords" content="Valka Online, MMORPG, gaming, online game">
  <meta property="og:title" content="@yield('title', 'Valka Online')">
  <meta property="og:description" content="Valka Online - Create & Manage Matches. Join the battle and prove your worth!">
  <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  @stack('head')
</head>

<body>

@if(request()->is('/'))
<div class="intro-splash">
  <img src="{{ asset('assets/images/valkalogo.png') }}" alt="Valka Online" class="intro-logo">
</div>
@endif

  <nav class="navbar">
    <div class="nav-container">
      <a href="{{ url('/') }}" class="nav-logo">
        <img src="{{ asset('assets/images/valkalogo.png') }}" alt="Valka Online" class="nav-logo-img">
      </a>

      <button class="nav-toggle" aria-label="toggle menu" id="navToggle">
        <i class="fas fa-bars"></i>
      </button>

      <div class="nav-menu" id="navMenu">
        <ul class="nav-list">
          <li class="nav-item"><a href="{{ url('/') }}#home" class="nav-link active"><i class="fas fa-house"></i> Home</a></li>
          <li class="nav-item"><a href="{{ url('/ranking') }}" class="nav-link"><i class="fas fa-trophy"></i> Ranking</a></li>
          <li class="nav-item"><a href="{{ url('/') }}#shop" class="nav-link"><i class="fas fa-store"></i> Store</a></li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle"><i class="fas fa-gears"></i> Help <i class="fas fa-chevron-down dropdown-arrow"></i></a>
            <ul class="dropdown-menu">
              <li><a href="#" class="dropdown-link"><i class="fab fa-discord"></i> Discord</a></li>
              <li><a href="#" class="dropdown-link"><i class="fab fa-facebook"></i> Facebook Group</a></li>
              <li><a href="{{ url('/guide') }}" class="dropdown-link"><i class="fas fa-book"></i> Game Guide</a></li>
              <li><a href="#" class="dropdown-link"><i class="fas fa-chart-simple"></i> Stats Guide</a></li>
              <li><a href="{{ url('/contact') }}" class="dropdown-link"><i class="fas fa-envelope"></i> Contact</a></li>
            </ul>
          </li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-book-open"></i> Wiki</a></li>
        </ul>

        <div class="nav-auth">
          <a href="{{ url('/login') }}" class="auth-link login-link"><i class="fas fa-right-to-bracket"></i> Login</a>
          <a href="{{ url('/register') }}" class="auth-link register-link"><i class="fas fa-user-plus"></i> Register</a>
        </div>
      </div>
    </div>
  </nav>

  @yield('content')

  <section class="section brand-section">
    <div class="content-container">
      <ul class="brand-icons">
        <li><img src="{{ asset('assets/images/1.png') }}" width="48" height="48" alt="icon"></li>
        <li><img src="{{ asset('assets/images/2.png') }}" width="48" height="48" alt="icon"></li>
        <li><img src="{{ asset('assets/images/3.png') }}" width="48" height="48" alt="icon"></li>
        <li><img src="{{ asset('assets/images/4.png') }}" width="48" height="48" alt="icon"></li>
        <li><img src="{{ asset('assets/images/5.png') }}" width="48" height="48" alt="icon"></li>
        <li><img src="{{ asset('assets/images/6.png') }}" width="48" height="48" alt="icon"></li>
      </ul>
    </div>
  </section>

  <footer class="footer">
    <div class="content-container">
      <div class="footer-grid">

        <div class="footer-brand">
          <img src="{{ asset('assets/images/valkalogo.png') }}" alt="Valka Online" class="footer-logo">
          <p>Valka Online marketplace the release etras thats sheets continig passag.</p>
          <div class="footer-contact">
            <p><i class="fas fa-location-dot"></i> Address : PO Box W75 Street lan West new queens</p>
            <p><i class="fas fa-headset"></i> Phone : +24 1245 654 235</p>
            <p><i class="fas fa-envelope"></i> Email : info@exemple.com</p>
          </div>
        </div>

        <div class="footer-col">
          <h4>Products</h4>
          <ul>
            <li><a href="#">Graphics (26)</a></li>
            <li><a href="#">Backgrounds (11)</a></li>
            <li><a href="#">Fonts (9)</a></li>
            <li><a href="#">Music (3)</a></li>
            <li><a href="#">Photography (3)</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Need Help?</h4>
          <ul>
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Refund Policy</a></li>
            <li><a href="#">Affiliate</a></li>
            <li><a href="#">Use Cases</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Follow Us</h4>
          <div class="footer-social">
            <a href="#" class="footer-social-link" style="background:#3b5998"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="footer-social-link" style="background:#55acee"><i class="fab fa-twitter"></i></a>
            <a href="#" class="footer-social-link" style="background:#d71e18"><i class="fab fa-pinterest-p"></i></a>
            <a href="#" class="footer-social-link" style="background:#1565c0"><i class="fab fa-linkedin-in"></i></a>
          </div>
          <div class="footer-newsletter">
            <h4>Newsletter</h4>
            <form>
              <input type="email" placeholder="Enter your email" class="footer-input">
              <button type="submit" class="footer-submit"><i class="fas fa-paper-plane"></i></button>
            </form>
          </div>
        </div>

      </div>
    </div>
    <div class="footer-bottom">
      <div class="content-container">
        <p>&copy; 2026 Valka Online. All Right Reserved | Website Design by: <span class="footer-signature">Blood</span></p>
        <a href="https://www.tiktok.com/@bloodmainn" target="_blank"><img src="{{ asset('assets/images/blood.png') }}" width="60" height="auto" alt=""></a>
      </div>
    </div>
  </footer>

  <a href="#top" class="back-top-btn" id="backToTop">
    <i class="fas fa-chevron-up"></i>
  </a>

  <audio id="bgMusic" src="{{ asset('assets/musics/Marchdown.mp3') }}" loop preload="auto"></audio>
  <button id="musicToggle" class="music-toggle"><i class="fas fa-music"></i></button>

  <script src="{{ asset('assets/js/script.js') }}" defer></script>
  @stack('scripts')
</body>

</html>
