<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fur-Ever Animal Shelter</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  </head>
  <body>
    
        <!-- partial -->
        
			
       
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Update Pets </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
			
			<div class="card">
                  <div class="card-body"><div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Pets List</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Pets </th>
                            <th> Status </th>
                            <th> Last Update </th>
							<th> Delete Pet </th>
							<th> Edit Pet </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> Nyx
                            </td>
                            <td>
                              <label class="badge badge-gradient-success">AVAILABLE</label>
                            </td>
                            <td> Aug 4, 2021 </td>
							<td> <a href="#deletePetModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>
						  <td><a href="#editPetModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></td>
                          </tr>
                          <tr>
                            <td>
                              <img src="assets/images/faces/face6.jpg" class="mr-2" alt="image"> King
                            </td>
                            <td>
                              <label class="badge badge-gradient-success">AVAILABLE</label>
                            </td>
                            <td> Aug 12, 2021 </td>
							<td> <a href="#deletePetModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>
						  <td><a href="#editPetModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></td>
                          </tr>
                          <tr>
                            <td>
                              <img src="assets/images/faces/face3.jpg" class="mr-2" alt="image"> Killa
                            </td>
                            <td>
                              <label class="badge badge-gradient-success">AVAILABLE</label>
                            </td>
                            <td> Aug 16, 2021 </td>
							<td> <a href="#deletePetModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>
						  <td><a href="#editPetModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></td>
                          </tr>
                          <tr>
                            <td>
                              <img src="assets/images/faces/face4.jpg" class="mr-2" alt="image"> Marshmallow
                            </td>
                            <td>
                              <label class="badge badge-gradient-success">AVAILABLE</label>
                            </td>
                            <td> Sept 3, 2021 </td>
							<td> <a href="#deletePetModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>
						  <td><a href="#editPetModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></td>
                          </tr>
                        </tbody>
                      </table>
					  <div class="container">
					  <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
                      <button type="submit" class="btn btn-gradient-primary mr-2">UPDATE PET</button>
					  </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			</div>
           
			   
             
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add New Pet Information</h4>
                    <p class="card-description"> </p>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputName">Pet Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPetAge"> Age</label>
                        <input type="text" class="form-control" id="exampleInputPhone" placeholder="Age">
                      </div>
					  <div class="form-group">
                        <label for="exampleInputAnimalType">Dog or Cat</label>
                        <input type="text" class="form-control" id="exampleInputAddress1" placeholder="Animal Type">
                      </div>
					  <div class="form-group">
                        <label for="exampleInputPetHealth">Health Condition/Allergy</label>
                        <input type="text" class="form-control" id="exampleInputAddress2" placeholder="Health Condition Status">
                      </div>
					  
                     
					  <div class="form-group">
                        <label for="exampleInputDOA">Date Of Arrival to FAS</label>
                        <input type="date" class="form-control" id="exampleInputDate" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGenderPet">Pet Gender</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
					  <div class="form-group">
                        <label for="exampleInputPetStory">Pet Story</label>
                        <input type="text" class="form-control" id="exampleInputPostCode" placeholder="Pet Story">
                      </div>
                      <div class="form-group">
                        <label>Pet Picture upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      
                      
                      <button type="submit" class="btn btn-gradient-primary mr-2">Add Pet</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              
              
             
              
              
              
						
						
						
						
						
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
  </body>
</html>