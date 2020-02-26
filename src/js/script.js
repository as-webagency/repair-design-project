document.addEventListener('DOMContentLoaded', function (event) {
    
    'use strict';

    // Модальное окно
    const popup = () => {

        const modal = document.querySelector('.modal'),
            modalButton = document.querySelectorAll('[data-toggle=modal]'),
            closeButton = document.querySelector('.modal__close');

        const switchModal = () => {
            modal.classList.toggle('modal--visible');
        };

        modalButton.forEach(elem => {
            elem.addEventListener('click', switchModal);
        });

        closeButton.addEventListener('click', switchModal);

        modal.addEventListener('click', (event) => {
            let target = event.target;

            if (target.closest('.modal')) {
                target.classList.remove('modal--visible');
            } else {
                return;
            }
        });

    };
    popup();

});


