class ShowMoreShowLess {

	constructor(elementClass, btn, btnTextMore, btnTextLess, startIndex, nbElementsToShow)
	{
		let nbOfElement		= nbElementsToShow;
		let elementLength 	= $(elementClass).length;
		let index 			= startIndex;
		let button			= btn;

		$(elementClass).hide();
		$(elementClass+':lt('+index+')').show();
		$(button).html(btnTextMore);

		if (index == elementLength){
			$(button).hide();
		}

		$(button).click(function () {
	    	let type = $(this).attr('data-type');

	    	if (type == '+'){
	    		index = (index + nbOfElement <= elementLength) ? index + nbOfElement : elementLength;
	        	$(elementClass+':lt('+index+')').show();
	        	if(index == elementLength){
	        		$(button).attr('data-type', '-');
	        		$(button).html(btnTextLess);
	        		index = startIndex;
	        	}
	    	} else {
	        	$(elementClass).not(':lt('+startIndex+')').hide();
	        	$(button).attr('data-type', '+');
	        	$(button).html(btnTextMore);
	    	}
	    });
	}
}
