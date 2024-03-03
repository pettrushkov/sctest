document.addEventListener("DOMContentLoaded", () => {
    "use strict";

    closeModal();
    showLoginModal();
    togglePassword();
    changeType();
});

// Change a type of additional contact in register form
const changeType = () => {
    const btns = document.querySelectorAll('.modal-additional-contact-type');

    if (btns.length) {
        btns.forEach(btn => {
            btn.addEventListener('click', () => {
                if (!btn.classList.contains('active')) {
                    // remove active class
                    const activeBtn = document.querySelector('.modal-additional-contact-type.active');
                    activeBtn.classList.remove('active');

                    btn.classList.add('active');
                    // change additional contact input placeholder
                    const input = btn.parentElement.querySelector('input');
                    input.placeholder = `@${btn.getAttribute('data-source')}_адреса`;
                }
            });
        });
    }
}

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