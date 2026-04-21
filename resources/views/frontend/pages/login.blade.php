<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<title>Login</title>

<style>
:root {
    --primary-color: #13A1F3;
    --text-dark: #1a1a1a;
    --text-gray: #666;
    --border-color: #e0e0e0;
}

/* 🔒 Stop page sliding */
html, body {
    width: 100%;
    overflow-x: hidden;
}

body {
    font-family: 'Poppins', sans-serif;
    min-height: 100vh;
    margin: 0;

    /* Background image */
    background: 
      
      url("https://images.unsplash.com/photo-1522202176988-66273c2fd55f");

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}


/* Back button */
.blog-header {
    position: fixed;
    top: 20px;
    left: 20px;
    
}

.blog-header a {
    background: #fff;
    padding: 8px 16px;
    text-decoration: none;
    color: #000;
    font-size: 14px;
    border-radius: 20px;
}

/* Center container */
.signup-sec {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Card */
.login-container {
    width: 100%;
    max-width: 40rem;
}

.login-card {
    background: #fff;
    padding: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    border-radius: 20px;
}

/* Header */
.login-header {
    text-align: center;
    margin-bottom: 30px;
}

.login-header h3 {
    font-size: 28px;
    font-weight: 700;
}

.login-header p {
    color: var(--text-gray);
}

/* Inputs */
.form-input {
    width: 100%;
    padding: 14px 18px;
    border: 1px solid var(--border-color);
    font-size: 15px;
    border-radius: 15px;
}

.form-input:focus {
    outline: none;
    border-color: var(--primary-color);
}

/* Button */
.submit-btn {
    width: 100%;
    padding: 14px;
    background: var(--primary-color);
    color: #fff;
    border: none;
    font-size: 16px;
    cursor: pointer;
    border-radius: 15px;
}

/* No hover movement */
.submit-btn:hover {
    background: #0E7FC1;
}

/* Signup link */
.signup-link {
    margin-top: 20px;
    text-align: center;
    font-size: 14px;
}
.signup-link a {
    color: var(--primary-color);
    text-decoration: none;
}
</style>
</head>

<body>

<div class="blog-header">
    <a href="{{ url('/') }}">← Back to Home</a>
</div>

<section class="signup-sec">
    <div class="login-container">
        <div class="login-card">

            <div class="login-header">
                <a href="/">
            <img src="/brands/logo.png" class="h-[50px]"/>
            </a>
                <h3>Welcome Back</h3>
                <p>Login to your account</p>
            </div>

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="mb-3">
                    <input type="email"
                           name="email"
                           class="form-input"
                           placeholder="Email"
                           value="{{ old('email') }}"
                           required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="password"
                           name="password"
                           class="form-input"
                           placeholder="Password"
                           required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="submit-btn">Log In</button>

                <div class="signup-link">
                    New user?
                    <a href="{{ route('register.form') }}">Create account</a>
                </div>

            </form>

        </div>
    </div>
</section>

</body>
</html>
