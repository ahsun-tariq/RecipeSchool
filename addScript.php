<?php
require_once('../db_connection.php');


// echo "\n";
// print_r($_POST);
// echo "\n";


$missing_data = array();
$steps = array();

if(empty($_POST['name'])){
    $missing_data[] = 'name';
}
else{
    $r_name = trim($_POST['name']);
    $r_name = htmlspecialchars(addslashes(ucfirst($r_name)));
}

if(empty($_POST['category'])){
     $missing_data[] = 'category';
}
else {
    $category = ucfirst($_POST['category']);
 }

if(empty($_POST['cuisine'])){
    $missing_data[] = 'cuisine';
}
else {
    $cuisine = ucfirst($_POST['cuisine']);
}

if(empty($_POST['ingredients'])){
    $missing_data[] = 'ingredients';
}
else{
    $ingredients = trim($_POST['ingredients']);
    $ingredients = htmlspecialchars(addslashes(ucfirst($ingredients)));
}

if(empty($_POST['time'])){
    $missing_data[] = 'Time';
}
else{
    $time= trim($_POST['time']);
    $time = htmlspecialchars(addslashes(ucfirst($time)));
}

if(empty($_POST['serves'])){
    $missing_data[] = 'Serves';
}
else{
    $serves= trim($_POST['serves']);
    $serves = htmlspecialchars(addslashes(ucfirst($serves)));
}
// echo "\n";
// echo $r_name;
// echo "\n";
// echo $category;
// echo "\n";
// echo $cuisine;
// echo "\n";
// echo $ingredients;
// echo "\n";
// echo $time;
// echo "\n";
// echo $serves;
// echo "\n";
$imageID= uniqid();
// echo "\n$imageID\n";
if(empty($_FILES['image_one'])){
    // echo "\n Warning image one not found";
    $missing_data[]='Image One';

}
else {
  // echo"image one found";
$image_one="Images/";
$image_one =addslashes($image_one.$imageID.basename($_FILES['image_one']['name']));
$imageID=uniqid();
move_uploaded_file($_FILES['image_one']['tmp_name'],$image_one);
}

if(empty($_FILES['image_two'])){
    // echo "\nWarning image two not found";
    $missing_data[]='Image Two';
}
else {
  // echo"image two found";
$image_two="Images/";
$image_two =addslashes($image_two.$imageID.basename($_FILES['image_two']['name']));
$imageID=uniqID();
move_uploaded_file($_FILES['image_two']['tmp_name'],$image_two);
}

if(empty($_FILES['image_three'])){
    // echo "\nWarning image three not found";
    $missing_data[]='Image Three';
}
else {
  // echo"image three found";
$image_three="Images/";
$image_three =addslashes($image_three.$imageID.basename($_FILES['image_three']['name']));
$imageID=uniqID();
move_uploaded_file($_FILES['image_three']['tmp_name'],$image_three);
}

if(empty($_FILES['image_four'])){
    // echo "\nWarning image four not found";
    $missing_data[]='Image Four';
}
else {
  // echo"image four found";
$image_four="Images/";
$image_four =addslashes($image_four.$imageID.basename($_FILES['image_four']['name']));
$imageID=uniqID();
move_uploaded_file($_FILES['image_four']['tmp_name'],$image_four);
}

for($i=1;$i<51;$i++){
  $step = "step".$i;
  if(isset($_POST[$step])){
    if(empty($_POST[$step])){
      $missing_data[] = "{$step}";
    }
    else{
      $steps[]= htmlspecialchars(addslashes(ucfirst(trim($_POST[$step]))));

    }

  }

}

    if(empty($missing_data)){
        // print_r($steps);
        $query1 = "INSERT INTO recipe (name, category, cuisine, ingredients, time, serves, time_added, image_one, image_two, image_three, image_four)
                  VALUES (?,?,?,?,?,?,NOW(),?,?,?,?)";

        $statement1 = mysqli_prepare($connection,$query1);
        mysqli_stmt_bind_param($statement1,"ssssssssss", $r_name,$category,
            $cuisine,$ingredients,$time,$serves,$image_one,
            $image_two,$image_three,$image_four);

        mysqli_stmt_execute($statement1);
        $rows_changed1 = mysqli_stmt_affected_rows($statement1);

        $id = mysqli_insert_id($connection);
        // echo "\n id is: ";
        // echo $id;
        //

        $query2 = "INSERT INTO steps (step, id) VALUES (?, ?)";

        // $rows_changed = mysqli_stmt_affected_rows($statement);

        $statement2 = mysqli_prepare($connection,$query2);

        // print_r($steps);




        foreach ($steps as $key => $value) {
            // echo "\nid is {$id}";
            // echo "\n{$key} => {$value} ";

            if(!empty($value)){
            mysqli_stmt_bind_param($statement2,"si", $value,
                $id);

            mysqli_stmt_execute($statement2);
            $rows_changed2= mysqli_stmt_affected_rows($statement2);
            // echo "\nrow2 is now".  $rows_changed2;
            if($rows_changed2<1){
              break;

            }
          }

        }



        if(($rows_changed1>0) && ($rows_changed2>0)){

            echo "\nRecipe added succesfully\n";


            mysqli_stmt_close($statement1);
            mysqli_stmt_close($statement2);
            mysqli_close($connection);


        }

        else{

            echo "\nThere was an error adding the recipe. Please recheck the form and try again.\n";
            echo mysqli_error($connection);
            // echo "\nrows1: ". $rows_changed1;
            // echo "\nrows2: ". $rows_changed2;
            if(($rows_changed1>0)&&($rows_changed2<1)){
              $query_delete = "DELETE FROM recipe WHERE id = {$id}";
              $response= @mysqli_query($connection,$query_delete);
            }

            mysqli_stmt_close($statement1);
            mysqli_stmt_close($statement2);
            mysqli_close($connection);
        }


    }

    else{

        echo "\nError. Please make sure that you have entered the following field(s) and resubmit the form:";
        // print_r($missing_data);

        foreach ($missing_data as $key => $value) {
          echo "\n{$value} (required)";

        }
    }


?>
