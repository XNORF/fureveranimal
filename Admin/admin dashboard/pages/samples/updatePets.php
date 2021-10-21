<!doctype html>
<html lang="en">
  <head>
  <style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button2 {background-color: #9370DB;} /* Blue */


table, th, td {
  border: 1px solid black;
}
table.center {
  margin-left: auto;
  margin-right: auto;
}

</style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   

    <title>fureveranimalshelter</title>
  </head>
  <body>
    <div class="container mt-5">

        <div class ="row">
        <div class="col-md-12" >
       
        
        <h4 class="card-title">PETS LIST</h4>
   </div>
   <div class="card-body">
       <?php

       $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
       $db = mysqli_select_db($con,'fureveranimalshelter');

       $query = "SELECT * FROM pets";
                  $query_run = mysqli_query($con,$query);

       ?>
       <table class="table"  style="background-color:#F0C6F2">
           <thead>
            <tr  class ="text-black">
                            
                  
                  <th>NAME</th>
                  <th>HEALTH CONDITION/ALLERGY</th>
                  <th>STORY</th>
                  <th>IMAGE</th>
                  <th>EDIT</th>
                  <th>DELETE</th>
            </tr>
           </thead>
           <tbody>
           
           <?php

if(mysqli_num_rows($query_run) > 0)
{

    foreach($query_run as $row)
    {
 ?>
<tr class ="text-black">
    
    
      <td> <?php echo $row['name'];?> </td>
      <td> <?php echo $row['health'];?> </td>
      <td> <?php echo $row['story'];?> </td>
      <td><img src="<?php echo "upload/".$row['image']; ?>" width="200px" alt="image"></td>
      <td>
          
      <a href=""> <button type ="button" class="btn btn-success editbtn">EDIT</button></a>
    
    </td>
      <td>
      <form action="updatePetsFunction.php" method="post">
      <a href="updatePetsFunction.php?del=<?php echo $row['id']; ?>"   class="btn btn-danger">DELETE</a>

      </td>
    
    </tr>

 <?php
    }


}
else
{
 ?>

<tr>
    
<td>No Record Available</td>

</tr>




 <?php


}
           ?>



           </tbody>
       </table>

       <div class="container">
                      <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        
           <a href="\masterfureveranimal\Admin\admin dashboard\pages\samples\NewPets.php"> <input value ="ADD PETS" id="submit" name="submit" class="button button2"></input></a>
           <a href = "/masterfureveranimal/Admin/admin%20dashboard/indexDashboard.php" button type="submit" class="button button2">BACK TO DASHBOARD</button></a>
                    </form>

   </div>
</div>

            </div>
        </div>

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

  
  </body>
</html>