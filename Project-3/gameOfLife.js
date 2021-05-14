/* 
 To understand how the game work and how to implement certain features, we followed these references:
 * https://javascript.plainenglish.io/the-game-of-life-using-javascript-fc1aaec8274f 
 * https://spicyyoghurt.com/tutorials/javascript/conways-game-of-life-canvas
 * https://www.youtube.com/watch?v=deXzu0Eregs
*/

var gridSize = 10;
var generation = 0;
var moving = false;

function initGrid() {
    var displaySize = document.getElementById('grid');
    var grid = getGrid();
    displaySize.appendChild(grid);
    updateGeneration(0);
}

function start() {
    if (!moving) {
        moving = true;
        generationCount(1);
        setTimeout(ticks, 200);
    }
}

function stop() {
    moving = false;
}

function changeGridSize(selectSize) {
    if (moving) {
        reset();
    }

    var num = parseInt(selectSize.value);
    gridSize = num;
    cleanGameElem();
    var grid = getGrid();
    var displaySize = document.getElementById('grid');
    displaySize.appendChild(grid);
    updateGeneration(0);
}

function cleanGameElem() {
    var displaySize = document.getElementById('grid');
    while (displaySize.hasChildNodes()) {
        displaySize.removeChild(displaySize.lastChild);
    }
}

function ticks() {
    if (moving) {
        generationCount(1);
        setTimeout(ticks, 200);
    }
}

function pattern() {
    if (!moving) {
        moving = true;
        generationCount();
    }
}

function oscillators() {
    moving = true;
    generation = 0;
    setTimeout(ticks, 200);
}



function gridColumns(name) {
    var gridColAttr = document.createElement('td');
    gridColAttr.setAttribute('id', name);
    gridColAttr.setAttribute('onclick', 'changeCellState(this)')
    gridColAttr.style.height = (500 / gridSize) + 'px';
    gridColAttr.style.width = (500 / gridSize) + 'px';
    return gridColAttr;
}

function gridRows(name) {
    var gridRowAttr = document.createElement('tr');
    gridRowAttr.setAttribute('id', name);
    return gridRowAttr;
}

function getGrid() {
    var grid = document.createElement('grid');
    grid.setAttribute('id', 'game_grid');
    for (var i = 0; i < gridSize; i++) {
        var rowName = 'tr_' + i;
        var tr = gridRows(rowName);
        for (var j = 0; j < gridSize; j++) {
            var tdName = 'td_' + i + '_' + j;
            var td = gridColumns(tdName);
            tr.appendChild(td);
        }
        grid.appendChild(tr);
    }
    return grid;
}

function changeCellState(td) {
    var background = td.style.background;
    if (background === 'black') {
        td.style.background = 'white';
    } else {
        td.style.background = 'black';
    }
    updateGeneration(calculatePopulation(document.getElementsByTagName('td')));
}

function topLeftCell(row, column, cellState) {
    if (row - 1 > -1) {
        if (column - 1 > -1) {
            return cellState[row - 1][column - 1];
        }
    }
    return 0;
}

function topCell(row, column, cellState) {
    if (row - 1 > -1) {
        return cellState[row - 1][column];
    }
    return 0;
}

function topRightCell(row, column, cellState) {
    if (row - 1 > -1) {
        if (column + 1 < gridSize) {
            return cellState[row - 1][column + 1];
        }
    }
    return 0;
}

function sideRightCell(row, column, cellState) {
    if (column + 1 < gridSize) {
        return cellState[row][column + 1];
    }
    return 0;
}

function bottomRightCell(row, column, cellState) {
    if (row + 1 < gridSize) {
        if (column + 1 < gridSize) {
            return cellState[row + 1][column + 1];
        }
    }
    return 0;
}

function bottomCell(row, column, cellState) {
    if (row + 1 < gridSize) {
        return cellState[row + 1][column];
    }
    return 0;
}

function bottomLeftCell(row, column, cellState) {
    if (row + 1 < gridSize) {
        if (column - 1 > -1) {
            return cellState[row + 1][column - 1];
        }
    }
    return 0;
}

function sideLeftCell(row, column, cellState) {
    if (column - 1 > -1) {
        return cellState[row][column - 1];
    }
    return 0;
}

function checkNeighbors(row, column, cellState) {
    var count = 0;
    count += topLeftCell(row, column, cellState);
    count += topCell(row, column, cellState);
    count += topRightCell(row, column, cellState);
    count += sideRightCell(row, column, cellState);
    count += bottomRightCell(row, column, cellState);
    count += bottomCell(row, column, cellState);
    count += bottomLeftCell(row, column, cellState);
    count += sideLeftCell(row, column, cellState);
    return count;
}

function generationCount(skipCount) {
    var cellState = new Array(gridSize);
    for (var i = 0; i < gridSize; i++) {
        cellState[i] = new Array(gridSize);
        for (var j = 0; j < gridSize; j++) {
            cellState[i][j] = 0;
        }
    }

    var cellList = document.getElementsByTagName('td');
    for (var i = 0; i < cellList.length; i++) {
        var td = cellList[i];
        var id = td.getAttribute('id');
        var idSplit = id.split('_');
        var row = parseInt(idSplit[1]);
        var column = parseInt(idSplit[2]);

        var background = td.style.background;
        if (background === 'black') {
            cellState[row][column] = 1;
        }
    }

    for (var i = 0; i < cellList.length; i++) {
        var td = cellList[i];
        var id = td.getAttribute('id');
        var idSplit = id.split('_');
        var row = parseInt(idSplit[1]);
        var column = parseInt(idSplit[2]);

        var neighborCount = checkNeighbors(row, column, cellState);
        var background = td.style.background;
        if (background == 'black' && neighborCount < 2) {
            td.style.background = 'white';
        } else if (background == 'black' && neighborCount > 3) {
            td.style.background = 'white';
        } else if (background != 'black' && neighborCount == 3) {
            td.style.background = 'black';
        }
    }

    generation++;
    skipCount--;
    if (skipCount > 0) {
        generationCount(skipCount);
    } else {
        var numLive = calculatePopulation(cellList);
        if (numLive == 0 & moving)
            moving = false;
        updateGeneration(numLive);
    }
}

function reset() {
    moving = false;
    var cellList = document.getElementsByTagName('td');
    for (var i = 0; i < cellList.length; i++) {
        var td = cellList[i];
        td.style.background = 'white';
    }
    generation = 0;
    updateGeneration(0);
}

function calculatePopulation(cellList) {
    var liveCount = 0;
    for (var i = 0; i < cellList.length; i++) {
        var td = cellList[i];
        var background = td.style.background;
        if (background === 'black')
            liveCount++;
    }
    return liveCount;
}

function updateGeneration(count) {
    var gen = document.getElementById('generationDisplay');
    gen.innerHTML = "Generation: " + generation;
}

function logout() {
    reset();
    location.replace("index.html")
}