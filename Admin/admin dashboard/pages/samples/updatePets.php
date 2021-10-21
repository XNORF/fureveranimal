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
                  $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
                  $db = mysqli_select_db($con,'fureveranimalshelter');

                  $query = "SELECT * FROM pets";
                  $query_run = mysqli_query($con,$query);
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
      <th scope ="col">HEALTH CONDITION/ALLERGY</th>
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
      <td> <?php echo $row['health'];?> </td>
      <td> <?php echo $row['story'];?> </td>
      <td> <?php echo $row['image'];?> </td>
      
     


    <td>
    <a  href="pages/samples/editAdmin.php">
    <button type="button" class="btn btn-success editbtn">EDIT</button></a>
    </td> 
    <td> 
      <form action="updatePets.php" method="post">
      <a href="updatePetsFunction.php?del=<?php echo $row['id']; ?>" class="btn btn-danger deletebtn">Delete</a>
    </form>
    
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
					  
            <a href="\masterfureveranimal\Admin\admin dashboard\pages\samples\NewPets.php">
            <button type="submit" class="btn btn-gradient-primary mr-2">ADD PET</button></a>
					 
    
           
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->

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