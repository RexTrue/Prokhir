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

// window.fbAsyncInit = function() {
//     FB.init({
//         appId      : 'YOUR_FACEBOOK_APP_ID',
//         cookie     : true,
//         xfbml      : true,
//         version    : 'v16.0'
//     });
// };

// function checkLoginState() {
//     FB.getLoginStatus(function(response) {
//         if (response.status === 'connected') {
//             fetch('facebook-login.php', {
//                 method: 'POST',
//                 body: JSON.stringify({ accessToken: response.authResponse.accessToken })
//             });
//         }
//     });
// }