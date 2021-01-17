<?php
require_once('../db_connection.php');
$output = '';
if(isset($_POST["query"])){

  $query ="SELECT * FROM recipe WHERE name LIKE '%".$_POST["query"]."%'";
  $response = mysqli_query($connection,$query);


  $output = '<ul class = "list-unstyled">';

  if(empty($_POST["query"])){
    $output ="";
  }

  elseif(mysqli_num_rows($response)>0){

    while($row = mysqli_fetch_array($response)){

      $output.= '<li><i><font size ="3" color="white"><a href="get_recipe.php?id='.$row["id"].'">'

      .$row["name"].'</i></font></li>';
    }
    echo $output;
  }




  else{

    $output.= '<li> recipe not found</li>';
  }
  $output .= '</ul>';
}



?>
