<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Fur-Ever Animal Shelter</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/logofurever.png" rel="icon">
        <link href="assets/img/logofurever.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">
        <<link rel="stylesheet" href="assets/css/indexAdmin.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!-- =======================================================
        * Template Name: Ninestars - v4.3.0
        * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1 class="text-light"><a href="index.php"><span><img src="assets/img/logofur.png" ></span></a></h1>
            
                
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="Adminindex.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                <li><a class="nav-link scrollto" href="index.php#about">About Us</a></li>
                <li class="dropdown"><a href="#"><span>What We Do</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                    <li><a href="rehoming.php">Shelter, Rehabilitation & Rehoming</a></li>
                    <li><a href="spay.php">Spay & Neuter</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>What You Can Do</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                    <li><a href="adopt.php">Adopt</a></li>
                    <li><a href="donation/donation.php">Donate</a></li>
                    <li><a href="volunteer.php">Volunteer</a></li>
                    </ul>
                </li>
                
                <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
                <li><a class="nav-link scrollto" href="#about">Account</a></li>
                <form action="adopterFunction.php" method="POST"><li><button class="getstarted scrollto" formmethod="POST" name="logout">Log Out</button></li></form>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->

        <!-- ======= Account ======= --> 
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container">
            <div class="view-account">
                <section class="module">
                    <div class="module-inner">
                        <div class="side-bar">
                            <div class="user-info">
                                <img class="img-profile img-circle img-responsive center-block" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                <ul class="meta list list-unstyled">
                                    <li class="name">
                                        <label class="label label-info">Ali</label>
                                    </li>
                                    <li class="email"><a href="#"></a></li>
                                    <li class="activity">Last logged in: Today at 2:18pm</li>
                                </ul>
                            </div>
                            <nav class="side-menu">
                                <ul class="nav">
                                    <li><a href="accountadopter.php"><span class="fa fa-user"></span> Profile</a></li>
                                    <li ><a href="accountadopter.php"><span class="fa fa-credit-card"></span> Billing</a></li>
                                    <li class="active"><a href="adoptionhistoryadmin.php"><span class="fa fa-envelope"></span> Adoption History</a></li>
									<li><a href="changepassadopterTest.php"><span class="fa fa-th"></span> Change Password</a></li>
									<li><a href="certificate.php"><span class="fa fa-th"></span> View Certificate</a></li>
                                    
                                </ul>
                            </nav>
                        </div>
                        <div class="content-panel">
                        <h2 class="title"><b>Adoption & Appointment History</b><span class="pro-label label label-warning"></span></h2>
                            <h2 class="title"><span class="pro-label label label-warning"></span></h2>
                            <form class="form-horizontal">
                                <fieldset class="fieldset">
                                    <div class="form-group avatar">
        
                                    </div>
                                </fieldset>
                                <fieldset class="fieldset">
                                    <div class="form-group">
                                    </div>
                                   <div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Adoption <b>History</b></h2>
					</div>
					<div class="col-sm-6">
						<!--<a href="#addAdoptionModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>-->
						<a href="#deleteAdoptionModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div><br>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Animal Adopted</th>
						<th>Date Adopted</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>(171) 555-2222</td>
						<td> Lily </td>
						<td> 5 September 2021</td>
						<td>
							<!--<a href="#editAdopterModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>-->
							<a href="#deleteAdopterModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>
						</td>
						<td>Dominique Perrier</td>
						<td>dominiqueperrier@mail.com</td>
						<td>Obere Str. 57, Berlin, Germany</td>
						<td>(313) 555-5735</td>
						<td> Nyx </td>
						<td> 5 September 2021</td>
						<td>
							<!--<a href="#editAdopterModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>-->
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox3" name="options[]" value="1">
								<label for="checkbox3"></label>
							</span>
						</td>
						<td>Maria Anders</td>
						<td>mariaanders@mail.com</td>
						<td>25, rue Lauriston, Paris, France</td>
						<td>(503) 555-9931</td>
						<td> King </td>
						<td> 5 September 2021</td>
						<td>
							<!--<a href="#editAdopterModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>-->
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox4" name="options[]" value="1">
								<label for="checkbox4"></label>
							</span>
						</td>
						<td>Fran Wilson</td>
						<td>franwilson@mail.com</td>
						<td>C/ Araquil, 67, Madrid, Spain</td>
						<td>(204) 619-5731</td>
						<td> Killa </td>
						<td> 5 September 2021</td>
						<td>
							<!--<a href="#editAdopterModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>-->
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>					
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox5" name="options[]" value="1">
								<label for="checkbox5"></label>
							</span>
						</td>
						<td>Martin Blank</td>
						<td>martinblank@mail.com</td>
						<td>Via Monte Bianco 34, Turin, Italy</td>
						<td>(480) 631-2097</td>
						<td> Richard </td>
						<td> 5 September 2021</td>
						<td>
							<!--<a href="#editAdopterModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>-->
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr> 
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div><br>
				<ul class="pagination">
					<li class="page-item"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
                                    </div>
                                </fieldset>
                                <hr>
                                
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- End Account -->
            </div>
        </div>
    </body>
</html>