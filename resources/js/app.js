import './bootstrap';

import Alpine from 'alpinejs';
import 'flowbite';

window.Alpine = Alpine;

Alpine.start();

// DARK MODE TOGGLE BUTTON
const toggle = document.getElementById('theme-toggle');
const body = document.documentElement;
const lightIcon = document.getElementById('light-icon');
const darkIcon = document.getElementById('dark-icon');

// Load the theme from localStorage
if (localStorage.getItem('theme') === 'dark') {
    body.classList.add('dark');
    changeTheme('dark')
}else {
    changeTheme('light')
}

if(toggle){
    toggle.addEventListener('click', () => {
        body.classList.toggle('dark');

        // Toggle icons
        if (body.classList.contains('dark')) {
            changeTheme('dark')
        } else {
            changeTheme('light')
        }
    });
}

function changeTheme(theme) {
    if(theme === 'dark') {
        if(lightIcon && darkIcon){
            lightIcon.classList.add('hidden');
            darkIcon.classList.remove('hidden');
        }
        localStorage.setItem('theme', 'dark');
    }else {
        if(lightIcon && darkIcon) {
            lightIcon.classList.remove('hidden');
            darkIcon.classList.add('hidden');
        }
        localStorage.setItem('theme', 'light');
    }
}