@extends('layouts.app')

@section('title', 'Game Guide - Valka Online')
@section('description', 'Valka Online Game Guide - Learn the basics, classes, combat, items, and expert tips!')

@push('head')
<style>
.guide-wrapper {
  padding: 40px 0;
}
.page-wrapper {
  animation: pageFadeIn 0.4s ease forwards;
}
@keyframes pageFadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}
.guide-header {
  text-align: center;
  margin-bottom: 32px;
}
.guide-header h1 {
  font-family: var(--ff-alt);
  font-size: 2rem;
  font-weight: 800;
  text-transform: uppercase;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
  margin-bottom: 8px;
}
.guide-header h1 i { color: var(--accent); }
.guide-header p {
  color: var(--text-secondary);
  font-size: 0.9rem;
}

.guide-list {
  display: flex;
  flex-direction: column;
  gap: 12px;
  max-width: 800px;
  margin: 0 auto;
}

.guide-card {
  background: linear-gradient(135deg, rgba(0,0,0,0.85) 0%, rgba(20,20,25,0.7) 100%);
  border: 1px solid var(--border-color);
  border-radius: var(--radius);
  backdrop-filter: blur(4px);
  overflow: hidden;
  transition: var(--transition);
  box-shadow: 0 0 12px hsla(0, 99%, 46%, 0.15);
}
.guide-card:hover {
  border-color: var(--border-hover);
}

.guide-card details {
  cursor: pointer;
}
.guide-card details[open] {
  border-color: var(--accent);
}

.guide-card summary {
  padding: 18px 20px;
  display: flex;
  align-items: center;
  gap: 12px;
  font-family: var(--ff-alt);
  font-size: 1rem;
  font-weight: 700;
  text-transform: uppercase;
  list-style: none;
  user-select: none;
  transition: var(--transition);
}
.guide-card summary::-webkit-details-marker {
  display: none;
}
.guide-card summary::after {
  content: '\f078';
  font-family: 'Font Awesome 6 Free';
  font-weight: 900;
  margin-left: auto;
  font-size: 0.75rem;
  color: var(--accent);
  transition: var(--transition);
}
.guide-card details[open] summary::after {
  transform: rotate(180deg);
}
.guide-card summary i {
  width: 36px;
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--accent);
  color: #fff;
  border-radius: var(--radius-sm);
  font-size: 1rem;
  flex-shrink: 0;
}
.guide-card summary:hover {
  background: rgba(255,0,0,0.04);
}

.guide-card-content {
  padding: 0 20px 20px;
  border-top: 1px solid var(--border-color);
  padding-top: 16px;
}
.guide-card-content p {
  color: var(--text-secondary);
  font-size: 0.85rem;
  line-height: 1.8;
  margin-bottom: 12px;
}
.guide-card-content ul {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 6px;
}
.guide-card-content ul li {
  color: var(--text-secondary);
  font-size: 0.85rem;
  display: flex;
  align-items: flex-start;
  gap: 8px;
}
.guide-card-content ul li::before {
  content: '\f061';
  font-family: 'Font Awesome 6 Free';
  font-weight: 900;
  color: var(--accent);
  font-size: 0.7rem;
  margin-top: 3px;
  flex-shrink: 0;
}
.guide-card-content .highlight-text {
  color: var(--accent);
  font-weight: 600;
}

.class-stats {
  display: flex;
  flex-direction: column;
  gap: 14px;
  margin-top: 16px;
  padding-top: 16px;
  border-top: 1px solid var(--border-color);
}
.class-stat-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 0.8rem;
  margin-bottom: 6px;
}
.class-stat-header span:first-child {
  font-weight: 700;
  color: var(--accent);
  font-family: var(--ff-alt);
  text-transform: uppercase;
}
.class-stat-header span:last-child {
  color: var(--text-muted);
  font-size: 0.7rem;
}
.class-bar-group {
  display: flex;
  flex-direction: column;
  gap: 4px;
}
.class-bar {
  display: flex;
  align-items: center;
  gap: 8px;
}
.class-bar-label {
  width: 32px;
  font-size: 0.7rem;
  font-weight: 700;
  color: var(--text-secondary);
  text-transform: uppercase;
  flex-shrink: 0;
}
.class-bar-track {
  flex: 1;
  height: 8px;
  background: var(--bg-input);
  border-radius: 4px;
  overflow: hidden;
}
.class-bar-fill {
  height: 100%;
  border-radius: 4px;
  background: var(--accent);
  transition: width 0.8s ease;
  box-shadow: 0 0 6px var(--accent-glow);
}
</style>
@endpush

