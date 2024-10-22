import './bootstrap';

import Alpine from 'alpinejs';
import 'flowbite';

window.Alpine = Alpine;

Alpine.start();

// DARK MODE TOGGLE BUTTON
const toggle = document.getElementById('theme-toggle');
const body = document.body;
const lightIcon = document.getElementById('light-icon');
const darkIcon = document.getElementById('dark-icon');

// Load the theme from localStorage
if (localStorage.getItem('theme') === 'dark') {
    body.classList.add('dark');
    lightIcon.classList.add('hidden');
    darkIcon.classList.remove('hidden');
}

toggle.addEventListener('click', () => {
    body.classList.toggle('dark');

    // Toggle icons
    if (body.classList.contains('dark')) {
        lightIcon.classList.add('hidden');
        darkIcon.classList.remove('hidden');
        localStorage.setItem('theme', 'dark');
    } else {
        lightIcon.classList.remove('hidden');
        darkIcon.classList.add('hidden');
        localStorage.setItem('theme', 'light');
    }
});