"use strict";

//real global jQuery
$ = jQuery;

var mode = 0;

var globalDelay = 8000, // easy game
    globalTime = 0; // initialize

var easyGameData = [
        'bed',
        'birthday-cake',
        'camera',
        'credit-card',
        'magic',
        'microphone',
        'space-shuttle',
        'snowflake-o',
        'bed',
        'birthday-cake',
        'camera',
        'credit-card',
        'magic',
        'microphone',
        'space-shuttle',
        'snowflake-o'
    ],

    mediumGameData = [
        'car',
        'birthday-cake',
        'camera',
        'credit-card',
        'magic',
        'microphone',
        'space-shuttle',
        'snowflake-o',
        'wifi',
        'mars',
        'car',
        'birthday-cake',
        'camera',
        'credit-card',
        'magic',
        'microphone',
        'space-shuttle',
        'snowflake-o',
        'wifi',
        'mars'
    ],

    hardGameData = [
        'car',
        'birthday-cake',
        'camera',
        'credit-card',
        'magic',
        'microphone',
        'space-shuttle',
        'snowflake-o',
        'wifi',
        'mars',
        'inr',
        'rebel',
        'car',
        'birthday-cake',
        'camera',
        'credit-card',
        'magic',
        'microphone',
        'space-shuttle',
        'snowflake-o',
        'wifi',
        'mars',
        'inr',
        'rebel'
    ];

var card,
    cards,
    deck,
    moves = 0,
    counter,
    matchedCard;

var openedCards = [];

function randomize(array) {
    var currentIndex = array.length,
        temporaryValue, randomIndex;
    while (currentIndex !== 0) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }
    return array;
}


$("#startGame").on("click", function() {
    startGame();
});

$("#difficultySelector").on("change", function() {
    var val = $("#difficultySelector").val();
    console.log(val)
    if (val !== '') {
        $("#startGame").prop("disabled", false);
        $("#restartGame").prop("disabled", false);
        mode = val;
        console.log(mode);
    }

});

function startGame() {

    setUpTemplate();
    console.log(globalDelay);

    card = $(".card-image");
    cards = Array.from([].slice.call(card));
    deck = $("#card-ul").get(0);
    counter = $(".moves").get(0);
    matchedCard = document.getElementsByClassName("match");

    cards = randomize(cards);

    for (var i = 0; i < cards.length; i++) {
        deck.innerHTML = "";
        [].forEach.call(cards, function(item) {
            deck.appendChild(item);
        });
        cards[i].classList.add("show", "open", "disabled");
        var localcard = cards;
        var iter = i;
        if (mode == 1) {
            setTimeout(function() {
                for (var y = 0; y < localcard.length; y++) {
                    localcard[y].classList.remove("show", "open", "match", "disabled", "hide");
                }
            }, 3000);
        }

        if (mode == 2) {
            setTimeout(function() {
                for (var y = 0; y < localcard.length; y++) {
                    localcard[y].classList.remove("show", "open", "match", "disabled", "hide");
                }
            }, 5000);
        }

        if (mode == 3) {
            setTimeout(function() {
                for (var y = 0; y < localcard.length; y++) {
                    localcard[y].classList.remove("show", "open", "match", "disabled", "hide");
                }
            }, 8000);
        }

    }

    moves = 0;
    counter.innerHTML = moves;

    second = 0;
    minute = 0;
    hour = 0;
    var timer = document.querySelector(".timer");
    timer.innerHTML = "0 mins 0 secs";
    clearInterval(interval);
    for (var i = 0; i < cards.length; i++) {
        card = cards[i];
        card.addEventListener("click", showCard);
        card.addEventListener("click", flipOpen);
        card.addEventListener("click", gameState);
    }
    startTimer();
}


var showCard = function() {
    this.classList.toggle("open");
    this.classList.toggle("show");
    this.classList.toggle("disabled");
};

function flipOpen() {
    openedCards.push(this);
    var len = openedCards.length;
    if (len === 2) {
        moveCounter();
        if (openedCards[0].type === openedCards[1].type) {
            matched();
        } else {
            unmatched();
        }
    }
}