@section('content')

<div class="guide-wrapper">
  <div class="content-container">
    <div class="page-wrapper">

      <div class="guide-header">
        <h1><i class="fas fa-book"></i> Game Guide</h1>
        <p>Everything you need to know about Valka Online</p>
      </div>

      <div class="guide-list">

        <div class="guide-card">
          <details>
            <summary><i class="fas fa-flag"></i> Getting Started</summary>
            <div class="guide-card-content">
              <p>Welcome to <span class="highlight-text">Valka Online</span>! Begin your journey by creating an account and choosing your class. Complete the tutorial quests to learn the basics of movement, combat, and interactions.</p>
              <ul>
                <li>Create your account on the <a href="{{ url('/register') }}" style="color:var(--accent)">Register</a> page</li>
                <li>Complete the tutorial quests for starter gear</li>
                <li>Visit the Shop to get powerful items and packages</li>
                <li>Join our <a href="https://discord.gg/BqCWseWtnM" style="color:var(--accent)" target="_blank">Discord</a> for community events</li>
                <li>Set your spawn point at any town NPC</li>
              </ul>
            </div>
          </details>
        </div>

        <div class="guide-card">
          <details>
            <summary><i class="fas fa-shield-halved"></i> Classes</summary>
            <div class="guide-card-content">
              <p>Choose from <span class="highlight-text">four unique classes</span>, each with distinct playstyles, abilities, and progression paths.</p>
              <ul>
                <li><span class="highlight-text">Warrior</span> — High defense, melee damage, tanking capabilities</li>
                <li><span class="highlight-text">Mage</span> — Powerful spells, area damage, crowd control</li>
                <li><span class="highlight-text">Archer</span> — Ranged precision, high crit rate, mobility</li>
                <li><span class="highlight-text">Assassin</span> — Stealth, burst damage, evasion</li>
              </ul>
              <div class="class-stats">
                <div class="class-stat">
                  <div class="class-stat-header"><span>Warrior</span><span>STR 9 · AGI 4 · INT 3 · DEF 9</span></div>
                  <div class="class-bar-group">
                    <div class="class-bar"><span class="class-bar-label">STR</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="90%"></div></div></div>
                    <div class="class-bar"><span class="class-bar-label">AGI</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="40%"></div></div></div>
                    <div class="class-bar"><span class="class-bar-label">INT</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="30%"></div></div></div>
                    <div class="class-bar"><span class="class-bar-label">DEF</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="90%"></div></div></div>
                  </div>
                </div>
                <div class="class-stat">
                  <div class="class-stat-header"><span>Mage</span><span>STR 3 · AGI 5 · INT 9 · DEF 4</span></div>
                  <div class="class-bar-group">
                    <div class="class-bar"><span class="class-bar-label">STR</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="30%"></div></div></div>
                    <div class="class-bar"><span class="class-bar-label">AGI</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="50%"></div></div></div>
                    <div class="class-bar"><span class="class-bar-label">INT</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="90%"></div></div></div>
                    <div class="class-bar"><span class="class-bar-label">DEF</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="40%"></div></div></div>
                  </div>
                </div>
                <div class="class-stat">
                  <div class="class-stat-header"><span>Archer</span><span>STR 5 · AGI 9 · INT 4 · DEF 5</span></div>
                  <div class="class-bar-group">
                    <div class="class-bar"><span class="class-bar-label">STR</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="50%"></div></div></div>
                    <div class="class-bar"><span class="class-bar-label">AGI</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="90%"></div></div></div>
                    <div class="class-bar"><span class="class-bar-label">INT</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="40%"></div></div></div>
                    <div class="class-bar"><span class="class-bar-label">DEF</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="50%"></div></div></div>
                  </div>
                </div>
                <div class="class-stat">
                  <div class="class-stat-header"><span>Assassin</span><span>STR 7 · AGI 8 · INT 3 · DEF 4</span></div>
                  <div class="class-bar-group">
                    <div class="class-bar"><span class="class-bar-label">STR</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="70%"></div></div></div>
                    <div class="class-bar"><span class="class-bar-label">AGI</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="80%"></div></div></div>
                    <div class="class-bar"><span class="class-bar-label">INT</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="30%"></div></div></div>
                    <div class="class-bar"><span class="class-bar-label">DEF</span><div class="class-bar-track"><div class="class-bar-fill" style="width:0" data-width="40%"></div></div></div>
                  </div>
                </div>
              </div>
            </div>
          </details>
        </div>

        <div class="guide-card">
          <details>
            <summary><i class="fas fa-crosshairs"></i> Combat</summary>
            <div class="guide-card-content">
              <p>Master the art of combat in <span class="highlight-text">Valka Online</span>. Use your skills wisely, time your attacks, and work with your party to overcome powerful foes.</p>
              <ul>
                <li>Use <span class="highlight-text">auto-attack</span> for consistent damage</li>
                <li>Activate <span class="highlight-text">skills</span> with hotkeys for powerful effects</li>
                <li><span class="highlight-text">Dodge</span> enemy telegraphed attacks by moving</li>
                <li>Form <span class="highlight-text">parties</span> for dungeon raids and boss fights</li>
                <li>Your <span class="highlight-text">K/D ratio</span> reflects your PvP performance</li>
              </ul>
            </div>
          </details>
        </div>

        <div class="guide-card">
          <details>
            <summary><i class="fas fa-sack-dollar"></i> Items & Equipment</summary>
            <div class="guide-card-content">
              <p>Gear up with weapons, armor, accessories, and consumables. Trade with other players or purchase premium packages from the shop.</p>
              <ul>
                <li><span class="highlight-text">Weapons</span> determine your damage output and skills</li>
                <li><span class="highlight-text">Armor</span> provides defense and set bonuses</li>
                <li><span class="highlight-text">Accessories</span> grant special effects and stat boosts</li>
                <li>Visit the <a href="{{ url('/') }}#shop" style="color:var(--accent)">Shop</a> for exclusive packages</li>
                <li>Use <span class="highlight-text">consumables</span> for temporary buffs</li>
              </ul>
            </div>
          </details>
        </div>

        <div class="guide-card">
          <details>
            <summary><i class="fas fa-lightbulb"></i> Tips</summary>
            <div class="guide-card-content">
              <p>Expert advice to help you dominate in <span class="highlight-text">Valka Online</span>.</p>
              <ul>
                <li>Always complete <span class="highlight-text">daily quests</span> for bonus XP and rewards</li>
                <li>Join a <span class="highlight-text">guild</span> to access guild buffs and events</li>
                <li>Save your currency for <span class="highlight-text">premium items</span> in the shop</li>
                <li>Participate in <span class="highlight-text">weekly PvP tournaments</span> for exclusive rewards</li>
                <li>Check the <span class="highlight-text">Rankings</span> page to see top players</li>
              </ul>
            </div>
          </details>
        </div>

      </div>

    </div>
  </div>
</div>

@push('scripts')
<script>
document.querySelectorAll('.guide-card details').forEach(details => {
  details.addEventListener('toggle', function() {
    if (this.open) {
      this.querySelectorAll('.class-bar-fill').forEach(bar => {
        const w = bar.getAttribute('data-width');
        if (w) setTimeout(() => bar.style.width = w, 100);
      });
    }
  });
});
</script>
@endpush

@endsection
