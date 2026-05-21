@extends('layouts.app')

@section('title', 'Login - Valka Online')

@push('head')
<link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
@endpush

@section('content')

<div class="register-wrapper">
  <div class="register-container">
    <div class="register-card">
      <div class="register-header">
        <img src="{{ asset('assets/images/valkalogo.png') }}" alt="Valka Online" class="register-logo">
        <h1>Welcome Back</h1>
        <p>Login to your account and continue the battle!</p>
      </div>

      <form class="register-form">
        <div class="input-field">
          <input type="text" id="username" required>
          <label for="username">Username or Email</label>
          <span class="input-glow"></span>
        </div>

        <div class="input-field">
          <input type="password" id="password" required>
          <label for="password">Password</label>
          <span class="input-glow"></span>
        </div>

        <div class="register-terms" style="display:flex;justify-content:space-between;align-items:center">
          <label class="checkbox-label">
            <input type="checkbox">
            <span class="checkmark"></span>
            Remember me
          </label>
          <a href="#" style="font-size:0.8rem;color:var(--accent)">Forgot password?</a>
        </div>

        <button type="submit" class="register-btn">
          <span>Login</span>
          <i class="fas fa-arrow-right"></i>
        </button>
      </form>

      <div class="register-divider">
        <span>or login with</span>
      </div>

      <div class="register-social">
        <a href="#" class="social-btn social-discord"><i class="fab fa-discord"></i> Discord</a>
        <a href="#" class="social-btn social-google"><i class="fab fa-google"></i> Google</a>
        <a href="#" class="social-btn social-steam"><i class="fab fa-steam"></i> Steam</a>
      </div>

      <div class="register-footer">
        Don't have an account? <a href="{{ url('/register') }}">Register here</a>
      </div>
    </div>

    <div class="register-decoration">
      <div class="deco-circle deco-1"></div>
      <div class="deco-circle deco-2"></div>
      <div class="deco-circle deco-3"></div>
      <div class="deco-circle deco-4"></div>
      <div class="deco-line deco-line-1"></div>
      <div class="deco-line deco-line-2"></div>
    </div>
  </div>
</div>

@endsection
