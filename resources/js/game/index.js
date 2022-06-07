require('../bootstrap');
require('phaser');

import { nivel1 } from "./nivel1.js";
import { nivel3 } from "./nivel3.js";


var config = {
    type: Phaser.AUTO,
    width: 800,
    height: 600,
    parent: 'container',
    physics: {
        default: 'arcade',
        arcade: {
            gravity: { y: 300 },
            debug: false,
            width: 3200,
            height: 600
        }
    },
    scene: [nivel1,nivel3,]
};

let game = new Phaser.Game(config);

    