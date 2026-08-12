<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<title>Register</title>

<style>
:root {
    --primary-color: #13A1F3;
    --text-dark: #1a1a1a;
    --text-gray: #666;
    --border-color: #e0e0e0;
}

/* Stop sliding */
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

/* Center section */
.signup-sec {
    min-height: 90vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Card */
.register-container {
    width: 100%;
    max-width: 40rem;
}

.register-card {
    background: #fff;
    padding: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    border-radius: 20px;
    margin-top :10px;
}

/* Header */
.register-header {
    text-align: center;
    margin-bottom: 20px;
}

.register-header h3 {
    font-size: 28px;
    font-weight: 700;
}

.register-header p {
    color: var(--text-gray);
}

/* Inputs */
.form-input {
    width: 100%;
    padding: 14px 18px;
    border: 1px solid var(--border-color);
    font-size: 15px;
    margin-bottom: 15px;
    border-radius:15px;
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
     border-radius:15px;
}

.submit-btn:hover {
    background: #0E7FC1;
}

/* Footer link */
.form-footer {
    margin-top: 20px;
    text-align: center;
    font-size: 14px;
}

.form-footer a {
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
    <div class="register-container">
        <div class="register-card">

            <div class="register-header">
                <a href="/">
            <img src="/brands/logo.png" class="h-[50px]"/>
            </a>
                <h3>Create Account</h3>
                <p>Fill details to create your account</p>
            </div>

            <form method="POST" action="{{ route('register.submit') }}">
                @csrf

                <input type="text"
                       name="first_name"
                       class="form-input"
                       placeholder="First Name"
                       value="{{ old('first_name') }}"
                       required>
                @error('first_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <input type="text"
                       name="last_name"
                       class="form-input"
                       placeholder="Last Name"
                       value="{{ old('last_name') }}"
                       required>
                @error('last_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <input type="email"
                       name="email"
                       class="form-input"
                       placeholder="Email Address"
                       value="{{ old('email') }}"
                       required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <input type="password"
                       name="password"
                       class="form-input"
                       placeholder="Password"
                       required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <button type="submit" class="submit-btn">Register</button>

                <div class="form-footer">
                    Already have an account?
                    <a href="{{ route('login.form') }}">Log In</a>
                </div>

            </form>

        </div>
    </div>
</section>

</body>
</html>
