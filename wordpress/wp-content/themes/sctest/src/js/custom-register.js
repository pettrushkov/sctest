document.addEventListener("DOMContentLoaded", () => {
    "use strict";

    validation();
});

const validation = () => {
    const passwordFields = document.querySelectorAll('.register-modal-js input.password');
    const inputs = document.querySelectorAll('.register-modal-js input');

    if (inputs.length) {
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        const charAndSymbol = /^(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9\s]).*$/;

        inputs.forEach(input => {
            input.addEventListener('change', () => {
                const inputType = input.getAttribute('type');
                const inputValue = input.value;

                // email validation
                if (inputType === 'email') {
                    validInput(inputValue.match(emailRegex), input);
                }

                // name validation
                if (inputType === 'text' && !input.classList.contains('password')) {
                    validInput(inputValue !== '', input);
                }

                // password validation
                if (input.classList.contains('password')) {
                    validInput(inputValue !== '', input);

                    // any character or symbol
                    validInput(inputValue.match(charAndSymbol), input);

                    const secondPasswordMessage = passwordFields[1].parentElement.querySelector('.field-validation-message');

                    // is passwords not equal
                    if (passwordFields[0].value !== passwordFields[1].value
                        && // and not empty
                        passwordFields[0].value !== '' && passwordFields[1].value !== '') {
                        secondPasswordMessage.innerText = 'Паролі не співпадають';

                        // show invalid for two password fields
                        passwordFields.forEach(input => {
                            validInput(false, input);
                        });
                    } else {
                        // hide error
                        secondPasswordMessage.innerText = '';

                        if(passwordFields[0].value !== '' && passwordFields[1].value !== ''){
                            passwordFields.forEach(input => {
                                validInput(true, input);
                            });
                        }
                    }
                }
            });
        });
    }
}

const validInput = (condition, input) => {
    if (condition) {
        input.parentElement.classList.add('valid');
        input.parentElement.classList.remove('invalid');
    } else {
        input.parentElement.classList.add('invalid');
        input.parentElement.classList.remove('valid');
    }
}