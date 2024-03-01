document.addEventListener("DOMContentLoaded", () => {
    "use strict";

    closeModal();
    showLoginModal();
    togglePassword();
});

const togglePassword = () => {
    const btns = document.querySelectorAll('.password-field .show-toggle');

    if (btns.length) {
        btns.forEach(btn => {
            btn.addEventListener('click', () => {
                btn.classList.toggle('show-toggle--showed');

                const prevEl = btn.previousElementSibling;

                if (prevEl.getAttribute('type') === 'password') {
                    prevEl.setAttribute('type', 'text');
                } else {
                    prevEl.setAttribute('type', 'password');
                }
            });
        });
    }
}

const showLoginModal = () => {
    const btn = document.querySelector('.btn-show-login');
    const modal = document.querySelector('.login-modal-js');

    if (btn && modal) {
        btn.addEventListener('click', () => {
            modal.classList.remove('hide');
        });
    }
}

const closeModal = () => {
    const closeBtns = document.querySelectorAll('.modal-close');

    if (closeBtns.length) {
        closeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                btn.parentElement.parentElement.classList.add('hide');
            });
        });
    }
}