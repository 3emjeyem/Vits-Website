<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignUp Page</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
</head>

<body>
    <div class="container">
        <!-- Left Side -->
        <div class="left">
            <div class="bottom-left-row">
                <div class="bottom-left-images">
                    <img src="<?php echo e(asset('images/vits.png')); ?>" alt="VITS">
                    <img src="<?php echo e(asset('images/PLV.png')); ?>" alt="PLV">
                </div>
                <h2 class="bottom-left-title">PAMANTASAN NG<br>LUNGSOD NG<br><strong>VALENZUELA</strong></h2>
            </div>
        </div>

        <!-- Right Side -->
        <div class="right">
            <div class="login-box">
                <h3>Create an account</h3>

                <form id="signupForm" method="POST" action="<?php echo e(url('/signup')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="input-group">
                        <input type="text" name="name" placeholder="Username" id="name" required>
                    </div>

                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email" id="email" required>
                    </div>

                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" id="password" required>
                        <span class="toggle-password" data-target="#password">👁</span>
                    </div>
                    <div style="height:0;overflow:hidden;">
                        <button type="submit" id="submitBtn" class="action-btn">Create Account</button>
                    </div>
                </form>
            </div>
            <!-- Move these outside .login-box, below the form box -->
            <button id="visibleSubmitBtn" class="action-btn">Create Account</button>
        </div>
    </div>

    <div class="bottom-links">
        <div class="other-links">
            <a href="#">Terms & Conditions</a>
            <a href="#">Privacy Policy</a>
        </div>
    </div>

    <script src="responsive.js"></script>
    <script src="<?php echo e(asset('js/home-responsive.js')); ?>"></script>
    <script src="<?php echo e(asset('js/toggle-password.js')); ?>"></script>
    <script>
        // Submit the signup form when visible button is clicked
        document.getElementById('visibleSubmitBtn').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('signupForm').submit();
        });
    </script>
</body>

</html>
<?php /**PATH C:\Users\javin\Codes\vits_website\resources\views/signin.blade.php ENDPATH**/ ?>