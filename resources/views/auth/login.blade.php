<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login | Petchemparts</title>
@include('backend.layouts.head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
* { box-sizing: border-box; margin: 0; padding: 0; }

html, body {
    width: 100%;
    min-height: 100vh;
    overflow-x: hidden;
    font-family: 'Segoe UI', sans-serif;
}

body {
    display: flex;
    align-items: stretch;
    min-height: 100vh;
    background: #f0f4f8;
}

/* LEFT PANEL */
.left-panel {
    width: 55%;
    background: linear-gradient(145deg, #0d1b2a 0%, #1a3550 50%, #13A1F3 100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 60px 50px;
    position: relative;
    overflow: hidden;
}

/* Decorative circles on left */
.left-panel::before {
    content: '';
    position: absolute;
    top: -80px;
    right: -80px;
    width: 280px;
    height: 280px;
    background: rgba(255,255,255,0.06);
    border-radius: 50%;
}
.left-panel::after {
    content: '';
    position: absolute;
    bottom: -60px;
    left: -60px;
    width: 220px;
    height: 220px;
    background: rgba(255,255,255,0.05);
    border-radius: 50%;
}

.left-brand {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 50px;
    position: relative;
    z-index: 1;
}
.left-brand-icon {
    width: 44px;
    height: 44px;
    background: #13A1F3;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    color: #fff;
}
.left-brand-text {
    font-size: 20px;
    font-weight: 700;
    color: #fff;
    letter-spacing: 0.3px;
}

.left-illustration {
    width: 100%;
    max-width: 320px;
    margin-bottom: 40px;
    position: relative;
    z-index: 1;
}

/* Illustration placeholder */
.illustration-box {
    width: 100%;
    aspect-ratio: 4/3;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 18px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 16px;
    padding: 30px;
}
.illustration-box i {
    font-size: 60px;
    color: rgba(255,255,255,0.3);
}

.left-tagline {
    text-align: center;
    position: relative;
    z-index: 1;
}
.left-tagline h2 {
    font-size: 26px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 10px;
    line-height: 1.3;
}
.left-tagline p {
    font-size: 14px;
    color: rgba(255,255,255,0.55);
    line-height: 1.6;
}

/* Feature dots */
.feature-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 28px;
    width: 100%;
    max-width: 300px;
    position: relative;
    z-index: 1;
}
.feature-item {
    display: flex;
    align-items: center;
    gap: 10px;
    color: rgba(255,255,255,0.75);
    font-size: 13px;
}
.feature-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #13A1F3;
    flex-shrink: 0;
}

/* RIGHT PANEL */
.right-panel {
    width: 45%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 50px;
    background: #fff;
}

.login-box {
    width: 100%;
    max-width: 380px;
}

/* Header */
.admin-header {
    margin-bottom: 32px;
}
.admin-header-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #dbeafe;
    color: #1d4ed8;
    font-size: 12px;
    font-weight: 600;
    padding: 5px 12px;
    border-radius: 20px;
    margin-bottom: 14px;
}
.admin-header h2 {
    font-size: 26px;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 6px;
}
.admin-header p {
    font-size: 14px;
    color: #9ca3af;
}

/* Fields */
.field {
    margin-bottom: 16px;
}
.field label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 6px;
}
.field-wrap {
    position: relative;
}
.field-icon {
    position: absolute;
    left: 13px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 14px;
    pointer-events: none;
}
.field input[type="email"],
.field input[type="password"] {
    width: 100%;
    padding: 11px 14px 11px 38px;
    border: 1.5px solid #e5e7eb;
    border-radius: 9px;
    font-size: 14px;
    color: #1a1a2e;
    background: #f9fafb;
    outline: none;
    transition: border 0.2s, box-shadow 0.2s, background 0.2s;
}
.field input:focus {
    border-color: #13A1F3;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(19,161,243,0.12);
}
.field input.is-invalid {
    border-color: #ef4444;
}
.invalid-feedback {
    font-size: 12px;
    color: #ef4444;
    margin-top: 4px;
    display: block;
}

/* Remember me */
.remember-row {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 20px;
}
.remember-row input[type="checkbox"] {
    width: 15px;
    height: 15px;
    accent-color: #13A1F3;
}
.remember-row label {
    font-size: 13px;
    color: #6b7280;
    cursor: pointer;
}

/* Submit btn */
.submit-btn {
    width: 100%;
    padding: 13px;
    background: linear-gradient(135deg, #13A1F3, #0d7ec7);
    color: #fff;
    border: none;
    border-radius: 10px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: opacity 0.2s, transform 0.15s;
}
.submit-btn:hover {
    opacity: 0.92;
    transform: translateY(-1px);
}

/* Divider */
.or-divider {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 18px 0;
}
.or-divider::before,
.or-divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: #e5e7eb;
}
.or-divider span {
    font-size: 12px;
    color: #9ca3af;
}

/* Forgot password */
.forgot-link {
    text-align: center;
}
.forgot-link a {
    font-size: 13px;
    color: #13A1F3;
    text-decoration: none;
    font-weight: 500;
}
.forgot-link a:hover { text-decoration: underline; }

/* Responsive */
@media (max-width: 768px) {
    body { flex-direction: column; }
    .left-panel { width: 100%; padding: 40px 30px; }
    .right-panel { width: 100%; padding: 40px 24px; }
    .illustration-box { display: none; }
}
</style>
</head>
<body>

<!-- LEFT -->
<div class="left-panel">
    <div class="left-brand">
        <div class="left-brand-icon">
            <i class="fas fa-cog"></i>
        </div>
        <span class="left-brand-text">Petchemparts Admin</span>
    </div>

    <div class="left-illustration">
        <div class="illustration-box">
            <i class="fas fa-shield-alt"></i>
        </div>
    </div>

    <div class="left-tagline">
        <h2>Admin Control Panel</h2>
        <p>Manage your store, orders, products and customers from one place.</p>
    </div>

    <div class="feature-list">
        <div class="feature-item">
            <span class="feature-dot"></span>
            Order & inventory management
        </div>
        <div class="feature-item">
            <span class="feature-dot"></span>
            Customer & user control
        </div>
        <div class="feature-item">
            <span class="feature-dot"></span>
            Real-time reports & analytics
        </div>
    </div>
</div>

<!-- RIGHT -->
<div class="right-panel">
    <div class="login-box">

        <div class="admin-header">
            <div class="admin-header-badge">
                <i class="fas fa-lock" style="font-size:10px;"></i>
                Admin Access
            </div>
            <h2>Welcome Back!</h2>
            <p>Sign in to your admin account</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field">
                <label for="email">Email Address</label>
                <div class="field-wrap">
                    <i class="fas fa-envelope field-icon"></i>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="admin@example.com"
                           class="@error('email') is-invalid @enderror"
                           required autocomplete="email" autofocus>
                </div>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="password">Password</label>
                <div class="field-wrap">
                    <i class="fas fa-lock field-icon"></i>
                    <input type="password"
                           id="password"
                           name="password"
                           placeholder="Enter your password"
                           class="@error('password') is-invalid @enderror"
                           required autocomplete="current-password">
                </div>
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="remember-row">
                <input type="checkbox"
                       name="remember"
                       id="remember"
                       {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Keep me signed in</label>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-sign-in-alt"></i> Sign In
            </button>

            @if(Route::has('password.request'))
                <div class="or-divider"><span>or</span></div>
                <div class="forgot-link">
                    <a href="{{ route('password.request') }}">
                        <i class="fas fa-key" style="font-size:12px;"></i>
                        Forgot your password?
                    </a>
                </div>
            @endif

        </form>
    </div>
</div>

</body>
</html>