document.addEventListener("DOMContentLoaded", () => {
    "use strict";

    closeModal();
    showLoginModal();
    showRegisterModal();
    togglePassword();
    changeType();
});

// Change a type of additional contact in register form
const changeType = () => {
    const btns = document.querySelectorAll('.modal-additional-contact-type');
    const inputTypeField = document.querySelector('input[name="additional-contact-type"]');

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
                    const type = btn.getAttribute('data-source');
                    input.placeholder = `@${type}_адреса`;

                    inputTypeField.value = type;
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

const showRegisterModal = () => {
    const btn = document.querySelector('.btn-show-register');
    const modal = document.querySelector('.register-modal-js');

    if (btn && modal) {
        btn.addEventListener('click', () => {
            modal.classList.remove('hide');
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