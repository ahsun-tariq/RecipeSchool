<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript"src="js/jquerry.js"></script>
    <script type="text/javascript"src="js/alphabet.js"></script>

  </head>
  <body>
	<!-- start container -->
	<div class="container">
	<!-- start logo -->
		<div class="row">
			<div class="col-md-12 container_logo"><a href="recipe_school.php">
			<img src="Images/logo_00.png" class="img-logo hidden-xs" width="960px"></a></div>
		</div>
	<!--search bar -->
	<!--search by name -->
		<div class="container_search">
			<div class="row">
				<div class="col-md-12 container_search">
					<a href="DWD_report.pdf"><font><strong>&nbsp Click here to view project report</strong></font></a>
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
						<input type ="submit" name="category_search" class="btn" width="81px" height="36px" value=""/></p></form>
				</div>
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
		<br>
		<!-- main image slide -->
		<div class="main-banner img-responsive" id="main-banner">
		  <div class="imgbanbtn imgbanbtn-prev" id ="imgbanbtn-prev"></div>
		  <div class= "imgban" id="imgban3">
		    <div class = "imgban-box">
		        <h2>Learn to Cook</h2>
		        <p>Browse recipes from all over the world.</p>
		  	</div>
		  </div>
		  <div class= "imgban" id="imgban2">
		    <div class = "imgban-box">
		        <h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Easy peasy Recipes</h2>
		        <p>Browse our lemon squeezy recipe collection</p>
		    </div>
		  </div>
		  <div class= "imgban" id="imgban1">
		    <div class = "imgban-box">
		        <h2>Want to share your brilliant recipes ?</h2>
		        <p>Add recipes to our collection!</p>
		    </div>
		  </div>
		  <div class="imgbanbtn imgbanbtn-next" id ="imgbanbtn-next"></div>
		</div>
	<!-- end main image slide-->
		<br><br>

	<!-- about us -->
		<div class="row">
		<div class="col-md-6">
			<div><img src="Images/recipeschoolbydeveloperscreed.gif"></div>
		<p>&nbsp</p>
		<p><font size="4">Recipe School is a website developed specially for university students, who struggle with cooking skills.
		Browse our recipe database to get food recipes from all over the world. Our motive is to breakdown complex
		recipies into four simple steps and make cooking easy and fun. Also, we are always looking to add new and
		interesting recipes in our database so do not hesitate to add your recipes and share them with your fellow
		students!</font></p>
		</div>
	<!-- end about us -->
	<!--sub image slide1-->
		<div class="col-md-6"><center>
		<div id="slidebox" class="img-responsive">
			<ul id="slider">
				<li><a href ="breadsfriends.html"><img src="Images/img_slide_01.jpg" alt="b_sauce"></a></li>
				<li><a href ="breadsfriends.html"><img src="Images/img_slide_06.jpg" alt="ingredients"></a></li>
				<li><a href ="breadsfriends.html"><img src="Images/img_slide_02.jpg" alt="bfofbread"></a></li>
				<li><a href ="breadsfriends.html"><img src="Images/img_slide_04.jpg" alt="seasonal"></a></li>
			</ul>
		</div>
		<p>&nbsp</p>
		<button onclick="startSlide('prev')">previous</button>
		<button onclick="startSlide('next')">next</button></p></center>
		</div>
	<!-- end sub image slide1 -->
	</div>
	<!--break-->
	<div class="row"><div class="col-md-12"><h5>&nbsp</h5></div></div>
	<!--sub slide2 by bootstrap carousel-->
	<div class="row">
	<div class="col-md-6">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  	<!-- sub slide2 Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  	<!-- sub slide2 Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
		<a href ="nutritionbalance.html"><img src="Images/img_slide_07.jpg"></a>
    </div>
    <div class="item">
		<a href ="nutritionbalance.html"><img src="Images/img_slide_09.jpg"></a>
    </div>
    <div class="item">
		<a href ="nutritionbalance.html"><img src="Images/img_slide_08.jpg"></a>
    </div>
  </div>
  	<!-- sub slide2 Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
	<!--end sub slide2 by bootstrap carousel-->
	<!-- Recently added 10 recipes php code-->
		<div class="col-md-6">
		<p><i><div><p align="right"><img src="Images/recentlyadded.gif" class="img-responsive"></p></div></i></p>
<?php



require_once('../db_connection.php');


$query_search = "SELECT id, name FROM recipe
        ORDER BY id DESC LIMIT 10";





$response= @mysqli_query($connection,$query_search);


    if($response) {

        while ($row = mysqli_fetch_array($response)) {

            ?>
            <li><i><font size="5"><a href="get_recipe.php?id=<?php echo $row['id']; ?>"> <?php echo "{$row['name']}"; ?></a></font></i></li>

            <?php
        }
    }




else
{
    echo  "Could not issue DB query";
    echo mysqli_errno($connection);

}

mysqli_close($connection);


