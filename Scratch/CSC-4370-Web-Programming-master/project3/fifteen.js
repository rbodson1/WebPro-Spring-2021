var tiles; 
var posY;
var posX;
//variables for storing tiles and positions

 window.onload = function (){
	var board = document.getElementById('board');
	tiles = board.getElementsByTagName('div');
	//set varible for board and fill tiles array

	for (var i=0; i<tiles.length; i++){

		tiles[i].className = 'tile';
		tiles[i].style.left = (i%4*100)+'px'; 
		tiles[i].style.top = (parseInt(i/4)*100) + 'px';
		//calculates tile position from the left and top
		tiles[i].style.backgroundPosition= '-' + tiles[i].style.left + ' ' + '-' + tiles[i].style.top; 
		//makes the image move with the tile

		tiles[i].onmouseover = function(){
			if (checkMove(parseInt(this.innerHTML))){
				this.className = "moveableTile";
			}
		};
		tiles[i].onmouseout = function(){
			this.className = "tile";
		};
		//changes style of tiles when moused over and out

		tiles[i].onclick = function(){
			if (checkMove(parseInt(this.innerHTML))){ //checks if the tile can move
				swap(this.innerHTML-1); //moves the tile into the empty space
				if (finish()){ //checks if the board is finished
					win();
				}
				return;
			}
		};
	}

	posX = '300px'; 
	posY = '300px';

	document.getElementById('shuffleBtn').onclick = function(){
		for (var i=0; i<300; i++){
			var rand = parseInt(Math.random()* 100) %4;
			if (rand == 0){
				var temp = up(posX, posY);
				if ( temp != -1){
					swap(temp);
				}
			}
			if (rand == 1){

				var temp = down(posX, posY);

				if ( temp != -1){
					swap(temp);
				}
			}
			if (rand == 2){
				var temp = left(posX, posY);
				if ( temp != -1){
					swap(temp);
				}
			}
			if (rand == 3){
				var temp = right(posX, posY);
				if (temp != -1){
					swap(temp);
				}
			}
		}
	};
	//When the shuffle button is clicked, a random number between 1 and 4 is generated
	//This number randomly swaps tiles around by calling the swap function repeatedly in different directions
};

function checkMove(position){
	if (left(posX, posY) == (position-1)){
		return true;
	}
	if (down(posX, posY) == (position-1)){
		return true;
	}
	if (up(posX, posY) == (position-1)){
		return true;
	}
	if (right(posX, posY) == (position-1)){
		return true;
	}
}
//returns true if a tile is next to the empty space

function win(){
	document.body.style.background = "url('win.jpg')";
	document.getElementById('rules').className = "winText";
	document.getElementById('rules').innerHTML = "You Win!";
}
//change the page if the user wins

function finish(){
	var flag = true;
	for (var i = 0; i < tiles.length; i++){
		var top = parseInt(tiles[i].style.top);
		var left = parseInt(tiles[i].style.left);
		if (left != (i%4*100) || top != parseInt(i/4)*100){
			flag = false;
			break;
		}
	}
	return flag;
}
//if all tiles match their proper position, the game is finished and this function returns true

function left(x, y){
	var cordX = parseInt(x);
	var cordY = parseInt(y);
	if (cordX > 0){
		for (var i = 0; i < tiles.length; i++){

			if (parseInt(tiles[i].style.left) + 100 == cordX && parseInt(tiles[i].style.top) == cordY){
				return i;
			} 
		}
	}
	else{
		return -1;
	}
}
//determines how far the tile position should change to the left

function right (x, y){
	var cordX = parseInt(x);
	var cordY = parseInt(y);
	if (cordX < 300){
		for (var i =0; i<tiles.length; i++){
			if (parseInt(tiles[i].style.left) - 100 == cordX && parseInt(tiles[i].style.top) == cordY) {
				return i;
			}
		}
	}
	else{
		return -1;
	} 
}
//determines how far the tile position should change to the right

function up(x, y){
	var cordX = parseInt(x);
	var cordY = parseInt(y);
	if (cordY > 0){
		for (var i=0; i<tiles.length; i++){
			if (parseInt(tiles[i].style.top) + 100 == cordY && parseInt(tiles[i].style.left) == cordX) {
				return i;
			}
		} 
	}
	else{
		return -1;
	}
}
//determines how far up the tile position should change

function down (x, y){
	var cordX = parseInt(x);
	var cordY = parseInt(y);
	if (cordY < 300){
		for (var i=0; i<tiles.length; i++){

			if (parseInt(tiles[i].style.top) - 100 == cordY && parseInt(tiles[i].style.left) == cordX) {
				return i;
			}
		}
	}
	else{
		return -1;
	} 
}
//determines how far down the tile position should

function swap (position){
	var temp = tiles[position].style.top;
	tiles[position].style.top = posY;
	posY = temp;
	temp = tiles[position].style.left;
	tiles[position].style.left = posX;
	posX = temp;
}
 //switches the tile at the passed position with the empty space