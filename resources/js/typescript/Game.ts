// import Sprite from "./Sprite"
//
// export default class Game {
//     constructor(htmlCanvas) {
//         this.canvas = document.getElementById("game_1");
//         this.context = this.canvas.getContext("2d");
//         this.lastRefreshTime = Date.now();
//         this.sinceLastSpawn = 0;
//         this.sprites = [];
//         this.score = 0;
//         this.spriteData;
//         this.spriteImage;
//         this.flowers = [];
//
//         let game = this;
//
//         this.loadJSON("/games/game_1/flowers", function(data, game){
//             game.spriteData = JSON.parse(data);
//             game.spriteImage = new Image();
//             game.spriteImage.src = game.spriteData.meta.image;
//
//             game.spriteImage.onload = function(){
//                 game.init();
//             }
//         })
//     }
//
//     loadJSON(json, callback) {
//         const xobj = new XMLHttpRequest();
//         xobj.overrideMimeType("application/json");
//         xobj.open('GET', json + '.json', true);
//         const game = this;
//         xobj.onreadystatechange = function () {
//             if (xobj.readyState == 4 && xobj.status == "200") {
//                 callback(xobj.responseText, game);
//             }
//         };
//         xobj.send(null);
//     }
//
//     init() {
//         const sourceSize = this.spriteData.frames[0].sourceSize;
//         this.gridSize = { rows:9, cols:10, width:sourceSize.w, height:sourceSize.h };
//         const topleft = { x:100, y:40 };
//         this.spawnInfo = { count:0, total: 0 }
//         this.flowers = [];
//         for(let row=0; row<this.gridSize.rows; row++){
//             let y = row*this.gridSize.height + topleft.y;
//             this.flowers.push([]);
//             for(let col=0; col<this.gridSize.cols; col++){
//                 let x = col * this.gridSize.width + topleft.x;
//                 const sprite = this.spawn(x,y);
//                 this.flowers[row].push(sprite)
//                 this.spawnInfo.total++;
//             }
//         }
//         this.gridSize.topleft = topleft;
//         const game = this;
//         if ('ontouchstart' in window){
//             this.canvas.addEventListener("touchstart", function(event){ game.tap(event); });
//         }else{
//             this.canvas.addEventListener("mousedown", function(event){ game.tap(event); });
//         }
//         this.state = "spawning";
//         this.refresh();
//     }
//
//     refresh() {
//         const now = Date.now();
//         const dt = (now - this.lastRefreshTime) / 1000.0;
//
//         this.update(dt);
//         this.render();
//
//         this.lastRefreshTime = now;
//
//         const game = this;
//         requestAnimationFrame(function(){ game.refresh(); });
//     }
//
//     update(dt) {
//         let removed;
//         do{
//             removed = false;
//             let i=0;
//             for(let sprite of this.sprites){
//                 if (sprite.kill){
//                     this.sprites.splice(i, 1);
//                     this.clearGrid(sprite);
//                     removed = true;
//                     break;
//                 }
//                 i++;
//             }
//         }while(removed);
//
//         switch(this.state){
//             case "spawning":
//                 if (this.spawnInfo.count == this.spawnInfo.total){
//                     delete this.spawnInfo;
//                     this.state = "ready";
//                 }
//                 break;
//             case "removing":
//                 if (this.removeInfo.count == this.removeInfo.total){
//                     delete this.removeInfo;
//                     this.removeGridGaps();
//                     this.state = "dropping";
//                 }
//                 break;
//             case "dropping":
//                 if (this.dropInfo.count == this.dropInfo.total){
//                     delete this.dropInfo;
//                     this.state = "ready";
//                 }
//                 break;
//         }
//
//         for(let sprite of this.sprites){
//             if (sprite==null) continue;
//             sprite.update(dt);
//         }
//     }
//
//     clearGrid(sprite){
//         for(let row of this.flowers){
//             let col = row.indexOf(sprite);
//             if (col!=-1){
//                 //Found it
//                 row[col]=null;
//                 return true;
//             }
//         }
//         return false;//sprite not found
//     }
//
//     removeGridGaps(){
//         this.dropInfo = { count:0, total: 0};
//
//         for(let col=0; col<this.flowers[0].length; col++){
//             let row;
//             let count;
//             for(row=this.flowers.length-1; row>=0; row--){
//                 if (this.flowers[row][col]==null){
//                     //Find the first non-null cell above and pull it down to this cell
//                     count = 0;
//                     for(let r=row-1; r>=0; r--){
//                         var sprite = this.flowers[r][col];
//                         count++;
//                         if (sprite!=null){
//                             //Swap the array items
//                             [this.flowers[row][col], this.flowers[r][col]] = [this.flowers[r][col], this.flowers[row][col]];
//                             sprite.initDrop(this.gridSize.topleft.y + this.gridSize.height * row);
//                             break;
//                         }
//                     }
//                 }
//             }
//             for(row=this.flowers.length-1; row>=0; row--){
//                 if (this.flowers[row][col]==null){
//                     break;
//                 }
//             }
//             for(let r=row; r>=0; r--){
//                 let x = col*this.gridSize.width + this.gridSize.topleft.x;
//                 let y = this.gridSize.topleft.y - this.gridSize.height * (row - r + 1);
//                 const sprite = this.spawn(x, y);
//                 this.flowers[r][col] = sprite;
//                 sprite.initDrop(this.gridSize.topleft.y + r * this.gridSize.height);
//             }
//         }
//     }
//
//     spawn(x, y){
//         const index = Math.floor(Math.random() * 5);
//         const frameData = this.spriteData.frames[index];
//         const s = new Sprite({
//             game: this,
//             context: this.context,
//             x: x,
//             y: y,
//             index: index,
//             width: frameData.sourceSize.w,
//             height: frameData.sourceSize.h,
//             frameData: frameData,
//             anchor: { x:0.5, y:0.5 },
//             image: this.spriteImage,
//             json: this.spriteData,
//             states: { spawn:{ duration: 0.5 }, static:{ duration:1.5}, die:{ duration:0.8}, drop:{ moveY:450 } }
//         });
//
//         this.sprites.push(s);
//         this.sinceLastSpawn = 0;
//
//         return s;
//     }
//
//     render(){
//         this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
//
//         for(let sprite of this.sprites) sprite.render();
//
//         this.context.fillText("Score: " + this.score, 150, 30);
//     }
//
//     getMousePos(evt) {
//         const rect = this.canvas.getBoundingClientRect();
//         const clientX = evt.targetTouches ? evt.targetTouches[0].pageX : evt.pageX;
//         const clientY = evt.targetTouches ? evt.targetTouches[0].pageY : evt.pageY;
//         return {
//             x: clientX - rect.left,
//             y: clientY - rect.top
//         };
//     }
// }
