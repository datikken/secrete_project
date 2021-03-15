
import Phaser from 'phaser';

class PreloadScene extends Phaser.Scene {
  constructor() {
    super('PreloadScene');
  }

  preload() {
    this.load.image('sky', 'images/games/floppy/sky.png');
    this.load.spritesheet('bird', 'images/games/floppy/birdSprite.png', {
      frameWidth: 16, frameHeight: 16
    });
    this.load.image('pipe', 'images/games/floppy/pipe.png');
    this.load.image('pause', 'images/games/floppy/pause.png');
    this.load.image('back', 'images/games/floppy/back.png');
  }

  create() {
    this.scene.start('MenuScene');
  }
}

export default PreloadScene;
