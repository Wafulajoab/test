// script.js

const loginForm = document.querySelector('.login-form');
const signupForm = document.querySelector('.signup-form');
const loginLink = document.getElementById('login-link');
const signupLink = document.getElementById('signup-link');
const closeBtn = document.querySelector('.close-btn');

loginLink.addEventListener('click', () => {
    loginForm.style.display = 'block';
    signupForm.style.display = 'none';
});

signupLink.addEventListener('click', () => {
    loginForm.style.display = 'none';
    signupForm.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    document.querySelector('.form-popup').style.display = 'none';
});