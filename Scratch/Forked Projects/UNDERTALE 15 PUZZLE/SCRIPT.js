
//Nicholas Yesu Web Programming 2019 Fifteen Puzzle
//November 30th



//this is a short function to add a timer to the page that will count down from 2:00 or whatever i want it to count from..
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
            alert("You're out of time! If you'd like to play again close this window.");
        }
    }, 1000);
}

window.onload = function () {
  //multiply 60 by however many minutes you want this to count from and it will
    var fiveMinutes = 60 * 2,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};


              
 document.onreadystatechange = function () {
            if (document.readyState == "complete") {
              //this is the grid creation. the parameters inside the array are used as "semi" coordinates so the pieces can
              //fall into play for EX: "0,0" is the top left corner. and true/false is signifying if it is a clear space (column,row,clear?)
              var GAME_GRID =  [[0,0,false],[100,0,false],[200,0,false],[300,0,false],
                           [0,100,false],[100,100,false],[200,100,false],[300,100,false],
                           [0,200,false],[100,200,false],[200,200,false],[300,200,false],
                           [0,300,false],[100,300,false],[200,300,false],[300,300,true]];


              function scramblePieces() {
                // This will incrementally increase the moves as the user continues through the game
                MOVES = MOVES + 1;
                document.getElementById("MOVES").innerHTML = MOVES; 

              
                this.style.left = GAME_GRID[clearArea()][0]+"px";
                this.style.top = GAME_GRID[clearArea()][1]+"px";
                
                this.className = "PIECE_PUZZLE";

                // we need to take the collection (html) and convert them to a array
                var array_collec = Array.prototype.slice.call( CONTENTS_PUZZLE )
                var move_ClearSpace = array_collec.indexOf(this)
                var clearspace_Position = array_collec.indexOf(CONTENTS_PUZZLE[clearArea()])
                
                var changeVar = array_collec[move_ClearSpace];
                array_collec[move_ClearSpace] = array_collec[clearspace_Position];
                array_collec[clearspace_Position] = changeVar;

                document.getElementById("PUZZLE").innerHTML = ""
                for (i = 0; i < array_collec.length; i++) {
                  document.getElementById("PUZZLE").innerHTML = document.getElementById("PUZZLE").innerHTML + array_collec[i].outerHTML;
                }

                // this sets the current piece unit to false in reference to the movement of the blanks
                GAME_GRID[clearArea()][2] = false;


                // set touched piece unit to true, in reference to the movement of the blanks
                GAME_GRID[move_ClearSpace][2] = true;
                
                // This operation is seperating and removing the old event listeners from the tiles who can 
                //no longer move if there is no clear space around
                removeListener(Moving_Elements());

                //if the movement is complete then return true
                if (MoveComplete() == true) {
                  return
                } 

                //piecesPuz's are just "Pieces of the Puzzle" Shortened
                // this call will be using the new Listener function to add new listeners to new set of piecesPuz that are switched with the old ones
                newListener(Moving_Elements());
              }



              //creation of necessary variables so that we can control the input/output for our functions
              var CONTENTS_PUZZLE = document.getElementById("PUZZLE").children;
              var TRACK_SCAMBLE = 0;
              var MOVES = 0;


              //this is the function that actually allows us to move the pieces on the board, and also checks to make sure movement is allowed in
              //the first place.
              function Moving_Elements() {
                var clear = clearArea()
                var piecesPuz = [clear-4, clear-1, clear+1, clear+4]
                // purge out of bounds indexes
                var counter = piecesPuz.length;
                for (i = 0; i < counter; i++) {
                  // checks to see if the movement is available based on the position it's headed. (down)
                  if (piecesPuz[i] < 0) {piecesPuz[i] = null}            
                  // checks to see if the movement is available based on the position it's headed. (up)
                  if (piecesPuz[i] > 15) {piecesPuz[i] = null}
                  // checks to see if the movement is available based on the position it's headed. (right)
                  if (clear == 3 || clear == 7 || clear == 11 ) { 
                    piecesPuz[piecesPuz.indexOf(clear+1)] = null }
                  // checks to see if the movement is available based on the position it's headed. (left)
                  if (clear == 4 || clear == 8 || clear == 12 ) { 
                    piecesPuz[piecesPuz.indexOf(clear-1)] = null }
                }
                piecesPuz = piecesPuz.filter(function(val) { 

                  return val !== null; 

                })
                return piecesPuz;
              }


              //each user move to completion/ moving into the clear area
              function MoveComplete() {
                var checkPlace = ""
                var child_array = document.getElementById("PUZZLE").children;
                for (i = 0; i < child_array.length; i++) {
                  checkPlace = checkPlace + child_array[i].innerHTML 
                };
                //checks to see if puzzle is complete!
                
              }




              //this is the method that will give an Event Listener to the puzzle pieces able to move around a clear space
              function newListener(piecesPuz) {
                for (i = 0; i < piecesPuz.length; i++) {
                  CONTENTS_PUZZLE[piecesPuz[i]].addEventListener("mouseover", Add_Piece, false);
                  CONTENTS_PUZZLE[piecesPuz[i]].addEventListener("mouseout", Remove_Piece, false);
                  CONTENTS_PUZZLE[piecesPuz[i]].addEventListener("click", scramblePieces);
                }
              }



                // this method does the oppisite of the newListener and remove the event listener from the old moveable pieces
              function removeListener(piecesPuz) {
                for (i = 0; i < piecesPuz.length; i++) {
                  CONTENTS_PUZZLE[piecesPuz[i]].removeEventListener("mouseover", Add_Piece, false);
                  CONTENTS_PUZZLE[piecesPuz[i]].removeEventListener("mouseout", Remove_Piece, false);
                  CONTENTS_PUZZLE[piecesPuz[i]].removeEventListener("click", scramblePieces, false);
                }
              }




//one of the most important methods. this method scrambles the puzzle board so that the user can solve the puzzle
//also is a recursive method which will scramble it many times so it's low possibility you will get an identical match
 function SCRAMBLE_FUNC(TRACK_SCAMBLE) {
                var random = getRandom();
                scramblePieces.call(CONTENTS_PUZZLE[random]);
                if (TRACK_SCAMBLE < 199) 
                  { 
                    TRACK_SCAMBLE = TRACK_SCAMBLE + 1;
                    // recusively SCRAMBLE_FUNC 99 times 
                    SCRAMBLE_FUNC(TRACK_SCAMBLE) 
                  }
                  else {
                    // reset
                    TRACK_SCAMBLE = 0;
                    MOVES = 0; 
                    document.getElementById("MOVES").innerHTML = MOVES;          
                  }
              }

                //configuring the actual puzzle itself
              function Call_Puzzle() {
                // setting the variables we'll be using to create the foundation of puzzle itself
                var x = 0;
                var y = 0;
                for (i = 0; i < CONTENTS_PUZZLE.length; i++) {
                  CONTENTS_PUZZLE[i].setAttribute("class", "PIECE_PUZZLE");
                  

                  // we're taking style input here to dictate size later
                  CONTENTS_PUZZLE[i].style.top = y+"px" ;
                  CONTENTS_PUZZLE[i].style.left = x+"px" ;
                  //setting the background (image) which needs to be inverted
                  CONTENTS_PUZZLE[i].style.backgroundPosition = "-"+x+"px "+"-"+y+"px" ;
                
                  //after the rest is complete here we make the rows and columns increment the x by 100 and the y
                  //we saw this in the initial grid which is why i made the grid that way) these are creating coordinates
                  if (x==300)
                  {var y = y + 100; 
                   var x = 0; }
                  else{var x = x + 100;}
                }



                //this is adding a clear/empty space at the end of the collection we made before. once we scramble this will move around too
                //technically this is just a extra element thats invisible
                document.getElementById("PUZZLE").innerHTML = document.getElementById("PUZZLE").innerHTML + "<div class='empty'></div>"
                newListener(Moving_Elements());
              }

              //these four functions are giving functionality to the puzzle pieces 
              //Add_Pieces & Remove_Pieces is using this keyword to call the intended keyword
              function Add_Piece() {
                this.className = this.className;
              }
              function Remove_Piece() {this.className = "PIECE_PUZZLE";
              }
              function getRandom() {
                var piecesPuz = Moving_Elements();
                return piecesPuz[Math.floor(Math.random() * piecesPuz.length)];
              }

              function clearArea() {
               //looks for clear area
                for (i = 0; i < GAME_GRID.length; i++) {
                  if (GAME_GRID[i][2] == true){return i;}
                }
              }
            document.getElementById("shuffle_Button").onclick = function(){

              SCRAMBLE_FUNC(TRACK_SCAMBLE);

              }


       
              document.getElementById("CANVAS").insertAdjacentHTML('beforeend', "number of moves: <span id='MOVES'>0</span>");



            Call_Puzzle();

  }
}






