@extends('layouts.app')

@section('title', 'Valka Online')

@section('content')

  <main class="main-content">
    <div class="content-container">

      <div class="content-left">

        <section class="featured-banner" id="home">
          <video class="featured-banner-video" autoplay muted loop playsinline>
            <source src="{{ asset('assets/videos/valkavids.mp4') }}" type="video/mp4">
          </video>
          <div class="featured-banner-overlay"></div>
          <div class="featured-banner-content">
            <h1 class="featured-title"><span id="typed-text"></span><span class="typing-cursor">|</span></h1>
            <p class="featured-desc">Create & Manage Matches. Join the battle and prove your worth!</p>
          </div>
          <a href="#" class="featured-btn"><i class="fas fa-play"></i> Play Now</a>
        </section>

        <section class="section news-section">
          <div class="section-header">
            <h2 class="section-title"><i class="fas fa-newspaper"></i> News & Updates</h2>
          </div>

          <div class="news-list">

            <article class="news-card">
              <img src="{{ asset('assets/images/bene.png') }}" alt="" class="news-card-img" loading="lazy" decoding="async">
              <div class="news-card-body">
                <div class="news-meta">
                  <span class="news-author"><i class="fas fa-user"></i> Admin</span>
                  <span class="news-date"><i class="fas fa-calendar"></i> May 20, 2026</span>
                </div>
                <h3 class="news-title">New Event: Shadow Realm</h3>
                <p class="news-text">The Shadow Realm event is now live! Enter /join ShadowRealm and face the darkness. New items, bosses, and rewards await. Gather your allies and prepare for battle!</p>
                <a href="#" class="news-readmore">Read More <i class="fas fa-arrow-right"></i></a>
              </div>
            </article>

            <article class="news-card">
              <img src="{{ asset('assets/images/foundme1.png') }}" alt="" class="news-card-img" loading="lazy" decoding="async">
              <div class="news-card-body">
                <div class="news-meta">
                  <span class="news-author"><i class="fas fa-user"></i> Admin</span>
                  <span class="news-date"><i class="fas fa-calendar"></i> May 15, 2026</span>
                </div>
                <h3 class="news-title">Weekly Update v2.5</h3>
                <p class="news-text">New features including class balancing, bug fixes, and a new map. Check out the full patch notes on our Discord server. Thank you for your continued support!</p>
                <a href="#" class="news-readmore">Read More <i class="fas fa-arrow-right"></i></a>
              </div>
            </article>

          </div>
        </section>

      </div>

      <aside class="content-right">

        <div class="sidebar-box">
          <div class="sidebar-box-header">
            <h3><i class="fas fa-right-to-bracket"></i> Login</h3>
          </div>
          <div class="sidebar-box-body">
            <form class="login-form">
              <div class="input-group">
                <span class="input-icon"><i class="fas fa-user"></i></span>
                <input type="text" placeholder="Username" class="form-input">
              </div>
              <div class="input-group">
                <span class="input-icon"><i class="fas fa-lock"></i></span>
                <input type="password" placeholder="Password" class="form-input">
              </div>
              <a href="#" class="forgot-password">Did you forget your password?</a>
              <button type="submit" class="login-submit">Login</button>
            </form>
            <div class="sidebar-logo">
              <img src="{{ asset('assets/images/valkalogo.png') }}" alt="Valka Online" class="sidebar-logo-img">
            </div>
          </div>
        </div>

        <div class="sidebar-box">
          <div class="sidebar-box-header">
            <h3><i class="fas fa-crown"></i> Top Donators</h3>
          </div>
          <div class="sidebar-box-body">
            <ul class="donators-list">
              <li class="donator-item donator-top">
                <span class="donator-rank"><i class="fas fa-crown" style="color:#ffd700"></i></span>
                <span class="donator-name">Blood</span>
                <span class="donator-level">9999/9999</span>
              </li>
              <li class="donator-item">
                <span class="donator-rank"><i class="fas fa-medal" style="color:#c0c0c0"></i></span>
                <span class="donator-name">Gandalf</span>
                <span class="donator-level">8500/9000</span>
              </li>
              <li class="donator-item">
                <span class="donator-rank"><i class="fas fa-medal" style="color:#cd7f32"></i></span>
                <span class="donator-name">DragonSlayer</span>
                <span class="donator-level">7200/8000</span>
              </li>
              <li class="donator-item">
                <span class="donator-rank">4</span>
                <span class="donator-name">NightBlade</span>
                <span class="donator-level">6500/7000</span>
              </li>
              <li class="donator-item">
                <span class="donator-rank">5</span>
                <span class="donator-name">FireMage</span>
                <span class="donator-level">5800/6500</span>
              </li>
            </ul>
          </div>
        </div>

        <div class="sidebar-box">
          <div class="sidebar-box-header">
            <h3><i class="fas fa-clock"></i> Next Event</h3>
          </div>
          <div class="sidebar-box-body">
            <div class="countdown" id="countdown">
              <div class="countdown-item">
                <span class="countdown-num" id="countdown-days">00</span>
                <span class="countdown-label">Days</span>
              </div>
              <span class="countdown-sep">:</span>
              <div class="countdown-item">
                <span class="countdown-num" id="countdown-hours">00</span>
                <span class="countdown-label">Hours</span>
              </div>
              <span class="countdown-sep">:</span>
              <div class="countdown-item">
                <span class="countdown-num" id="countdown-minutes">00</span>
                <span class="countdown-label">Mins</span>
              </div>
              <span class="countdown-sep">:</span>
              <div class="countdown-item">
                <span class="countdown-num" id="countdown-seconds">00</span>
                <span class="countdown-label">Secs</span>
              </div>
            </div>
            <p class="countdown-event">Shadow Realm Event</p>
          </div>
        </div>

        <div class="sidebar-box">
          <div class="sidebar-box-header">
            <h3><i class="fab fa-discord"></i> Discord</h3>
          </div>
          <div class="sidebar-box-body">
            <div class="discord-embed">
              <iframe src="https://discord.com/widget?id=1306260281734991974&theme=dark" width="100%" height="280" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
            </div>
            <a href="https://discord.gg/BqCWseWtnM" target="_blank" class="discord-join-btn"><i class="fab fa-discord"></i> Join Discord</a>
          </div>
        </div>

        <div class="sidebar-box">
          <div class="sidebar-box-header">
            <h3><i class="fas fa-server"></i> Server Status</h3>
          </div>
          <div class="sidebar-box-body">
            <div class="server-status">
              <span class="status-indicator online"></span>
              <span class="status-text">Online</span>
            </div>
            <div class="server-players">
              <i class="fas fa-users"></i>
              <span>1,234 Players Online</span>
            </div>
          </div>
        </div>

      </aside>

    </div>
  </main>

  <section class="section shop-section" id="shop">
    <div class="content-container">
      <div class="section-header">
        <h2 class="section-title"><i class="fas fa-store"></i> VALKA ONLINE <span class="highlight">SHOP</span></h2>
        <p class="section-sub">Welcome to Valka Shop enjoy!</p>
      </div>

      <div class="shop-grid">

        <div class="shop-card">
          <div class="shop-card-img">
            <img src="{{ asset('assets/images/founderpack.png') }}" alt="Founder Pack" loading="lazy" decoding="async">
            <span class="shop-badge">Founder I</span>
          </div>
          <div class="shop-card-body">
            <h3 class="shop-card-title">Founder 1 Package</h3>
            <div class="shop-card-footer">
              <span class="shop-price">$15.00</span>
              <button class="shop-cart-btn" data-item="Founder 1 Package" data-price="$15.00" data-img="{{ asset('assets/images/founderpack.png') }}"><i class="fas fa-basket-shopping"></i></button>
            </div>
          </div>
        </div>

        <div class="shop-card">
          <div class="shop-card-img">
            <img src="{{ asset('assets/images/foundme1.png') }}" alt="Found Me" loading="lazy" decoding="async">
            <span class="shop-badge">Founder II</span>
          </div>
          <div class="shop-card-body">
            <h3 class="shop-card-title">Founder II Package</h3>
            <div class="shop-card-footer">
              <span class="shop-price">$29.00</span>
              <button class="shop-cart-btn" data-item="Founder II Package" data-price="$29.00" data-img="{{ asset('assets/images/foundme1.png') }}"><i class="fas fa-basket-shopping"></i></button>
            </div>
          </div>
        </div>

        <div class="shop-card">
          <div class="shop-card-img">
            <img src="{{ asset('assets/images/NPC.png') }}" alt="NPC" loading="lazy" decoding="async">
            <span class="shop-badge">Set</span>
          </div>
          <div class="shop-card-body">
            <h3 class="shop-card-title">Set Packge</h3>
            <div class="shop-card-footer">
              <span class="shop-price">$29.00</span>
              <button class="shop-cart-btn" data-item="Set Packge" data-price="$29.00" data-img="{{ asset('assets/images/NPC.png') }}"><i class="fas fa-basket-shopping"></i></button>
            </div>
          </div>
        </div>

        <div class="shop-card">
          <div class="shop-card-img">
            <img src="{{ asset('assets/images/openban.png') }}" alt="Open Ban" loading="lazy" decoding="async">
            <span class="shop-badge">Gandalf</span>
          </div>
          <div class="shop-card-body">
            <h3 class="shop-card-title">Banned</h3>
            <div class="shop-card-footer">
              <span class="shop-price">$29.00</span>
              <button class="shop-cart-btn" data-item="Banned" data-price="$29.00" data-img="{{ asset('assets/images/openban.png') }}"><i class="fas fa-basket-shopping"></i></button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="section featured-section" id="features">
    <div class="content-container">
      <div class="section-header">
        <h2 class="section-title"><i class="fas fa-gamepad"></i> Partner <span class="highlight">Games</span></h2>
      </div>

      <div class="featured-grid">

        <a href="http://aestheria.online/" target="_blank" class="featured-card">
          <img src="{{ asset('assets/partners/Aestheria.png') }}" alt="Aestheria" loading="lazy" decoding="async">
          <div class="featured-card-overlay">
            <h3>Aestheria <span class="highlight">SERVER</span></h3>
            <span><i class="fas fa-bell"></i> ServerHub</span>
          </div>
        </a>

        <a href="https://aq.com/" target="_blank" class="featured-card">
          <img src="{{ asset('assets/partners/AQW.png') }}" alt="AQW" loading="lazy" decoding="async">
          <div class="featured-card-overlay">
            <h3>AQW <span class="highlight">SERVER</span></h3>
            <span><i class="fas fa-bell"></i> ServerHub</span>
          </div>
        </a>

        <a href="https://augoeides.org/" target="_blank" class="featured-card">
          <img src="{{ asset('assets/partners/Augo.png') }}" alt="Augo" loading="lazy" decoding="async">
          <div class="featured-card-overlay">
            <h3>Augo <span class="highlight">SERVER</span></h3>
            <span><i class="fas fa-bell"></i> ServerHub</span>
          </div>
        </a>

        <a href="https://fiend.online/" target="_blank" class="featured-card">
          <img src="{{ asset('assets/partners/Fiend.png') }}" alt="Fiend" loading="lazy" decoding="async">
          <div class="featured-card-overlay">
            <h3>Fiend <span class="highlight">SERVER</span></h3>
            <span><i class="fas fa-bell"></i> ServerHub</span>
          </div>
        </a>

      </div>
    </div>
  </section>

  {{-- Shop Cart Modal --}}
  <div class="shop-modal-overlay" id="shopModal">
    <div class="shop-modal">
      <button class="shop-modal-close" id="shopModalClose"><i class="fas fa-times"></i></button>
      <div class="shop-modal-img">
        <img id="modalImg" src="" alt="" loading="lazy">
      </div>
      <div class="shop-modal-body">
        <h3 class="shop-modal-title" id="modalTitle">Item Name</h3>
        <p class="shop-modal-price" id="modalPrice">$0.00</p>
        <p class="shop-modal-desc">Add this item to your cart and complete your purchase in the checkout.</p>
        <button class="shop-modal-add" id="modalAddBtn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
      </div>
    </div>
  </div>

  @push('scripts')
  <script>
    (function() {
      const modal = document.getElementById('shopModal');
      const modalImg = document.getElementById('modalImg');
      const modalTitle = document.getElementById('modalTitle');
      const modalPrice = document.getElementById('modalPrice');
      const modalClose = document.getElementById('shopModalClose');
      const modalAddBtn = document.getElementById('modalAddBtn');

      document.querySelectorAll('.shop-cart-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
          e.preventDefault();
          const item = this.getAttribute('data-item');
          const price = this.getAttribute('data-price');
          const img = this.getAttribute('data-img');
          modalImg.src = img;
          modalTitle.textContent = item;
          modalPrice.textContent = price;
          modal.classList.add('active');
          document.body.style.overflow = 'hidden';
        });
      });

      function closeModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
      }

      modalClose.addEventListener('click', closeModal);

      modal.addEventListener('click', function(e) {
        if (e.target === this) closeModal();
      });

      modalAddBtn.addEventListener('click', function() {
        alert(modalTitle.textContent + ' added to cart!');
        closeModal();
      });
    })();
  </script>
  @endpush

@endsection
