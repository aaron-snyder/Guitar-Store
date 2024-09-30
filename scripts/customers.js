const $ = (id) => {
    return document.getElementById(id);
};

function validateCustomerInfo() {
    let isValid = true;
    const emailRegex = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
    const passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    const email = $("email").value;
    const password = $('password').value;
    const confirmPassword = $('confirm_password').value;

    // Validate email
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        isValid = false;
    }

    // Validate password
    if (!passwordRegex.test(password)) {
        alert('Password must contain at least one number, one uppercase and lowercase letter, one special character, and be at least 8 characters long.');
        isValid = false;
    }

    // Validate passwords match
    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        isValid = false;
    }

    return isValid;
}

function validateBillingAddress() {
    let isValid = true;
    const zipCodeRegex = /^\d{5}(-\d{4})?(?!-)$/;
    const phoneRegex = /^(1\s?)?(\d{3}|\(\d{3}\))[\s\-]?\d{3}[\s\-]?\d{4}$/gm;

    const zipCode = document.getElementById('billing_zip').value;
    const phone = document.getElementById('billing_phone').value;

    // Validate zip code
    if (!zipCodeRegex.test(zipCode)) {
        alert('Please enter a valid billing zip code.');
        isValid = false;
    }

    // Validate phone
    if (!phoneRegex.test(phone)) {
        alert('Please enter a valid billing phone number.');
        isValid = false;
    }

    return isValid;
}

function validateShippingAddress() {
    let isValid = true;
    const zipCodeRegex = /^\d{5}(-\d{4})?(?!-)$/;
    const phoneRegex = /^(1\s?)?(\d{3}|\(\d{3}\))[\s\-]?\d{3}[\s\-]?\d{4}$/gm;

    const zipCode = document.getElementById('shipping_zip').value;
    const phone = document.getElementById('shipping_phone').value;

    // Validate zip code
    if (!zipCodeRegex.test(zipCode)) {
        alert('Please enter a valid shipping zip code.');
        isValid = false;
    }

    // Validate phone
    if (!phoneRegex.test(phone)) {
        alert('Please enter a valid shipping phone number.');
        isValid = false;
    }

    return isValid;
}

document.addEventListener("DOMContentLoaded", function() {
    $("customerInfoForm").addEventListener("submit", function() {
        if (!validateCustomerInfo()) {
            event.preventDefault();
        }
    });
    
    $("billingInfoForm").addEventListener("submit", function() {
        if (!validateBillingAddress()) {
            event.preventDefault();
        }
    });
    
    $("shippingInfoForm").addEventListener("submit", function() {
        if (!validateShippingAddress()) {
            event.preventDefault();
        }
    });
    
    const togglePassword = $('togglePassword');
    const password = $('password');
    const toggleConfirmPassword = $('toggleConfirmPassword');
    const confirm_password = $('confirm_password');
    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
    
    toggleConfirmPassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = confirm_password.getAttribute('type') === 'password' ? 'text' : 'password';
        confirm_password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
    
});