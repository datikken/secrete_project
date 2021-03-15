import "./bootstrap";

//flowers game
// import Game from './typescript/Game';
//floppy bird game

import {init_floppy} from "./games/floppy";
import {init_platformer} from './games/platformer/index'
import {sticky} from './functions/sticky';
import Navbar from './components/Navbar';

document.addEventListener("DOMContentLoaded", evnt => {
    sticky(document);

    const floppy_game = document.querySelector('.floppy');
    const platformer_game = document.querySelector('.platformer');

    if (floppy_game) init_floppy();
    if (platformer_game) init_platformer();

    new Navbar();
});

let navbar = document.querySelector('.navbar');

document.addEventListener('scroll', () => {
    if (window.pageYOffset >= navbar.offsetHeight) {
        navbar.classList.add('navbar_fixed');
    } else {
        navbar.classList.remove('navbar_fixed');
    }
});



