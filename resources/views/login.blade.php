<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <div class="container">
        <!-- Left Side -->
        <div class="left">
            <div class="bottom-left-row">
                <div class="bottom-left-images">
                    <img src="{{ asset('images/vits.png') }}" alt="VITS">
                    <img src="{{ asset('images/PLV.png') }}" alt="PLV">
                </div>
                <h2 class="bottom-left-title">PAMANTASAN NG<br>LUNGSOD NG<br><strong>VALENZUELA</strong></h2>
            </div>
        </div>

        <!-- Right Side -->
        <div class="right">
            <div class="login-box">
                <h3>LOGIN</h3>

                <form id="loginForm" method="POST" action="{{ url('/login') }}">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="identifier" placeholder="Email or Username" id="username" required>
                    </div>

                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" id="password" required>
                        <span class="toggle-password" data-target="#password">👁</span>
                    </div>

                    <a href="#" class="forgot">Forgot Password?</a>             </form>
            </div>
            <!-- Move these outside .login-box, below the form box -->
            @if($errors->has('login'))
                <div class="notification error">{{ $errors->first('login') }}</div>
            @endif
            <button id="visibleLoginBtn" class="action-btn">SUBMIT</button>
            <div class="create-account">
                <p>Create account? <a href="{{ url('/signin') }}">Sign Up</a></p>
            </div>
        </div>
    </div>


    <div class="bottom-links">
        <div class="admin-link" style="margin-right:1rem;">
            <p style="margin:0;">Admin? <a href="{{ url('/admin-login') }}">Login as admin</a></p>
        </div>
        <div class="other-links">
            <a href="#">Terms & Conditions</a>
            <a href="#">Privacy Policy</a>
        </div>
    </div>

    <script src="responsive.js"></script>
    <script src="{{ asset('js/home-responsive.js') }}"></script>
    <script src="{{ asset('js/toggle-password.js') }}"></script>
    <script>
        // Submit login form when visible button is clicked
        document.getElementById('visibleLoginBtn').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('loginForm').submit();
        });

        // Also wire signup visible button (if present) to submit signup form
        const signupBtn = document.getElementById('visibleSubmitBtn');
        if (signupBtn) {
            signupBtn.addEventListener('click', function (e) {
                e.preventDefault();
                document.getElementById('signupForm').submit();
            });
        }
    </script>
</body>

</html>