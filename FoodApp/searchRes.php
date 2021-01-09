<?php
    $search_str = $_POST['search_str'];
    $url = "https://www.themealdb.com/api/json/v1/1/search.php?s=".$search_str;
    $searchResults = file_get_contents($url);
    $searchResults = json_decode($searchResults);
    //echo $random;
    //print_r($searchResults);
    
    $Meals = $searchResults->meals;
    $count = sizeof($Meals);
    $MealName = $searchResults->meals[0]->strMeal;
    $MealPic = $searchResults->meals[0]->strMealThumb;
    $MealCat = $searchResults->meals[0]->strCategory;
    $MealInstruc = $searchResults->meals[0]->strInstructions;

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
    <link href="https://fonts.googleapis.co m/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">

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
    <!-- Hero Search Section End -->
    <section class="top-recipe spad">
        <div class="section-title">
                <h5>Results related to '<?php echo $search_str; ?>'</h5>
        </div>
        <div class="container po-relative">
            <div class="row">
                <?php 
                    for($x=0; $x<$count; $x++){                   
                ?>
                
                <div class="col-lg-12">
                    <div class="top-recipe-item">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="top-recipe-img set-bg" data-setbg="<?php echo $Meals[$x]->strMealThumb; ?>">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="top-recipe-text">
                                    <div class="cat-name"><?php echo $Meals[$x]->strCategory; ?></div>
                                    <a href="recipe.php?mealId=<?php echo $Meals[$x]->idMeal; ?>">
                                        <h4><?php echo $Meals[$x]->strMeal; ?></h4>
                                    </a>
                                    <!-- <p><?php 
                                    // echo $MealInstruc; ?></p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>

    </section>
   
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
</body>

</html>