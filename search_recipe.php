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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
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

		<div class="row"><div class="col-md-12"><p>&nbsp</p></div>

  </div>

	<!-- start php code -->

        <?php



        require_once('../db_connection.php');

        $name = "'%" . htmlspecialchars(ucfirst(addslashes($_POST['name'] ))). "%'";
        $category = "'" . ucfirst(addslashes($_POST['category'] )). "'";
        $query_search = "SELECT id, name, author_id, time_added, image_one FROM recipe
                 WHERE name LIKE {$name}";
        $query_category = "SELECT id, name, author_id, time_added,image_one FROM recipe
                WHERE category = {$category}";




        $response_search = @mysqli_query($connection,$query_search);
        $response_category = @mysqli_query($connection,$query_category);

        if(isset($_POST['category_search'])){
            if($response_category ) {
                if(mysqli_num_rows($response_category)< 1){
                    echo "Sorry we could not find a recipe for category {$_POST['category']}.";
                }
                else{

                    ?>
                    <p><font size="5"> <?php echo "Showing results for category ". htmlspecialchars($_POST['category']). ".";?></font></p>
                    <br></br>
                  <table style="width:100%" border="0">
                    <tr>
                      <td align="center"><font size="4">S.No</font></td>
                      <td align="center"><font size="4">Name </font></td>
                      <td align="center"><font size="4">Image Sample</font> </td>
                      <td align="center"><font size="4">Time Added </font></td>
                    </tr>
                    <?php
                    $i=1;
                while ($row = mysqli_fetch_array($response_category)) {

                    ?>

                    <tr>
                      <td align="center"><font size="4"><?php echo $i++; ?></font></td>
                      <td align="center"><font size="4"><a href="get_recipe.php?id=<?php echo urlencode($row['id']); ?>"> <?php echo "{$row['name']}"; ?></a></font></td>
                      <td align="center"><font size="4"><img src="<?php echo $row['image_one']; ?>" height="75px" width="100px"</font></td>
                      <td align="center"><font size="4"><?php echo $row['time_added']; ?></font></td>


                  </tr>



                    <?php
                }
              }
            }

        }

        elseif (isset($_POST['recipe_search'])){

            if($response_search ) {
                if (mysqli_num_rows($response_search) < 1) {
                    echo "Sorry we could not find a recipe for ". htmlspecialchars($_POST['name']). ".";
                }
                else{

                    ?>
                    <p><font size="5"><?php echo "Showing results for names matching ". htmlspecialchars($_POST['name']). ".";?></font></p>
                    <br></br>
                  <table style="width:100%" border="0">
                    <tr>
                      <td align="center"><font size="4">S.No</font></td>
                      <td align="center"><font size="4">Name </font></td>
                      <td align="center"><font size="4">Image Sample</font> </td>
                      <td align="center"><font size="4">Time Added </font></td>
                    </tr>
                    <?php
                    $i=1;
                while ($row = mysqli_fetch_array($response_search)) {

                    ?>

                    <tr>
                      <td align="center"><font size="4"><?php echo $i++; ?></font></td>
                      <td align="center"><font size="4"><a href="get_recipe.php?id=<?php echo urlencode($row['id']); ?>"> <?php echo "{$row['name']}"; ?></a></font></td>
                      <td align="center"><font size="4"><img src="<?php echo $row['image_one']; ?>" height="75px" width="100px"</font></td>
                      <td align="center"><font size="4"><?php echo $row['time_added']; ?></font></td>


                  </tr>



                    <?php
                }
              }
            }




        }
        else
        {
            echo  "Could not issue DB query";
            echo mysqli_errno($connection);

        }

        mysqli_close($connection);


        ?>
    </table>
		<br><br>


	<!-- footer -->
		<div id="footer">
		</div>
	<!-- end container -->
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
</div>

</body>
</html>
