const $ = (id) => {
    return document.getElementById(id);
};

document.addEventListener("DOMContentLoaded", function() {
    const togglePassword = $('togglePassword');
    const password = $('passwordInput');
    
    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
});