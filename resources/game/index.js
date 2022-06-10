import 'phaser';

import nivel1  from "./scenes/nivel1";
import Level1 from './scenes/Level1';
//import nivel3  from "./scenes/nivel3";


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
    scene: [
        Level1
    ]
};

let game = new Phaser.Game(config);

    