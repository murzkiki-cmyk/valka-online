@extends('layouts.app')

@section('title', 'Register - Valka Online')

@push('head')
<link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
@endpush

@section('content')

<div class="register-wrapper">
  <div class="register-container">
    <div class="register-card">
      <div class="register-header">
        <img src="{{ asset('assets/images/valkalogo.png') }}" alt="Valka Online" class="register-logo">
        <h1>Create Your Account</h1>
        <p>Join the battle and prove your worth!</p>
      </div>

      <form class="register-form">
        <div class="register-row">
          <div class="input-field">
            <input type="text" id="firstName" required>
            <label for="firstName">First Name</label>
            <span class="input-glow"></span>
          </div>
          <div class="input-field">
            <input type="text" id="lastName" required>
            <label for="lastName">Last Name</label>
            <span class="input-glow"></span>
          </div>
        </div>

        <div class="input-field">
          <input type="text" id="username" required>
          <label for="username">Username</label>
          <span class="input-glow"></span>
        </div>

        <div class="input-field">
          <input type="email" id="email" required>
          <label for="email">Email Address</label>
          <span class="input-glow"></span>
        </div>

        <div class="register-row">
          <div class="input-field">
            <input type="password" id="password" required>
            <label for="password">Password</label>
            <span class="input-glow"></span>
          </div>
          <div class="input-field">
            <input type="password" id="confirmPassword" required>
            <label for="confirmPassword">Confirm Password</label>
            <span class="input-glow"></span>
          </div>
        </div>

        <div class="register-terms">
          <label class="checkbox-label">
            <input type="checkbox" required>
            <span class="checkmark"></span>
            I agree to the <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>
          </label>
        </div>

        <button type="submit" class="register-btn">
          <span>Create Account</span>
          <i class="fas fa-arrow-right"></i>
        </button>
      </form>

      <div class="register-divider">
        <span>or register with</span>
      </div>

      <div class="register-social">
        <a href="#" class="social-btn social-discord"><i class="fab fa-discord"></i> Discord</a>
        <a href="#" class="social-btn social-google"><i class="fab fa-google"></i> Google</a>
        <a href="#" class="social-btn social-steam"><i class="fab fa-steam"></i> Steam</a>
      </div>

      <div class="register-footer">
        Already have an account? <a href="{{ url('/login') }}">Login here</a>
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
