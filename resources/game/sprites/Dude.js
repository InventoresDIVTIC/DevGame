class Dude extends Phaser.GameObjects.Sprite{
    constructor(config){ 
        super(config.scene, config.x, config.y, 'dude');
        config.scene.physics.world.enable(this);
        config.scene.add.existing(this);
        this.body.maxVelocity.x = 160;        
        this.body.maxVelocity.y = 200;        
    }

    jumpCount = 0;

    update(cursors){
        this.cursors = cursors;
        this.createPlayer();
        this.createCursor();
    }

    createPlayer(){
        this.body.setBounce(0.2);
        this.body.setCollideWorldBounds(true);

        this.anims.create({
            key:'left',
            frames: this.anims.generateFrameNumbers('dude', {start: 0, end: 3}),
            frameRate: 10,
            repeat: -1
        });

        this.anims.create({
            key: 'turn',
            frames: [ { key: 'dude', frame: 4 } ],
            frameRate: 20
        });

        this.anims.create({
            key:'right',
            frames: this.anims.generateFrameNumbers('dude', {start: 5, end: 8}),
            frameRate: 10,
            repeat: -1
        });
    }

    createCursor(){
        if(this.cursors.left.isDown){  
            this.run(-this.body.maxVelocity.x);
            this.anims.play('left', true);
        }else if(this.cursors.right.isDown){
            this.run(this.body.maxVelocity.x);
            this.anims.play('right', true);
        }else{
            this.run(0);
            this.anims.play('turn', true);
        }


         //Doble Salto 
         const isJumpJustDown = Phaser.Input.Keyboard.JustDown(this.cursors.up);
         const isTounchingGround = this.body.touching.down ;
 
         if(isJumpJustDown && ( isTounchingGround || this.jumpCount < 2)){
             this.jumpCount++;
             this.body.setVelocityY(-this.body.maxVelocity.y);
         }
 
         if(isTounchingGround && !isJumpJustDown){
             this.jumpCount = 0;
         }

    }

    run(vel){
        this.body.setVelocityX(vel);
    }
}

export default Dude;
