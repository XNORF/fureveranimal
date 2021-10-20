
<?php 
    session_start();
   
    
    //Load Composer's autoloader

    //Handles login & signup functions    
    if(isset($_POST['signup'])){
                header("Location: NewPets.php?signup=success");
                exit();
    }
 
    
		

    function signup(){ //Signup Function and return VKEY for verification
        $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
        if(!$con){
            echo mysqli_error($con);
        }else{
            //Construct SQL statement
            $name = $_POST['name'];
        $age = $_POST['age'];
        $type = $_POST['type'];        
        $health = ($_POST['health']);
        $date = $_POST['date'];
        $gender = $_POST['gender'];
        $story = $_POST['story'];
        $image = $_POST['image'];



            $sql = "insert into pets(name, age, type, health, date, gender, story, image)
                values('$name', '$age', '$type', '$health', '$date', '$gender', '$story', '$image', '$name')";
            
        }    
        if(!mysqli_query($con, $sql)){
            //echo mysqli_error($con);
            header("Location: register/signup.php?signup=failed");
            exit();
        }else{
            return $vkey;
        }
    }



     $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
    if (isset($_GET['del'])) {
      $id = $_GET['del'];
      mysqli_query($con, "DELETE FROM pets WHERE id=$id");
      $_SESSION['message'] = "Address deleted!"; 
      header('location: updatePets.php');
    }

  
?>





<!DOCTYPE html>
<html lang="en">
  <head>
<style>
  .button {
  background-color: #f44336;
  border: none;
  color: white;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

</style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fur-Ever Animal Shelter</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>



<div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">

                       
                <?php
                  $connection = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
                  $db = mysqli_select_db($connection,'fureveranimalshelter');

                  $query = "SELECT * FROM pets";
                  $query_run = mysqli_query($connection,$query);
                  ?>


                    <h4 class="card-title">UPDATE ADMIN</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                          <!-- On tables -->

                          <table class="table table-dark table-hover">
                          <thead>
    <tr>
        <th scope ="col">ID</th>
      <th scope ="col">NAME</th>
      <th scope ="col">AGE</th>
      <th scope ="col">TYPE</th>
      <th scope ="col">HEALTH CONDITION/ALLERGY</th>
      <th scope ="col">DATE OF ARRIVAL TO FAS</th>
      <th scope ="col">GENDER</th>
      <th scope ="col">STORY</th>
      <th scope ="col">IMAGE</th>
      <th scope ="col">EDIT</th>
      <th scope ="col">DELETE</th>
</tr>
</thead>

<?php

if ($query)
{
    foreach($query_run as $row)
    {
      ?>

<tbody>
 <tr>
 <td> <?php echo $row['id'];?> </td>
      <td> <?php echo $row['name'];?> </td>
      <td> <?php echo $row['age'];?> </td>
      <td> <?php echo $row['type'];?> </td>
      <td> <?php echo $row['health'];?> </td>
      <td> <?php echo $row['date'];?> </td>
      <td> <?php echo $row['gender'];?> </td>
      <td> <?php echo $row['story'];?> </td>
      <td> <?php echo $row['image'];?> </td>
     


    <td>
    <button type="button" class="btn btn-success editbtn">UPDATE</button>
    </td> 
    <td> 
      <form action="updatePetsFunction.php" method="post">
      <a href="updatePetsFunction.php?del=<?php echo $row['id']; ?>" class="btn btn-danger deletebtn">Delete</a>
    </form>
    <td>

    </td>

</tr>
</tbody>

<?php

}     
}
else 
{
echo"No Record Found";
}

?>

</table>



                      </table>
					  <div class="container">
					  <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  
            <a  href="\masterfureveranimal\Admin\admin dashboard\pages\samples/updatePets.php">
            <button type="submit" class="btn btn-gradient-primary mr-2">ADD PET</button></a>
					  </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			</div>
      <script>
  </body>
</html>

