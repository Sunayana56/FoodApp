<?php
	$random = file_get_contents('https://www.themealdb.com/api/json/v1/1/random.php');
	$random = json_decode($random);
	//echo $random;
	//print_r($random);
	$MealName = $random->meals[0]->strMeal;
	$MealPic = $random->meals[0]->strMealThumb;
    $MealInstruc = $random->meals[0]->strInstructions;
	//echo $MealName;
?> 
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food App</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section-other">
        <div class="container-fluid">
            <div class="logo">
                <!-- <a href="./index.html"><img src="img/little-logo.png" alt=""></a> -->
            </div>
            <div class="nav-menu">
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="favourites.php">Favourites</a></li>
                    </ul>
                </nav>
                <!-- <div class="nav-right search-switch">
                    <i class="fa fa-search"></i>
                </div> -->
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Search Section Begin -->
    <CENTER>    
        <div class="hero-search set-bg" data-setbg="img/search-bg.jpg">
            <div class="container">
                <div class="filter-table">
                    <form action="searchRes.php" method="post" class="filter-search">
                        <input type="text" name="search_str" placeholder="Search recipe">
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </CENTER>

    <!-- Hero Search Section End -->

    <!-- Single Recipe Section Begin -->
    <section class="recipe-section spad">
        <div class="container" >
            <div class="row" id="Placeholder2">

                <!-- <div class="col-lg-4 col-sm-6">
                    <div class="recipe-item">
                        <a href="#"><img src="img/recipe/recipe-1.jpg" alt=""></a>
                        <div class="ri-text">
                            <div class="cat-name">Desert</div>
                            <a href="#">
                                <h4>One Pot Weeknight Soup</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recipe-pagination">
                        <a href="#" class="active">01</a>
                        <a href="#">02</a>
                        <a href="#">03</a>
                        <a href="#">04</a>
                        <a href="#">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recipe Section End -->

    <!-- Footer Section Begin -->
    
    <!-- Footer Section End -->
    <!-- Search model -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/myjs.js"></script>
    <script type="text/javascript">
        console.log("Restoring array data from local storage");
        
        myFavouriteProp=JSON.parse(localStorage.getItem("favMeal"));
        
        var output = "<ul>";
        
        if (myFavouriteProp != null) {
                for (j = 0; j < myFavouriteProp.length; j++) {
                    
                    if (myFavouriteProp[j]!=null) {
                        
                        var url = "https://www.themealdb.com/api/json/v1/1/lookup.php?i=" + myFavouriteProp[j];

                        var data = JSON.parse($.getJSON({url , 'async': false}).responseText);
                        
                        var mealName = data.meals[0].strMeal;
                        var mealPic = data.meals[0].strMealThumb;
                        console.log(mealName);
                        console.log(mealPic);
                        output+="<h4><li><a href='recipe.php?mealId="+myFavouriteProp[j]+"'>" + mealName + "</a></li></h4>";
                        output+="<img src='" + mealPic + "' width='400' height='300'>";
                    }
                }
        }
        
        output += "</ul>";
        document.getElementById( "Placeholder2" ).innerHTML = output;
    
    </script>
</body>

</html>