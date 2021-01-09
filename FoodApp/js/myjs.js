$(document).ready(function() {
	$( ".addFav" ).on("click", function(){
		
		try {
			$(this).attr('disabled', true);
			
			var mealIdToAdd = $(this).closest("div").attr("id");
			
			var myFavouriteMeal=JSON.parse(localStorage.getItem("favMeal"));
			
			if(myFavouriteMeal == null) {
				myFavouriteMeal = [];
			}
			
			if(myFavouriteMeal != null) {
				for ( var j = 0; j < myFavouriteMeal.length; j++) {
					
					if ( mealIdToAdd == myFavouriteMeal[j]) {
						
						alert("This meal is already in your favourites"); 
						myFavouriteMeal = [];
					}
				}
			}
			
			myFavouriteMeal.push(mealIdToAdd);
			
			localStorage.setItem("favMeal", JSON.stringify(myFavouriteMeal));
			
		}
		
		catch (e) {
			if (e==QUOTA_EXCEEDED_ERR) {
				console.log("Error: Local storage limit exceeds");
			}
			
			else {
				console.log("ERROR: Saving to local storge.");
			}
		}
	});
});

$(document).ready(function()  {
	$( ".removeFav" ).on("click", function(){
		
			$(this).attr('disabled', true);
			
			var mealIdToRemove = $(this).closest("div").attr("id");
			
			 myFavouriteMeal=JSON.parse(localStorage.getItem("favMeal"));
			
			
			if(myFavouriteMeal != null) {
				for ( var j = 0; j < myFavouriteMeal.length; j++) {
					
					if ( mealIdToRemove == myFavouriteMeal[j]) {
						
						alert("This Meal has been removed");
						
						delete myFavouriteMeal[j];
						
						localStorage.setItem("favMeal", JSON.stringify(myFavouriteMeal));
						
						myFavouriteMeal[j] = [];
					}
				}
			}
			
			if(myFavouriteMeal == null) {
				alert("You have no favourite items");
			}
		});
	});