?>
	</div>
	<!-- end recently added 10 recipes php code-->
	</div>
	<!-- Happy cooking java-drawing by Ahsun -->
	<div class="row">
	<div class="col-md-12">
    <canvas id ="myCanvas"></canvas>
    <script type="text/javascript"src="js/bubble.js"></script>
      <script>
        var red =[0,100,63];
        var green = [75,100,40];
        var blue = [107,77,55];
        var yellow = [255,250,12];
        var color = [red, green, blue, yellow];

        var text = "Happy Cooking!";
        drawName(text,color);
        bounceBubbles();
      </script>
	</div>
	</div>
	<!-- end Happy cooking java-drawing by Ahsun -->
		<br><br>
		<!-- break2 -->
		<div class="row"><div class="col-md-12 div_br">
    </div></div>
		<br><br><br>
	<!--ankle-->
		<div class="row"><div class="col-md-12"><div><p align="right">&nbsp<img src="Images/ankle2.gif"></p></div></div></div>
	<!-- footer -->
		<div id="footer">
		</div>
	<!-- end container -->
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<!-- main image slide code by Ahsun-->
    <script>
	  var bannerStatus = 1;
	  var bannerTimer = 4000;
	  window.onload = function(){
	    bannerLoop();
	  }
	  var startBannerLoop = setInterval(function(){
	    bannerLoop();

	  }, bannerTimer);

	  document.getElementById("main-banner").onmouseenter = function(){
	    clearInterval(startBannerLoop);
	  }
	  document.getElementById("main-banner").onmouseleave = function() {
	    startBannerLoop = setInterval(function(){
	      bannerLoop();
	      }, bannerTimer);
	  }

	document.getElementById("imgbanbtn-prev").onclick = function(){
	  if (bannerStatus===1){
	    bannerStatus=2;
	  }
	  else if (bannerStatus===2){
	    bannerStatus=3;
	  }

	  else if (bannerStatus===3){
	    bannerStatus=1;
	  }
	  bannerLoop();
	}

	document.getElementById("imgbanbtn-next").onclick = function(){
	  bannerLoop();
	}
	  function bannerLoop(){
	    if (bannerStatus ===1){
	      document.getElementById("imgban2").style.opacity = "0";
	      setTimeout(function(){
	        document.getElementById("imgban1").style.right = "0px";
	        document.getElementById("imgban1").style.zIndex = "1000";
	        document.getElementById("imgban2").style.right = "-1200px";
	        document.getElementById("imgban2").style.zIndex = "1500";
	        document.getElementById("imgban3").style.right = "1200px";
	        document.getElementById("imgban3").style.zIndex = "500";
	      }, 500);
	      setTimeout(function(){
	      document.getElementById("imgban2").style.opacity = "1";
	    },1000);
	      bannerStatus = 2;
	    }
	  else if (bannerStatus ===2){
	    document.getElementById("imgban3").style.opacity = "0";
	    setTimeout(function(){

	      document.getElementById("imgban2").style.right = "0px";
	      document.getElementById("imgban2").style.zIndex = "1000";
	      document.getElementById("imgban3").style.right = "-1200px";
	      document.getElementById("imgban3").style.zIndex = "1500";
	      document.getElementById("imgban1").style.right = "1200px";
	      document.getElementById("imgban1").style.zIndex = "500";
	    }, 500);

	    setTimeout(function(){
	    document.getElementById("imgban3").style.opacity = "1";
	  },1000);
	    bannerStatus = 3;
	  }
	  else if (bannerStatus ===3){
	    document.getElementById("imgban1").style.opacity = "0";
	    setTimeout(function(){

	      document.getElementById("imgban3").style.right = "0px";
	      document.getElementById("imgban3").style.zIndex = "1000";
	      document.getElementById("imgban1").style.right = "-1200px";
	      document.getElementById("imgban1").style.zIndex = "1500";
	      document.getElementById("imgban2").style.right = "1200px";
	      document.getElementById("imgban2").style.zIndex = "500";
	    }, 500);

	    setTimeout(function(){
	    document.getElementById("imgban1").style.opacity = "1";
	  },1000);
	    bannerStatus = 1;
	  }

	}
	</script>

    <!-- Ajax code by ahsun -->
      <!-- Include all compiled plugins (below), or include individual files as needed -->

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

  	<!-- end code by Ahsun-->


  	<!-- Ajax code by Lanying -->
      <!-- Include all compiled plugins (below), or include individual files as needed -->
  	<!-- <script src="js/jquery.autocompleter.js" type="text/javascript"></script> -->
      <!-- <script>
      	$(function () {
  		    $('.search_window').autocompleter({ source: 'get_data_request.php' });
  		});
      </script> -->
  	<!-- end code by Lanying -->
  	<!-- sub image slide1 code -->
	<!-- sub image slide1 code -->
	  <script>
		var slider = document.getElementById("slider");
		var slideArray = slider.getElementsByTagName("li");
		var slideMax = slideArray.length - 1;
		var curSlideNo = 0;
		var nextSlideNo =null;
		var fadeStart = false;
		var curSlideLevel = 1;
		var nextSlideLevel = 0;

		for (i = 0; i <= slideMax; i++) {
			if (i == curSlideNo) changeOpacity(slideArray[i], 1);
			else changeOpacity(slideArray[i], 0);
		}

		function startSlide(dir)
		{
			if (fadeStart === true) return;
			if( dir == "prev" )
			{
				nextSlideNo = curSlideNo - 1;
				if ( nextSlideNo < 0 ) nextSlideNo = slideMax;
			}
			else if( dir == "next" )
			{
				nextSlideNo = curSlideNo + 1;
				if ( nextSlideNo > slideMax ) nextSlideNo = 0;
			}
			else
			{
				fadeStart = false;
				return;
			}
			fadeStart = true;
			changeOpacity(slideArray[curSlideNo], curSlideLevel);
			changeOpacity(slideArray[nextSlideNo], nextSlideLevel);
			fadeInOutAction(dir);
		}

		function fadeInOutAction(dir)
		{
			curSlideLevel = curSlideLevel - 0.1;
			nextSlideLevel = nextSlideLevel + 0.1;
			if( curSlideLevel <= 0 )
			{
				changeOpacity(slideArray[curSlideNo], 0);
				changeOpacity(slideArray[nextSlideNo], 1);
				if(dir == "prev")
				{
					curSlideNo = curSlideNo - 1;
					if (curSlideNo < 0) curSlideNo = slideMax;
				}
				else
				{
					curSlideNo = curSlideNo + 1;
					if (curSlideNo > slideMax) curSlideNo = 0;
				}
				curSlideLevel = 1;
				nextSlideLevel = 0;
				fadeStart = false;
				return;
			}
			changeOpacity(slideArray[curSlideNo], curSlideLevel);
			changeOpacity(slideArray[nextSlideNo], nextSlideLevel);
			setTimeout(function () {
				fadeInOutAction(dir);
			}, 100);
		}

		function changeOpacity(obj,level)
		{
			obj.style.opacity = level;
			obj.style.MozOpacity = level;
			obj.style.KhtmlOpacity = level;
			obj.style.MsFilter = "'progid:DXImageTransform.Microsoft.Alpha(Opacity=" + (level * 100) + ")'";
			obj.style.filter = "alpha(opacity=" + (level * 100) + ");";
		}
	</script>
	<!-- end sub image slide1 code -->
	<!-- sub image slide2 code -->
	  <script>
		var slider = document.getElementById("slider2");
		var slideArray = slider.getElementsByTagName("li");
		var slideMax = slideArray.length - 1;
		var curSlideNo = 0;
		var nextSlideNo =null;
		var fadeStart = false;
		var curSlideLevel = 1;
		var nextSlideLevel = 0;

		for (i = 0; i <= slideMax; i++) {
			if (i == curSlideNo) changeOpacity(slideArray[i], 1);
			else changeOpacity(slideArray[i], 0);
		}

		function startSlide(dir)
		{
			if (fadeStart === true) return;
			if( dir == "prev" )
			{
				nextSlideNo = curSlideNo - 1;
				if ( nextSlideNo < 0 ) nextSlideNo = slideMax;
			}
			else if( dir == "next" )
			{
				nextSlideNo = curSlideNo + 1;
				if ( nextSlideNo > slideMax ) nextSlideNo = 0;
			}
			else
			{
				fadeStart = false;
				return;
			}
			fadeStart = true;
			changeOpacity(slideArray[curSlideNo], curSlideLevel);
			changeOpacity(slideArray[nextSlideNo], nextSlideLevel);
			fadeInOutAction(dir);
		}

		function fadeInOutAction(dir)
		{
			curSlideLevel = curSlideLevel - 0.1;
			nextSlideLevel = nextSlideLevel + 0.1;
			if( curSlideLevel <= 0 )
			{
				changeOpacity(slideArray[curSlideNo], 0);
				changeOpacity(slideArray[nextSlideNo], 1);
				if(dir == "prev")
				{
					curSlideNo = curSlideNo - 1;
					if (curSlideNo < 0) curSlideNo = slideMax;
				}
				else
				{
					curSlideNo = curSlideNo + 1;
					if (curSlideNo > slideMax) curSlideNo = 0;
				}
				curSlideLevel = 1;
				nextSlideLevel = 0;
				fadeStart = false;
				return;
			}
			changeOpacity(slideArray[curSlideNo], curSlideLevel);
			changeOpacity(slideArray[nextSlideNo], nextSlideLevel);
			setTimeout(function () {
				fadeInOutAction(dir);
			}, 100);
		}

		function changeOpacity(obj,level)
		{
			obj.style.opacity = level;
			obj.style.MozOpacity = level;
			obj.style.KhtmlOpacity = level;
			obj.style.MsFilter = "'progid:DXImageTransform.Microsoft.Alpha(Opacity=" + (level * 100) + ")'";
			obj.style.filter = "alpha(opacity=" + (level * 100) + ");";
		}

	</script>
	<!-- end sub image slide2 code -->


  </body>
</html>