function matched() {
    openedCards[0].classList.add("match", "disabled");
    openedCards[1].classList.add("match", "disabled");
    openedCards[0].classList.remove("show", "open", "no-event");
    openedCards[1].classList.remove("show", "open", "no-event");
    openedCards = [];
}


function unmatched() {
    openedCards[0].classList.add("unmatched");
    openedCards[1].classList.add("unmatched");
    disable();
    setTimeout(function() {
        openedCards[0].classList.remove("show", "open", "no-event", "unmatched");
        openedCards[1].classList.remove("show", "open", "no-event", "unmatched");
        enable();
        openedCards = [];
    }, 1500);
}

function disable() {
    Array.prototype.filter.call(cards, function(card) {
        card.classList.add('disabled');
    });
}

function enable() {
    Array.prototype.filter.call(cards, function(card) {
        card.classList.remove('disabled');
        for (var i = 0; i < matchedCard.length; i++) {
            matchedCard[i].classList.add("disabled");
        }
    });
}

function moveCounter() {
    moves++;
}

function setUpTemplate() {
    var val = $("#difficultySelector").val();
    var templateArray = [];
    switch (val) {
        case "1":
            globalDelay = 8000;
            for (var i = 0; i < easyGameData.length; i++) {
                var template =
                    '<li class="card-image" type="' + easyGameData[i] + '">' +
                    '<i class="fa fa-' + easyGameData[i] + '"></i>' +
                    '</li>';
                templateArray.push(template);
            }
            $("#card-ul").html("");
            $("#card-ul").html(templateArray.join(""));
            break;
        case "2":
            globalDelay = 5000;
            for (var i = 0; i < mediumGameData.length; i++) {
                var template =
                    '<li class="card-image" type="' + mediumGameData[i] + '">' +
                    '<i class="fa fa-' + mediumGameData[i] + '"></i>' +
                    '</li>';
                templateArray.push(template);
            }
            $("#card-ul").html("");
            $("#card-ul").html(templateArray.join(""));
            break;
        case "3":
            globalDelay = 3000;
            for (var i = 0; i < hardGameData.length; i++) {
                var template =
                    '<li class="card-image" type="' + hardGameData[i] + '">' +
                    '<i class="fa fa-' + hardGameData[i] + '"></i>' +
                    '</li>';
                templateArray.push(template);
            }
            $("#card-ul").html("");
            $("#card-ul").html(templateArray.join(""));
            break;
        default:
            break;
    }
}


var second = 0,
    minute = 0,
    hour = 0;

var timer = $(".timer").get(0);

var interval;

function startTimer() {
    var counter = 0;
    interval = setInterval(function() {
        timer.innerHTML = minute + " mins " + second + " secs";
        second++;
        counter++;
        var val = $("#difficultySelector").val();
        switch (val) {
            case "1":
                if (counter >= 120) {
                    alert("Unfortunately you lost the game");
                    startGame();
                }
                break;
            case "2":
                if (counter >= 150) {
                    alert("Unfortunately you lost the game");
                    startGame();
                }
                break;
            case "3":
                if (counter >= 180) {
                    alert("Unfortunately you lost the game");
                    startGame();
                }
                break;
            default:
                break;
        }

        if (second == 60) {
            minute++;
            second = 0;
        }
        if (minute == 60) {
            hour++;
            minute = 0;
        }
    }, 1000);
}

function gameState() {
    var val = $("#difficultySelector").val();
    switch (val) {
        case "1":
            if (matchedCard.length == 16) {
                clearInterval(interval);
                alert("Congratulations you won the game");
            }
            break;

        case "2":
            if (matchedCard.length == 20) {
                clearInterval(interval);
                alert("Congratulations you won the game");
            }
            break;

        case "3":
            if (matchedCard.length == 24) {
                clearInterval(interval);
                alert("Congratulations you won the game");
            }
            break;

        default:
            break;
    }
}