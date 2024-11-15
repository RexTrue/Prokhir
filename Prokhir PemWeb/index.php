<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./css/index.css">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>

<body>
    <div class="container">
        <div class="logo-section">
            <div class="logo">CK</div>
        </div>

        <div class="form-section">
            <div class="happening-now">CeritaKita.</div>
            <div class="form-card">
                <div class="join-today">Join today.</div>

                <div class="auth-buttons">
                    <div id="g_id_onload"
                        data-client_id="YOUR_GOOGLE_CLIENT_ID"
                        data-login_uri="google-login.php"
                        data-auto_prompt="false">
                    </div>
                    <div class="g_id_signin"
                        data-type="standard"
                        data-shape="rectangular"
                        data-theme="outline"
                        data-text="sign_in_with"
                        data-size="large">
                    </div>
                    <button class="apple-btn">Sign up with Apple</button>
                </div>

                <div class="or">or</div>
                <a href="./FrontEnd/register.html"><button class="create-account-btn">Create account</button></a>

                <div class="sign-in">
                    <p>Already have an account? <a href="./FrontEnd/login.html">Sign in</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php include "./footer.php" ?>
    <script src="./script/login.js"></script>
</body>

</html>