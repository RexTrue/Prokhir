<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerita Kita login</title>

    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

    <!-- Styling -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #1a1a1a;
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #2c2c2c;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .tab {
            display: flex;
            justify-content: space-around;
            margin-bottom: 1.5rem;
        }

        .tab button {
            background-color: transparent;
            border: none;
            color: #fff;
            padding: 1rem;
            cursor: pointer;
            border-bottom: 2px solid transparent;
        }

        .tab button.active {
            border-bottom: 2px solid #f39c12;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            text-align: left;
            margin-bottom: 0.5rem;
        }

        input {
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 5px;
            background-color: #444;
            color: #fff;
        }

        button {
            padding: 0.75rem;
            background-color: #f39c12;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background-color: #e67e22;
        }

        .hidden {
            display: none;
        }

        .g_id_signin, fb:login-button {
            margin-bottom: 1rem;
        }

        .divider {
            margin: 1rem 0;
            border-bottom: 1px solid #444;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Welcome to Cerita Kita</h2>

        <div class="tab">
            <button id="login-tab" class="active" onclick="showForm('login')">Login</button>
            <button id="register-tab" onclick="showForm('register')">Register</button>
        </div>

        <form id="login-form" action="../BackEnd/login.php" method="POST">
            <label for="login-username">Username/Email:</label>
            <input type="text" id="login-username" name="username" placeholder="Enter your username/email" required>

            <label for="login-password">Password:</label>
            <input type="password" id="login-password" name="password" placeholder="Enter your password" required>

            <button type="submit">Login</button>

            <div class="divider"></div>

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

            <!-- Facebook Login Button -->
            <!-- <div>
                <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                </fb:login-button>
            </div> -->
        </form>

        <!-- Register Form -->
        <form id="register-form" class="hidden" action="../BackEnd/register.php" method="POST">
            <label for="register-username">Username:</label>
            <input type="text" id="register-username" name="username" placeholder="Choose a username" required>

            <label for="register-email">Email:</label>
            <input type="email" id="register-email" name="email" placeholder="Enter your email" required>

            <label for="register-password">Password:</label>
            <input type="password" id="register-password" name="password" placeholder="Choose a password" required>

            <button type="submit">Register</button>
        </form>
    </div>

    <script>
        function showForm(formType) {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const loginTab = document.getElementById('login-tab');
            const registerTab = document.getElementById('register-tab');

            if (formType === 'login') {
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
                loginTab.classList.add('active');
                registerTab.classList.remove('active');
            } else {
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');
                loginTab.classList.remove('active');
                registerTab.classList.add('active');
            }
        }

        window.fbAsyncInit = function() {
            FB.init({
                appId      : 'YOUR_FACEBOOK_APP_ID',
                cookie     : true,
                xfbml      : true,
                version    : 'v16.0'
            });
        };

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                    fetch('facebook-login.php', {
                        method: 'POST',
                        body: JSON.stringify({ accessToken: response.authResponse.accessToken })
                    });
                }
            });
        }
    </script>
    <?php include "../footer.php"?>
</body>
</html>
