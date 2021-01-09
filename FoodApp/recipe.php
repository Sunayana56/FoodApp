<?php
	$MealId = $_GET['mealId'];
    $url = "https://www.themealdb.com/api/json/v1/1/lookup.php?i=".$MealId;
    $Meal = file_get_contents($url);
    $Meal = json_decode($Meal);
	//echo $Meal;
	//print_r($Meal);
    //$MealId = $Meal->meals[0]->idMeal;
	$MealName = $Meal->meals[0]->strMeal;
	$MealPic = $Meal->meals[0]->strMealThumb;
    $MealInstruc = $Meal->meals[0]->strInstructions;
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
                        <li><a href="favourites.php">Favourites</a></li>
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
    <section class="single-page-recipe spad">
        <div class="recipe-top">
            <div class="container-fluid">
                <div class="recipe-title">
                    <!-- <span>~ 5 ingredients / 20 minutes / easy / japanese/ recipe</span> -->
                    <h2><?php echo $MealName; ?></h2>
                    <ul class="tags">
                        <?php
                            $MealTags = $Meal->meals[0]->strTags;
                            if($MealTags != null){
                                $str_tags = preg_split ("/\,/", $MealTags); 
                                foreach ($str_tags as $value) {
                                  echo "<li> $value </li>";
                                }
                            }
                            
                              
                        ?>
                        <!-- <li>Desert</li>
                        <li>Asian</li>
                        <li>Spicy</li> -->
                    </ul>
                </div>
                <CENTER><img src="<?php echo $MealPic; ?>" alt=""></CENTER>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="ingredients-item">
                        <div class="intro-item">
                            <img src="<?php echo $MealPic; ?>" alt="">
                            <h2><?php echo $MealName; ?></h2>
                            <!-- <div class="recipe-time">
                                <a href="#" class="black-btn">Save to Favourites</a>
                            </div> -->
                        </div>
                        <div class="ingredient-list">
                            <div class="recipe-btn" id="<?php echo $MealId; ?>">
                                <a href=""><button class="addFav" style="border:none;
                                                            background: none;
                                                            color: inherit;
                                                            border: none;
                                                            padding: 0;
                                                            font: inherit;
                                                            cursor: pointer;
                                                            outline: inherit;">Add to favourites</button></a>

                                <a href="" class="black-btn"><button class="removeFav" style="border:none;
                                                                                background: none;
                                                                                color: inherit;
                                                                                border: none;
                                                                                padding: 0;
                                                                                font: inherit;
                                                                                cursor: pointer;
                                                                                outline: inherit;">Remove from favourites</button></a>
                            </div>
                            <div class="list-item">
                                <h5>Ingredients</h5>
                                <div class="salad-list">
                                    <ul>
                                        <?php
                                            $x=1;
                                            
                                            while($x <= 20) {
                                                $strIng = "strIngredient".$x;
                                                $strIngMeas = "strMeasure".$x;
                                                $Ingredient = $Meal->meals[0]->$strIng;
                                                $Measurement = $Meal->meals[0]->$strIngMeas;
                                                if($Ingredient == "")
                                                    break;
                                        ?>
                                                <li>  <?php echo $Ingredient; ?> &nbsp - &nbsp <?php echo $Measurement; ?></li>
                                        <?php
                                              $x++;
                                            }
                                        ?>
                                        <!-- <li>1 brick of frozen udon</li>
                                        <li>1/2 cup kimchi, plus a bit of kimchi juice</li>
                                        <li>1 tablespoon of butter</li>
                                        <li>1 sac of mentaiko</li>
                                        <li>sliced green onions and nori, to finish</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="recipe-right">
                        <div class="recipe-desc">
                            <h3>Instructions</h3>
                            <p><?php echo $MealInstruc; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single Recipe Section End -->

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
</body>

</html>