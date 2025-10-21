
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .notification.error { color: #b00020; background: #ffe5e9; padding: .5rem; border-radius: 8px; margin-bottom: 1rem; }
    </style>
</head>

<body>
    <div class="container">
        <!-- Left Side (same as home) -->
        <div class="left">
            <div class="bottom-left-row">
                <div class="bottom-left-images">
                    <img src="{{ asset('images/vits.png') }}" alt="VITS">
                    <img src="{{ asset('images/PLV.png') }}" alt="PLV">
                </div>
                <h2 class="bottom-left-title">PAMANTASAN NG<br>LUNGSOD NG<br><strong>VALENZUELA</strong></h2>
            </div>
        </div>

        <!-- Right Side (Admin login box) -->
        <div class="right">
            <div class="login-box">
                <h3>ADMIN LOGIN</h3>

                <form id="adminLoginForm" method="POST" action="{{ url('/admin-login') }}">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="name" placeholder="Admin Name" required>
                    </div>

                    <div class="input-group">
                        <input type="password" id="admin_password" name="password" placeholder="Password" required>
                        <span class="toggle-password" data-target="#admin_password">👁</span>
                    </div>

                </form>
            </div>

            @if($errors->has('admin'))
                <div class="notification error">{{ $errors->first('admin') }}</div>
            @endif

            <button id="visibleAdminLoginBtn" class="action-btn">LOGIN AS ADMIN</button>

            <div class="create-account">
                <p>Back to <a href="{{ url('/login') }}">User Login</a></p>
            </div>
        </div>
    </div>


    <div class="bottom-links">
        <div class="other-links">
            <a href="#">Terms & Conditions</a>
            <a href="#">Privacy Policy</a>
        </div>
    </div>

    <script src="responsive.js"></script>
    <script src="{{ asset('js/home-responsive.js') }}"></script>
    <script src="{{ asset('js/toggle-password.js') }}"></script>
    <script>
        // Submit admin login form when visible button is clicked
        document.getElementById('visibleAdminLoginBtn').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('adminLoginForm').submit();
        });
    </script>
</body>

</html>
