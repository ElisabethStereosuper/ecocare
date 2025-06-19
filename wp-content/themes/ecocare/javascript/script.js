/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

import AOS from 'aos';


const burger = document.getElementById('burger');
const menu = document.getElementById('menu');
//const counters = e.detail.querySelector('.counter');


const animate = counter => {
    const value = +counter.dataset.count,
      data = +counter.innerText,
      time = value / 1000;
    if (data < value) {
        counter.innerText = Math.ceil(data + time);
        setTimeout(() => animate(counter), 1);
    } else {
        counter.innerText = value + '+';
    }
};

const loadHandler = () => {
    AOS.init({
        duration: 450,
        easing: 'ease-in-out',
        delay: 100,
        //disable: 'mobile',
        once: true,
        offset: 0
    });

    burger.addEventListener('click', toggleMenu);
    
    document.addEventListener('aos:in:counter', e => {
        let counter = e.detail.querySelector('.counter');
        if( counter ) animate(counter);
    });
}

const toggleMenu = () => {
    menu.classList.toggle('hidden');
}

document.readyState === 'complete' ? loadHandler() : window.addEventListener('load', loadHandler);