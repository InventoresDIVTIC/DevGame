import Dude from "../sprites/Dude";

export default class Level1 extends Phaser.Scene{
    constructor(){
        super({
            key: 'Level1'
        });
    }

    preload(){
        this.load.image('sky', 'game/assets/forest.png');
        this.load.image('ground', 'game/assets/platform.png');
        this.load.spritesheet('dude', 'game/assets/dude.png', { frameWidth: 32, frameHeight: 48 });
    }

    create(){
        
        this.physics.world.checkCollision.down = false;
        this.crevasse = this.add.zone(600, 3200, 3200, 600);
        this.physics.world.enable(this.crevasse, Phaser.Physics.Arcade.STATIC_BODY);

        this.add.image(400, 300, 'sky').setScrollFactor(0,0);
        this.createPlatform();

        this.dude = new Dude({
            scene: this,
            key: 'dude',
            x: 100,
            y: 500 
        });

        this.cameras.main.setBounds(0, 0, 3200, 600, true, true, true, false);
        this.physics.world.setBounds(0, 0, 3200, 600, true, true, true, false)
        this.cameras.main.startFollow(this.dude);
    }

    update(){
        this.cursors =  this.input.keyboard.createCursorKeys();
        this.dude.update(this.cursors);
        this.physics.add.collider(this.dude, this.platforms);
        
    

    }

    createPlatform(){
        this.platforms = this.physics.add.staticGroup(
            {classType: Phaser.Physics.Arcade.Image,
            defaultKey: 'ground'
        });

        this.platforms.create(400, 595, 'ground').setScale(2).refreshBody();
        this.platforms.create(400, 450, 'ground');
        this.platforms.create(25, 325, 'ground');
        this.platforms.create(750, 300, 'ground');
    }
}