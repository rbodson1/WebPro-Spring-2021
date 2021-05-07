var tileValues = [];
var clickedTiles = [];
var clickedTileIds = [];
var flipped = 0;
//declare variables for storing the numbers associated with images, chosen tiles, ids and another variable for number of tiles flipped
Array.prototype.randomize = function(){//function for shuffling the tiles
    var i = this.length;
    var rand;
    var temp;
    //var for iteration, random num and temp value
    while(--i > 0){
        rand = Math.floor(Math.random() * (i+1));//set random integer between 1 and the length of the tiles array
        temp = this[rand];//store the chosen index
        this[rand] = this[i];
        this[i] = temp;
        //store the chosen random index in the current iteration index
    }
}
function newGame(difficulty){
    flipped = 0;
    var output = '';
    tileValues.randomize();
    //initialize tiles flipped and html output variable and randomize the tiles array

    for(var i = 0; i < tileValues.length; i++){
        output += '<div id="tile_'+i+'"><img src=images/'+tileValues[i]+'.jpg></div>';
    }
    document.getElementById('board').innerHTML = output;
    output="";
    //loop through the random tiles array and output the images on the board

    setTimeout(function(){
        for(var i = 0; i < tileValues.length; i++){
            output += '<div id="tile_'+i+'" onclick="flip(this,\''+tileValues[i]+'\')"></div>';//output tile with the flip tile method
        }
        document.getElementById('board').innerHTML = output;
    }, difficulty);
    //delay according to the chosen difficulty and then change the board output to be the flipped image tiles

    setTimeout(function(){
        timer();
    }, difficulty-500);
    //set another delay and start the timer by calling the timer function
}
function flip(tile,value){
    if(tile.innerHTML == "" && clickedTiles.length < 2){//if the clicked tiles is less than 2
        tile.innerHTML = '<img src=images/'+value+'.jpg>';
        if(clickedTiles.length == 0){
            clickedTiles.push(value);
            clickedTileIds.push(tile.id);
        }
        //push to chosen and id's array
        else if(clickedTiles.length == 1){
            clickedTiles.push(value);
            clickedTileIds.push(tile.id);
            //push to chosen and id's array
            if(clickedTiles[0] == clickedTiles[1]){//if the tiles numbers are a match
                flipped += 2;
                clickedTiles = [];
                clickedTileIds = [];
                //increase the tiles flipped count and clear the 2 arrays
                if(flipped == tileValues.length){
                    alert("You Win!");
                    location.reload();
                }//if all tiles have been flipped, display alert and reload the page
            }
            else {
                function flipBack(){
                    var tile1 = document.getElementById(clickedTileIds[0]);
                    var tile2 = document.getElementById(clickedTileIds[1]);
                    tile1.innerHTML = "";
                    tile2.innerHTML = "";
                    clickedTiles = [];
                    clickedTileIds = [];
                }
                //if the tiles are not a match, clear the images and the arrays
                setTimeout(flipBack, 1000);//wait 1 second before flipping the tiles back over
            }
        }
    }
}

function timer(){
    if(document.getElementById("numPics8").checked)
        var time = 120000;
    if(document.getElementById("numPics10").checked)
        var time = 150000;
    if(document.getElementById("numPics12").checked)
        var time = 180000;
    //set time according to number of pictures
    
    var countDownDate = new Date().getTime()+time;
    //set the date to countdown to: current date + set time

    var x = setInterval(function() {//set the timer to x
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        //set current date, minutes, seconds and distance between current date and timer date

        document.getElementById("timer").innerHTML = '<b>'+ minutes + ":" + seconds+'</b>';
        //output the time on the page

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "Out of time!";
            alert("You ran out of time.");
            location.reload();
        }
        //if the timer distance reaches 0 (out of time), stop the timer, change the time on the page, display alert and reload the page.
    }, 1000);
}

function radioCheck(){
    if(document.getElementById("numPics8").checked)
        tileValues = ['1','1','2','2','3','3','4','4','5','5','6','6','7','7','8','8'];
    if(document.getElementById("numPics10").checked)
        tileValues = ['1','1','2','2','3','3','4','4','5','5','6','6','7','7','8','8','9','9','10','10'];
    if(document.getElementById("numPics12").checked)
        tileValues = ['1','1','2','2','3','3','4','4','5','5','6','6','7','7','8','8','9','9','10','10','11','11','12','12'];
}
//function for setting the memory array according to which radio button was pressed