$(document).ready(()=>{

	const cards = [
		'<img src="images/monsters-01.png" />',
		'<img src="images/monsters-02.png" />',
		'<img src="images/monsters-03.png" />',
		'<img src="images/monsters-04.png" />',
		'<img src="images/monsters-05.png" />',
		'<img src="images/monsters-06.png" />',
		'<img src="images/monsters-07.png" />',
		'<img src="images/monsters-08.png" />',
		'<img src="images/monsters-09.png" />',
		'<img src="images/monsters-11.png" />',
		'<img src="images/monsters-13.png" />',
		'<img src="images/monsters-14.png" />',
		'<img src="images/monsters-15.png" />',
		'<img src="images/monsters-16.png" />',
	];

	var gridSize = 4;
	var cardsToUse = [];

	$('button').click(function(){
		gridSize = $(this).attr("diff"); // We made this attribute up just for this purpose.

		cards.map((card, index)=>{
			cardsToUse.push(card, card); // So we have 2 of each card.
		})

		var memoryHTML = "";
		for(let i = 0; i < gridSize; i++){
			memoryHTML += `<div class="card col-sm-3">`;
				memoryHTML += `<div class="card-holder">`; // Indent for our own purposes.
					memoryHTML += `<div class="card-front">${cardsToUse[i]}</div>`;
					memoryHTML += `<div class="card-back"></div>`;
				memoryHTML += `</div>`;
			memoryHTML += `</div>`;
		}
		$('.mg-stuff').html(memoryHTML);

		$('.card-holder').click(function(){
			$(this).addClass('flip');
			// A card just flipped over.
			// Is there another one turned over already?
			// - If not, do nothing.
			// - If so, check and see if they match.

			var cardsUp = $('.flip');
			if(cardsUp.length === 2){
				// 2 cards up. Check. The only way the length can be 2 is if 2 elements have a class of 'flip'.
				var card1 = cardsUp[0];
				var card2 = cardsUp[1];
				if(card1.innerHTML === card2.innerHTML){
					// MATCH!
					cardsUp.addClass('matched');
					cardsUp.removeClass('flip');
				}else{
					// not a match
					cardsUp.removeClass('flip');
					cardsUp.addClass('temp-flip'); // in case someone clicks quickly, let's replace 'flip' with 'temp-flip'
					setTimeout(()=>{
						cardsUp.removeClass('temp-flip');
					}, 1500);
				}
			}else{
				// 1 card up. Do nothing.
			}

		});

	});

	





});