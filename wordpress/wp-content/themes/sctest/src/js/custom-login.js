document.addEventListener("DOMContentLoaded", () => {
    "use strict";

    customLogin();
});

const customLogin = () => {
    const forms = document.querySelectorAll('.modal-form');

    if (forms.length) {
        forms.forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();

                const data = new FormData(form);
                const answer = form.querySelector('.modal-server-answer');

                data.append('action', 'custom_login');

                fetch(globalVars.ajaxUrl, {
                    method: "POST",
                    credentials: 'same-origin',
                    body: data
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data) {
                            answer.innerText = data.message;

                            if (data.loggedin === true) {
                                setTimeout(() => {
                                    window.location.replace(globalVars.redirectUrl);
                                }, 3000)
                            }
                        }
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            });
        });
    }
}