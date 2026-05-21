@extends('layouts.app')

@section('title', 'Ranking - Valka Online')
@section('description', 'Valka Online player rankings - Check the top players by Level, PvP, Guild, and Donation!')

@push('head')
<style>
.ranking-wrapper {
  padding: 40px 0;
}
.page-wrapper {
  animation: pageFadeIn 0.4s ease forwards;
}
@keyframes pageFadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}
.ranking-header {
  text-align: center;
  margin-bottom: 32px;
}
.ranking-header h1 {
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
.ranking-header h1 i { color: var(--accent); }
.ranking-header p {
  color: var(--text-secondary);
  font-size: 0.9rem;
}

.ranking-tabs {
  display: flex;
  gap: 8px;
  margin-bottom: 24px;
  justify-content: center;
  flex-wrap: wrap;
}
.ranking-tab {
  padding: 10px 24px;
  background: var(--bg-card);
  border: 1px solid var(--border-color);
  border-radius: var(--radius-sm);
  color: var(--text-secondary);
  font-weight: 600;
  font-size: 0.85rem;
  cursor: pointer;
  transition: var(--transition);
  text-transform: uppercase;
  font-family: var(--ff-alt);
}
.ranking-tab:hover {
  border-color: var(--accent);
  color: var(--text-primary);
}
.ranking-tab.active {
  background: var(--accent);
  color: #fff;
  border-color: var(--accent);
  box-shadow: 0 0 12px var(--accent-glow);
}

.ranking-table-wrapper {
  background: linear-gradient(135deg, rgba(0,0,0,0.85) 0%, rgba(20,20,25,0.7) 100%);
  border: 1px solid var(--border-color);
  border-radius: var(--radius);
  overflow: hidden;
  backdrop-filter: blur(4px);
  box-shadow: 0 0 20px hsla(0, 99%, 46%, 0.2);
}

.ranking-table {
  width: 100%;
  border-collapse: collapse;
}
.ranking-table thead {
  background: linear-gradient(180deg, rgba(255,0,0,0.08) 0%, transparent 100%);
  border-bottom: 2px solid var(--accent);
}
.ranking-table th {
  padding: 14px 16px;
  text-align: left;
  font-family: var(--ff-alt);
  font-size: 0.8rem;
  font-weight: 700;
  text-transform: uppercase;
  color: var(--accent);
  letter-spacing: 0.5px;
}
.ranking-table td {
  padding: 12px 16px;
  font-size: 0.85rem;
  border-bottom: 1px solid var(--border-color);
}
.ranking-table tbody tr {
  transition: var(--transition);
}
.ranking-table tbody tr:hover {
  background: rgba(255,0,0,0.04);
}
.ranking-table tbody tr:last-child td {
  border-bottom: none;
}

.rank-number {
  font-weight: 800;
  font-family: var(--ff-alt);
  color: var(--accent);
  font-size: 1rem;
}
.rank-1 { color: #ffd700; text-shadow: 0 0 8px rgba(255,215,0,0.5); }
.rank-2 { color: #c0c0c0; text-shadow: 0 0 6px rgba(192,192,192,0.4); }
.rank-3 { color: #cd7f32; text-shadow: 0 0 6px rgba(205,127,50,0.4); }

.player-cell {
  display: flex;
  align-items: center;
  gap: 10px;
}
.player-avatar {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: var(--bg-input);
  border: 2px solid var(--border-color);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.85rem;
  color: var(--accent);
  flex-shrink: 0;
}
.player-name {
  font-weight: 600;
  color: var(--text-primary);
}

.level-cell {
  font-weight: 600;
  color: var(--accent);
}

.guild-cell {
  color: var(--text-secondary);
  font-size: 0.8rem;
}

.kd-cell {
  font-weight: 600;
}
.kd-good { color: var(--green); }
.kd-bad { color: #ff4444; }

.status-cell {
  display: flex;
  align-items: center;
  gap: 6px;
}
.status-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  display: inline-block;
}
.status-dot.online { background: var(--green); box-shadow: 0 0 6px var(--green); }
.status-dot.offline { background: #666; }
.status-label {
  font-size: 0.8rem;
  text-transform: uppercase;
  font-weight: 600;
}
.status-label.online { color: var(--green); }
.status-label.offline { color: #666; }

@media (max-width: 768px) {
  .ranking-table th,
  .ranking-table td {
    padding: 10px 8px;
    font-size: 0.75rem;
  }
  .player-avatar { width: 26px; height: 26px; font-size: 0.7rem; }
  .ranking-header h1 { font-size: 1.4rem; }
}
</style>
@endpush

@section('content')

@php
$players = [
  ['name' => 'Blood',       'level' => 9999, 'guild' => 'Legacy',     'kd' => 9.87, 'online' => true,  'avatar' => 'B'],
  ['name' => 'ShadowKing',  'level' => 9876, 'guild' => 'Darkness',   'kd' => 7.54, 'online' => true,  'avatar' => 'S'],
  ['name' => 'NightBlade',  'level' => 9543, 'guild' => 'Legacy',     'kd' => 6.21, 'online' => false, 'avatar' => 'N'],
  ['name' => 'DragonSlayer','level' => 9210, 'guild' => 'Valhalla',   'kd' => 8.03, 'online' => true,  'avatar' => 'D'],
  ['name' => 'FireMage',    'level' => 8901, 'guild' => 'Darkness',   'kd' => 5.47, 'online' => true,  'avatar' => 'F'],
  ['name' => 'Gandalf',     'level' => 8765, 'guild' => 'Order',      'kd' => 4.32, 'online' => false, 'avatar' => 'G'],
  ['name' => 'ThunderStrike','level' => 8432, 'guild' => 'Valhalla',  'kd' => 7.89, 'online' => true,  'avatar' => 'T'],
  ['name' => 'IceQueen',    'level' => 8123, 'guild' => 'Order',      'kd' => 6.54, 'online' => false, 'avatar' => 'I'],
  ['name' => 'VoidWalker',  'level' => 7890, 'guild' => 'Darkness',   'kd' => 5.12, 'online' => true,  'avatar' => 'V'],
  ['name' => 'StormBringer','level' => 7654, 'guild' => 'Legacy',     'kd' => 4.98, 'online' => true,  'avatar' => 'S'],
];
@endphp

<div class="ranking-wrapper">
  <div class="content-container">
    <div class="page-wrapper">

      <div class="ranking-header">
        <h1><i class="fas fa-trophy"></i> Player Rankings</h1>
        <p>Top warriors of Valka Online — who will claim the throne?</p>
      </div>

      <div class="ranking-tabs">
        <button class="ranking-tab active"><i class="fas fa-arrow-up"></i> Level</button>
        <button class="ranking-tab"><i class="fas fa-crosshairs"></i> PvP</button>
        <button class="ranking-tab"><i class="fas fa-shield-halved"></i> Guild</button>
        <button class="ranking-tab"><i class="fas fa-sack-dollar"></i> Donation</button>
      </div>

      <div class="ranking-table-wrapper">
        <table class="ranking-table">
          <thead>
            <tr>
              <th>Rank</th>
              <th>Player</th>
              <th>Level</th>
              <th>Guild</th>
              <th>K/D Ratio</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($players as $index => $player)
            <tr>
              <td>
                <span class="rank-number {{ $index < 3 ? 'rank-' . ($index + 1) : '' }}">
                  @if($index == 0)<i class="fas fa-crown"></i>@endif
                  #{{ $index + 1 }}
                </span>
              </td>
              <td>
                <div class="player-cell">
                  <div class="player-avatar">{{ $player['avatar'] }}</div>
                  <span class="player-name">{{ $player['name'] }}</span>
                </div>
              </td>
              <td class="level-cell">{{ number_format($player['level']) }}</td>
              <td class="guild-cell"><i class="fas fa-shield-halved" style="color:var(--accent);margin-right:4px"></i>{{ $player['guild'] }}</td>
              <td class="kd-cell {{ $player['kd'] >= 5 ? 'kd-good' : 'kd-bad' }}">{{ number_format($player['kd'], 2) }}</td>
              <td>
                <div class="status-cell">
                  <span class="status-dot {{ $player['online'] ? 'online' : 'offline' }}"></span>
                  <span class="status-label {{ $player['online'] ? 'online' : 'offline' }}">{{ $player['online'] ? 'Online' : 'Offline' }}</span>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

@endsection
