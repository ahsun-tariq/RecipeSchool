<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta property="og:image" content="图片地址" /> <!-- facebook -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Recipe School by Developer's Creed 2018</title>
	<!-- favicon -->
    <link rel="shortcut icon" href="Images/rsbdc_favicon.png"/>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- after bootstrap, as it overrides ; ???? -->
    <link href="recipe_school_demo.css" rel="stylesheet" type="text/css">
    <!-- link to google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">
	<!--jquery script-->
    <script src="js/jquery.autocompleter.js" type="text/javascript"></script>
    <!--get_data_request script-->
    <script>
        $(function () {
            $('.search_window').autocompleter({ source: 'get_data_request.php' });
        });
    </script>
	<!-- Bootstrap Carousel script -->
	<script>
		$(function(){
		$('.carousel').carousel({interval: false;
								 pause: "hover";
								 wrap: true;
								 keyboard: false
		})}

	</script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js does not work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- start container -->
<div class="container">
    <!-- start small logo -->
    <div class="row">
        <div class="col-md-12 container_logo_simple"><a href="recipe_school.php">
                <img src="Images/logo_002.png" class="img-logo hidden-xs" width="960px"></a></div>
    </div>
    <!--search bar -->
    <!--search by name -->
    <div class="container_search">
        <div class="row">
            <div class="col-md-12 container_search">
                <br><font color=#FFFFFF><strong>&nbsp Search by name:</strong></font>
                <form action = "search_recipe.php" method="POST" enctype="application/x-www-form-urlencoded">
                    <b Search a recipe></b>
                    <input type ="text" name="name" class="search_window" id="search" value="Search by name">
                    <input type ="submit" name="recipe_search" class="btn" width="81px" height="36px" value="">
            </div>
        </div>
        <!--search by category -->
        <div class="row">
            <div class="col-md-4 container_search">
                <br><font color=#FFFFFF><strong>&nbsp Search by category:</strong></font>
                <p><select name="category" class="category_bar" >
                        <option value = "appetizer">Appetizers</option>
                        <option value = "burger">Burger</option>
                        <option value = "dessert">Dessert</option>
                        <option value = "pizza">Pizza</option>
                        <option value = "pasta">Pasta</option>
                        <option value = "sandwich">Sandwiches</option>
                        <option value = "rice">Rice</option>
                        <option value = "continental">Continental</option>
                        <option value = "steak">Steaks</option>
                        <option value = "misc">Miscellaneous</option>
                    </select>
                    <input type ="submit" name="category_search" class="btn" width="81px" height="36px" value=""/></p>
            </div>
            </form>
            <!-- Add your Recipe btn -->
            <div class="col-md-8 container_search">
                <div class="add_recipe_btn_margin">
                    <form action = "add_recipe.html" method="POST" enctype="application/x-www-form-urlencoded">
                        <p><input type ="submit" class="add_recipe_btn" name="add_recipe" value=""/></p></form>
                </div></div>
        </div>
        <div id ="ajaxList"></div>
    </div>
    <!--end search bar -->
    <div class="row"><div class="col-md-12"><p>&nbsp</p></div></div>
	<!-- facebook share button -->
    <div class="row">
    		<div class="col-md-4"><p>&nbsp</p></div>
			<div class="col-md-4"><p>&nbsp</p></div>
			<div class="col-md-4">
            <p align="right"><input id="share_button" type="button" class="facebook_btn" value="" /></p>
	<!-- facebook share code-->
    		<script type="text/JavaScript">
				function popupwindow(url, title, w, h) {
            wLeft = window.screenLeft ? window.screenLeft : window.screenX;
            wTop = window.screenTop ? window.screenTop : window.screenY;

            var left = wLeft + (window.innerWidth / 2) - (w / 2);
            var top = wTop + (window.innerHeight / 2) - (h / 2);
            return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        }
        window.onload = function () {
            document.getElementById('share_button').onclick = function(){
                var shareUrl = "http://www.facebook.com/sharer/sharer.php?u=http://playground.eca.ed.ac.uk/~s1780143/get_recipe.php?id=3";
                popupwindow(shareUrl, 'Facebook', 600, 400);
            }
        }
    		</script>
			</div>
	</div>
	<!-- end facebook share button/code-->
	<!--Recipe name here-->
  <?php
  require_once('../db_connection.php');
  $id = $_GET['id'];
  $query = "SELECT * FROM recipe WHERE id = {$id}";
  $response = @mysqli_query($connection,$query);

  if($response) {

      while ($row = mysqli_fetch_array($response)) {

          ?>

	<div class="row">
		<div class="col-md-12">
		<div><img src="Images/recipe_gr.gif"></div><h1><strong><i><?php echo $row['name']; ?></i></strong></h1></div>
	</div>
	<!-- Recipe Image Slide by Bootstrap Carousel -->
<div class="row">
	<div class="col-md-8">
	<div id="carousel-example-generic-gr" class="carousel slide" data-ride="carousel">
  	<!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic-gr" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic-gr" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic-gr" data-slide-to="2"></li>
	<li data-target="#carousel-example-generic-gr" data-slide-to="3"></li>
  </ol>

  	<!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $row['image_four']; ?>" alt="completed">
    </div>
    <div class="item">
      <img src="<?php echo $row['image_one']; ?>" alt="step1">
    </div>
    <div class="item">
      <img src="<?php echo $row['image_two']; ?>" alt="step2">
    </div>
	<div class="item">
      <img src="<?php echo $row['image_three']; ?>" alt="step3">
    </div>
  	</div>
  	<!-- Controls -->
  	<a class="left carousel-control" href="#carousel-example-generic-gr" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  	</a>
  	<a class="right carousel-control" href="#carousel-example-generic-gr" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  	</a>
	</div>
	</div>
	<!--ingredients, etc here-->
	<div class="col-md-4">
		<p><b><mark>Ingredients:</mark></b> <?php echo $row['ingredients']; ?></p>
		<p><b><mark>Category:</mark></b> <?php echo $row['category'];?></p>
		<p><b><mark>Cuisine:</mark></b> <?php echo $row['cuisine'];?></p>
		<p><b><mark>Time required(minutes):</mark></b> <?php echo $row['time'];?></p>
		<p><b><mark>Serves:</mark></b> <?php echo $row['serves']; ?></p>
		<p><b><mark>Time added:</mark></b> <?php echo $row['time_added']; ?></p>
	</div>
  <?php
}
}
else
{
  echo  "Could not issue DB query";
  echo mysqli_errno($connection);

}



?>
</div>
	<!-- break-->
	 <div class="row"><div class="col-md-12"><p>&nbsp</p></div></div>
	<!--steps descriptions-->
  <?php
  $query2 = "SELECT * FROM steps WHERE id = {$id}";
  $response = @mysqli_query($connection,$query2);
  $i =1;
  if($response) {

      while ($row = mysqli_fetch_array($response)) {

          ?>
	<div class="row">
	  <div class="col-md-8">
		<p class="stepp"><ins>Step <?php echo "{$i}: ";?> </ins></p>
		<p><font size="4"><?php echo $row['step']; ?></font></p></div>
	  <div class="col-md-4"><p>&nbsp</p></div>
	</div>

    <?php
    $i++;
    }
    }
    else
    {
    echo  "Could not issue DB query";
    echo mysqli_errno($connection);

    }

    mysqli_close($connection);

    ?>

	<!-- end description-->
	<br><br>
	<!--ankle-->
	<div class="row"><div class="col-md-12"><div><p align="right">&nbsp<img src="Images/ankle.gif"></p></div></div></div>
   <!-- footer -->
    <div id="footer">
    </div>
	<!--end container-->
	</div>
    <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<!-- Ajax code/Javascript code by Lanying -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	// <script src="js/jquery.autocompleter.js" type="text/javascript"></script>
  //   <script>
  //   	$(function () {
	// 	    $('.search_window').autocompleter({ source: 'get_data_request.php' });
	// 	});
    </script>
	<!-- end code by Lanying -->
	<!-- Bootstrap Carousel script -->
	<script>
		$(function(){
		$('.carousel').carousel({interval: false;
								 pause: "hover";
								 wrap: true;
								 keyboard: false
		})}

	</script>
	<!-- end Bootstrap Carousel script -->
  <script>
  $(document).ready(function(){

    document.getElementById("search").value="";

    $('#search').keyup(function(){
      var ele = document.createElement("div");
      ele.setAttribute("id","list");
      par = document.getElementById("ajaxList");
      par.appendChild(ele);
      var query = $(this).val();
      if(query != ''){


        $.ajax({
          url:"ajax_search.php",
          method: "post",
          data: {query:query},
          success:function(data){
              $('#list').fadeIn();
              $('#list').html(data);

          }
        });
      }
      if(document.getElementById("search").value=="")
      $('#list').remove();
    });

  });
  </script>
</body>
</html>
