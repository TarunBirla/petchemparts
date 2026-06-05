<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | Petchemparts</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
* { box-sizing: border-box; margin: 0; padding: 0; }

html, body {
    width: 100%;
    overflow-x: hidden;
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
}

body {
    background: linear-gradient(135deg, #0d7ec7 0%, #13A1F3 50%, #0ea5e9 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

/* Decorative circles */
body::before {
    content: '';
    position: fixed;
    top: -120px;
    right: -120px;
    width: 400px;
    height: 400px;
    background: rgba(255,255,255,0.07);
    border-radius: 50%;
    pointer-events: none;
}
body::after {
    content: '';
    position: fixed;
    bottom: -100px;
    left: -100px;
    width: 320px;
    height: 320px;
    background: rgba(255,255,255,0.06);
    border-radius: 50%;
    pointer-events: none;
}

/* Back button */
.back-btn {
    position: fixed;
    top: 20px;
    left: 20px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(255,255,255,0.18);
    backdrop-filter: blur(6px);
    color: #fff;
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    padding: 8px 16px;
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.25);
    transition: background 0.2s;
    z-index: 10;
}
.back-btn:hover {
    background: rgba(255,255,255,0.28);
    color: #fff;
    text-decoration: none;
}

/* Card */
.login-card {
    width: 100%;
    max-width: 420px;
    background: #fff;
    border-radius: 22px;
    padding: 42px 40px 36px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.18);
    position: relative;
    z-index: 1;
}

/* Logo + header */
.login-logo {
    display: flex;
    justify-content: center;
    margin-bottom: 6px;
}
.login-logo img {
    height: 48px;
    object-fit: contain;
}
.login-header {
    text-align: center;
    margin-bottom: 28px;
}
.login-header h3 {
    font-size: 24px;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 4px;
}
.login-header p {
    font-size: 14px;
    color: #9ca3af;
}

/* Divider line */
.divider-line {
    height: 2px;
    background: linear-gradient(90deg, #13A1F3, #0ea5e9);
    border-radius: 2px;
    margin-bottom: 28px;
}

/* Input groups */
.field {
    margin-bottom: 16px;
    position: relative;
}
.field-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 15px;
    pointer-events: none;
}
.field input {
    width: 100%;
    padding: 12px 14px 12px 40px;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
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
.field .error-msg {
    font-size: 12px;
    color: #ef4444;
    margin-top: 4px;
    display: block;
}

/* Submit button */
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
    margin-top: 6px;
    transition: opacity 0.2s, transform 0.15s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
.submit-btn:hover {
    opacity: 0.92;
    transform: translateY(-1px);
}

/* Footer link */
.login-footer {
    text-align: center;
    margin-top: 22px;
    font-size: 13px;
    color: #9ca3af;
}
.login-footer a {
    color: #13A1F3;
    font-weight: 600;
    text-decoration: none;
}
.login-footer a:hover { text-decoration: underline; }
</style>
</head>
<body>

<a href="{{ url('/') }}" class="back-btn">
    <i class="fas fa-arrow-left"></i> Back to Home
</a>

<div class="login-card">

    <div class="login-logo">
        <a href="{{ url('/') }}">
            <img src="/brands/logo.png" alt="Petchemparts">
        </a>
    </div>

    <div class="login-header">
        <h3>Welcome Back</h3>
        <p>Sign in to your account</p>
    </div>

    <div class="divider-line"></div>

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <div class="field">
            <i class="fas fa-envelope field-icon"></i>
            <input type="email"
                   name="email"
                   placeholder="Email address"
                   value="{{ old('email') }}"
                   required autocomplete="email" autofocus>
            @error('email')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="field">
            <i class="fas fa-lock field-icon"></i>
            <input type="password"
                   name="password"
                   placeholder="Password"
                   required autocomplete="current-password">
            @error('password')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="submit-btn">
            <i class="fas fa-sign-in-alt"></i> Log In
        </button>
    </form>

    <div class="login-footer">
        New user? <a href="{{ route('register.form') }}">Create account</a>
    </div>

</div>

</body>
</html>