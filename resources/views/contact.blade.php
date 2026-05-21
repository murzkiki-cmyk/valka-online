@extends('layouts.app')

@section('title', 'Contact Us - Valka Online')
@section('description', 'Contact Valka Online support team. Get help with accounts, payments, technical issues, and more.')

@push('head')
<style>
.contact-wrapper {
  padding: 40px 0;
}
.page-wrapper {
  animation: pageFadeIn 0.4s ease forwards;
}
@keyframes pageFadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}
.contact-header {
  text-align: center;
  margin-bottom: 32px;
}
.contact-header h1 {
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
.contact-header h1 i { color: var(--accent); }
.contact-header p {
  color: var(--text-secondary);
  font-size: 0.9rem;
}

.contact-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 24px;
  max-width: 900px;
  margin: 0 auto;
}

.contact-card {
  background: linear-gradient(135deg, rgba(0,0,0,0.85) 0%, rgba(20,20,25,0.7) 100%);
  border: 1px solid var(--border-color);
  border-radius: var(--radius);
  backdrop-filter: blur(4px);
  padding: 28px;
  box-shadow: 0 0 12px hsla(0, 99%, 46%, 0.15);
}

.contact-card h2 {
  font-family: var(--ff-alt);
  font-size: 1.2rem;
  font-weight: 700;
  text-transform: uppercase;
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
}
.contact-card h2 i { color: var(--accent); }

.contact-form {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.contact-form .input-field {
  position: relative;
}
.contact-form .input-field input,
.contact-form .input-field select,
.contact-form .input-field textarea {
  width: 100%;
  padding: 12px 14px;
  background: var(--bg-input);
  border: 1px solid var(--border-color);
  border-radius: var(--radius-sm);
  color: var(--text-primary);
  font-size: 0.85rem;
  outline: none;
  transition: var(--transition);
  font-family: var(--ff-main);
}
.contact-form .input-field input:focus,
.contact-form .input-field select:focus,
.contact-form .input-field textarea:focus {
  border-color: var(--accent);
  box-shadow: 0 0 8px var(--accent-glow);
}
.contact-form .input-field input::placeholder,
.contact-form .input-field textarea::placeholder {
  color: var(--text-muted);
}
.contact-form .input-field select {
  cursor: pointer;
  appearance: none;
  -webkit-appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512'%3E%3Cpath fill='%23666677' d='M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 12px center;
  background-size: 12px;
  padding-right: 36px;
}
.contact-form .input-field select option {
  background: var(--bg-card);
  color: var(--text-primary);
}
.contact-form .input-field textarea {
  resize: vertical;
  min-height: 120px;
}

.contact-submit {
  padding: 12px 24px;
  background: var(--accent);
  color: #fff;
  font-weight: 700;
  text-transform: uppercase;
  border-radius: var(--radius-sm);
  font-size: 0.9rem;
  transition: var(--transition);
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  font-family: var(--ff-alt);
}
.contact-submit:hover {
  background: var(--accent-hover);
  transform: translateY(-1px);
  box-shadow: 0 0 12px var(--accent-glow);
}

.contact-info-list {
  display: flex;
  flex-direction: column;
  gap: 16px;
}
.contact-info-item {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  padding: 14px;
  background: var(--bg-input);
  border-radius: var(--radius-sm);
  border: 1px solid var(--border-color);
  transition: var(--transition);
}
.contact-info-item:hover {
  border-color: var(--border-hover);
}
.contact-info-item .info-icon {
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--accent);
  color: #fff;
  border-radius: var(--radius-sm);
  font-size: 1rem;
  flex-shrink: 0;
}
.contact-info-item .info-content h4 {
  font-family: var(--ff-alt);
  font-size: 0.85rem;
  font-weight: 700;
  text-transform: uppercase;
  margin-bottom: 2px;
}
.contact-info-item .info-content p {
  font-size: 0.8rem;
  color: var(--text-secondary);
}

@media (max-width: 768px) {
  .contact-grid {
    grid-template-columns: 1fr;
  }
  .contact-header h1 { font-size: 1.4rem; }
}
</style>
@endpush

@section('content')

<div class="contact-wrapper">
  <div class="content-container">
    <div class="page-wrapper">

      <div class="contact-header">
        <h1><i class="fas fa-envelope"></i> Contact Us</h1>
        <p>Have a question, issue, or feedback? We'd love to hear from you!</p>
      </div>

      <div class="contact-grid">

        <div class="contact-card">
          <h2><i class="fas fa-paper-plane"></i> Send a Message</h2>
          <form class="contact-form">
            <div class="input-field">
              <input type="text" placeholder="Your Name" required>
            </div>
            <div class="input-field">
              <input type="email" placeholder="Your Email" required>
            </div>
            <div class="input-field">
              <select required>
                <option value="" disabled selected>Select Subject</option>
                <option value="account">Account Issue</option>
                <option value="payment">Payment Problem</option>
                <option value="technical">Technical Support</option>
                <option value="suggestion">Suggestion</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="input-field">
              <textarea placeholder="Write your message..." required></textarea>
            </div>
            <button type="submit" class="contact-submit">
              <i class="fas fa-paper-plane"></i> Send Message
            </button>
          </form>
        </div>

        <div class="contact-card">
          <h2><i class="fas fa-circle-info"></i> Contact Info</h2>
          <div class="contact-info-list">
            <div class="contact-info-item">
              <div class="info-icon"><i class="fas fa-envelope"></i></div>
              <div class="info-content">
                <h4>Email</h4>
                <p>info@exemple.com</p>
              </div>
            </div>
            <div class="contact-info-item">
              <div class="info-icon"><i class="fab fa-discord"></i></div>
              <div class="info-content">
                <h4>Discord</h4>
                <p>Join our community: <a href="https://discord.gg/BqCWseWtnM" target="_blank" style="color:var(--accent)">discord.gg/valka</a></p>
              </div>
            </div>
            <div class="contact-info-item">
              <div class="info-icon"><i class="fas fa-location-dot"></i></div>
              <div class="info-content">
                <h4>Address</h4>
                <p>PO Box W75 Street lan West new queens</p>
              </div>
            </div>
            <div class="contact-info-item">
              <div class="info-icon"><i class="fas fa-headset"></i></div>
              <div class="info-content">
                <h4>Phone</h4>
                <p>+24 1245 654 235</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

@endsection
