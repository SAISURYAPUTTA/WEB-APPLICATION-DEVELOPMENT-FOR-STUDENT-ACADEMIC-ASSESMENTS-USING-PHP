<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
 $cname=$_POST['cname'];
 $section=$_POST['section'];
$sql="insert into tblclass(ClassName,Section)values(:cname,:section)";
$query=$dbh->prepare($sql);
$query->bindParam(':cname',$cname,PDO::PARAM_STR);
$query->bindParam(':section',$section,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Class has been added.")</script>';
echo "<script>window.location.href ='add-class.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>LIGHT THE CLASSROOM|| MANAGE Class</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
                <div class="card">
                  <div class="card-body">   
	<div class="modal-dialog">
		<form method="post" id="studentForm" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Student</h4>
				</div>
				<h5>Student Information</h5>
				<div class="modal-body">
					<div class="row1">
					<div class="grid">
						<label for="admissionno" class="control-label">Admission No :</label>							
						<input type="number" style="width:13rem" class="grid" id="registerNo" name="registerNo" placeholder="Admission Number..">							
					</div>	
					<div class="grid">
						<label for="firstname" class="control-label">First Name :</label>							
						<input type="name" style="width:13rem" class="grid" id="firstname" name="firstname" placeholder="First Name..">							
					</div>	
					<div class="grid">
						<label for="lastname" class="control-label">Last Name :</label>							
						<input type="name" style="width:13rem" class="grid" id="lastname" name="lastname" placeholder="Last Name..">							
					</div>	
					<div class="grid">
						<label for="dob" class="control-label">Date of Birth :</label>							
						<input type="Date" class="grid"  id="dob" name="dob" placeholder="MM/DD/YYYY">							
					</div>
					<div class="grid">
						<label for="age" class="control-label">Age :</label>							
						<input type="number" style="width:4rem" class="grid" id="age" name="age" placeholder="Age..">							
					</div>
</div>
<div class="column align-self-start" style="align:top">
        <img id="blah" src="images/upload.svg" alt="image" style="width:100% padding-right:80rem">
          <input type='file' onchange="readURL(this);" />
                             </div>
<br>
<br>
<div class="row1">
					<div class="grid">
						<label for="mobile" class="control-label">Mother Tongue :</label>							
						<select input type="language" style="width:13rem" class="grid" id="mothertongue" name="mothertongue" placeholder="">
						<!-- <select  name="Mother Tongue" style="width:9rem" class="grid" id="mothertongue"> -->
						<option value="">Choose Language</option>
                          <option value="A">Tamil</option>
                          <option value="B">Malayalam</option>
                          <option value="C">Telugu</option>
                          <option value="D">Kanadam</option>
                          <option value="E">Hindi</option>	
</select>						
					</div>
					<div class="grid">
						<label for="mobile" class="control-label">Religion :</label>							
						<select input type="name" style="width:13rem" class="grid" id="religion" name="religion" placeholder="">	
						<option value="">Choose Religion</option>
                          <option value="A">Hindu</option>
                          <option value="B">Muslim</option>
                          <option value="C">Christians</option>
                          <option value="D">Buddhists</option>
</select>						
					</div>
					<div class="grid">
						<label for="mobile" class="control-label">Caste :</label>							
						<select input type="name" style="width:13.5rem" class="grid" id="caste" name="caste" placeholder="">
						<option value="">Choose Caste</option>
                          <option value="A">BC</option>
                          <option value="B">MBC</option>
                          <option value="C">OC</option>
                          <option value="D">SC</option>
</select>							
					</div>
					<div class="grid">
						<label for="mobile" class="control-label">Sub Caste :</label>							
						<input type="name" style="width:13.5rem" class="grid" id="subcaste" name="subcaste" placeholder="Sub Caste..">							
					</div>
</div>
<br>
<br>
<br>
<br>
<div class="row">
					<div class="grid">
						<label for="mobile" class="control-label">Blood Group</label>							
						<select input type="name" style="width:13rem" class="grid" id="bloodgroup" name="bloodgroup" placeholder="">
						<option value="">Choose Blood Group</option>
                          <option value="A">O (+)</option>
                          <option value="B">O (-)</option>
                          <option value="C">A (+)</option>
                          <option value="D">A (-)</option>
                          <option value="E">B (+)</option>
						  <option value="E">B (-)</option>	
						  <option value="E">AB (+)</option>	
						  <option value="E">AB (-)</option>		
</select>							
					</div>
					<div class="grid">
						<label for="mobile" class="control-label">Identification Marks:(Scar)</label>							
						<input type="name" style="width:22rem" class="grid" id="scar" name="scar" placeholder="Scars..">							
					</div>
					<div class="grid">
						<label for="mobile" class="control-label">Identification Marks:(Mole)</label>							
						<input type="name" style="width:22rem" class="grid" id="mole" name="mole" placeholder="Moles..">							
					</div>
					<div class="grid">
						<label for="gender" class="control-label">Gender :</label>
						<select input type="name" style="width:10rem" class="grid" id="gender" name="gender" placeholder="">
						<option value="">Choose Gender</option>
                          <option value="A">Male</option>
                          <option value="B">Female</option>
</select>
					</div>	
</div>
<br>
<br>
<div class="row">
					<div class="grid">
						<label for="gender" class="control-label">Any Diasability :</label><br>							
						<label class="radio-inline">
							<input type="radio" name="disability" id="Yes" value="Yes" required>Yes
						</label>
						<label class="radio-inline">
							<input type="radio" name="disability" id="No" value="No" required>No
						</label>
</div>
<div class="grid">
						<input type="name" style="width:45rem" class="grid" id="Yes" name="Yes" placeholder="If Yes Please Mention Disability..">							
					</div>
</div>
<br>
<br>
<div class="row">
					<div class="grid">
						<label for="email" class="control-label">Date of Join :</label>							
						<input type="Date" class="grid"  id="doj" name="doj" placeholder="MM/DD/YYYY">							
					</div>	
					<div class="grid">
						<label for="email" class="control-label">TC Number :</label>							
						<input type="text" style="width:20rem" class="grid"  id="tcnumber" name="tcnumber" placeholder="TC Number..">							
					</div>
					<div class="grid">
						<label for="email" class="control-label">EMIS ID :</label>							
						<input type="text" style="width:20rem" class="grid"  id="emisid" name="emisid" placeholder="EMIS ID..">							
					</div>
					<div class="grid">
						<label for="email" class="control-label">Aadhar Number :</label>							
						<input type="number" style="width:18rem" class="grid"  id="aadarno" name="aadarno" placeholder="Aadhar Number..">							
					</div>
</div>
<br>
<br>
<div class="row">
					<div class="grid">
						<label for="email" class="control-label">Previous School With Address :</label>							
						<input type="text" style="width:40rem" class="grid"  id="address" name="address" placeholder="Previous School With School..">							
					</div>
					<div class="grid">
						<label for="email" class="control-label">Study Medium :</label>							
						<select input type="text" style="width:15rem" class="grid"  id="studymedium" name="studymedium" placeholder="">
						<option value="">Choose Study Medium</option>
                          <option value="A">Tamil</option>
                          <option value="B">English</option>
						  <option value="B">Telugu</option>
</select>							
					</div>
</div>
<br>
<br>
<div class="row">
					<div class="grid">
						<label for="email" class="control-label">Hostler</label><br>
						<label for="email" class="control-label">Hostel Id :</label>
                        <input type="text" class="grid"  id="hostlrid" name="hostlerid" placeholder="Hostel Id..">  
                        <label for="email" class="control-label">Bed No :</label>                         
                        <input type="text" class="grid"  id="hostlebedno" name="hostlebedno" placeholder="Bed No..">
						
					</div>
					<div class="grid">
						<label for="email" class="control-label">Day-Scholar</label><br>
						<label for="email" class="control-label">Mode of Transport :</label>
						<select input type="text" style="width:20rem" class="grid"  id="mode" name="mode" placeholder="">
						<option value="">Choose Mode Of Transport</option>
                          <option value="A">School Bus</option>
                          <option value="B">Bicycle</option>
						  <option value="B">By Parents</option>
						  <option value="B">Govt Bus</option>
</select>								
						<label for="email" class="control-label">School Bus N0 :</label>							
						<select input type="number" style="width:20rem" class="grid"  id="busno" name="busno" placeholder="">	
						<option value="">Choose School Bus NO</option>
                          <option value="A">1</option>
                          <option value="B">2</option>
						  <option value="B">3</option>
						  <option value="B">4</option>
						  <option value="B">5</option>
</select>								
						<label for="email" class="control-label">Stop Stage :</label>							
						<select input type="text" style="width:20rem" class="grid"  id="stop" name="stop" placeholder="Stop Stage..">
						<option value="">Choose Stop Stage</option>
                          <option value="A">Stage 1</option>
                          <option value="B">Stage 2</option>
						  <option value="B">Stage 3</option>
						  <option value="B">Stage 4</option>
						  <option value="B">Stage 5</option>
</select>															
					</div>
</div>
<br>
<br>
					<h6>Parents Information</h6>
					<br>
					<div class="row">
					<div class="grid">
						<label for="firstname" class="control-label">Father Name :</label>
						<input type="text" style="width:18rem" class="grid" id="fname" name="fname" placeholder="Father Name" required>				
					</div>	
					<div class="grid">
						<label for="firstname" class="control-label">Occupation :</label>
						<select input type="text" style="width:18rem" class="grid" id="foccu" name="foccu" placeholder="Occupation" required>	
						<option value="">Choose Occupation</option>
                          <option value="A">Farmer</option>
                          <option value="B">Own Business</option>
						  <option value="B">Shop</option>
						  <option value="B">IT</option>
</select>			
					</div>
					<div class="grid">
						<label for="firstname" class="control-label">Educational Level :</label>
						<select input type="text" style="width:18rem" class="grid" id="fedu" name="fedu" placeholder="Educational Level" required>
						<option value="">Choose Educational Level</option>
                          <option value="A">10th</option>
                          <option value="B">12th</option>
						  <option value="B">UG Degree</option>
						  <option value="B">PG Degree</option>
</select>				
					</div>		
					<div class="grid">
						<label for="firstname" class="control-label">Contact Number :</label>
						<input type="number" style="width:18rem" class="grid" id="fnumber" name="fnumber" placeholder="Contact Number" required>				
					</div>	
</div>
<br>
<br>
<div class="row">
					<div class="grid">
						<label for="firstname" class="control-label">Mother Name :</label>
						<input type="text" style="width:18rem" class="grid" id="mname" name="mname" placeholder="Mother Name" required>				
					</div>	
					<div class="grid">
						<label for="firstname" class="control-label">Occupation :</label>
						<select input type="text" style="width:18rem" class="grid" id="moccu" name="moccu" placeholder="Occupation" required>	
						<option value="">Choose Occupation</option>
                          <option value="A">Farmer</option>
                          <option value="B">Own Business</option>
						  <option value="B">Shop</option>
						  <option value="B">IT</option>
</select>						
					</div>
					<div class="grid">
						<label for="firstname" class="control-label">Educational Level :</label>
						<select input type="text" style="width:18rem" class="grid" id="medu" name="medu" placeholder="Educational Level" required>	
						<option value="">Choose Educational Level</option>
                          <option value="A">10th</option>
                          <option value="B">12th</option>
						  <option value="B">UG Degree</option>
						  <option value="B">PG Degree</option>
</select>							
					</div>		
					<div class="grid">
						<label for="firstname" class="control-label">Contact Number :</label>
						<input type="number" style="width:18rem" class="grid" id="mnumber" name="mnumber" placeholder="Contact Number" required>				
					</div>
</div>
<br>
<br>
<div class="row">
					<div class="grid">
						<label for="firstname" class="control-label">Guardian Name :</label>
						<input type="text" style="width:18rem" class="grid" id="gname" name="gname" placeholder="Guardian Name" required>				
					</div>	
					<div class="grid">
						<label for="firstname" class="control-label">Occupation :</label>
						<select input type="text" style="width:18rem" class="grid" id="goccu" name="goccu" placeholder="Occupation" required>	
						<option value="">Choose Occupation</option>
                          <option value="A">Farmer</option>
                          <option value="B">Own Business</option>
						  <option value="B">Shop</option>
						  <option value="B">IT</option>
</select>						
					</div>
					<div class="grid">
						<label for="firstname" class="control-label">Educational Level :</label>
						<select input type="text" style="width:18rem" class="grid" id="gedu" name="gedu" placeholder="Educational Level" required>	
						<option value="">Choose Educational Level</option>
                          <option value="A">10th</option>
                          <option value="B">12th</option>
						  <option value="B">UG Degree</option>
						  <option value="B">PG Degree</option>
</select>							
					</div>		
					<div class="grid">
						<label for="firstname" class="control-label">Contact Number :</label>
						<input type="number" style="width:18rem" class="grid" id="gnumber" name="gnumber" placeholder="Contact Number" required>				
					</div>	
</div>
<br>
<br>
<div class="row">
					<div class="grid">
						<label for="gender" class="control-label">Is Parents Working In This School?</label><br>							
						<label class="radio-inline">
							<input type="radio" name="Working" id="Yes" value="Yes" required>Yes
						</label>
						<label class="radio-inline">
							<input type="radio" name="Working" id="No" value="No" required>No
						</label>							
					</div>
					<div class="grid">
						<label for="firstname" class="control-label">Select Staff Name :</label>
						<input type="text" style="width:20rem" class="grid" id="stfname" name="stfname" placeholder="Select Staff Name.." required>				
					</div>
</div>
<br>
<br>
<div class="roww">
					<div class="gridd">
						<label for="email" class="control-label">Living Address :</label>
						<br>
						<label for="email" class="control-label">Street Address :</label>
						<input type="text"  style="width:20rem" class="gridd"  id="staddress" name="staddress" placeholder="Street Address..">	<br><br>
						<label for="email" class="control-label">Pincode :</label>							
						<input type="number" style="width:20rem" class="gridd"  id="pincode" name="pincode" placeholder="Pincode..">	<br><br>
						<label for="email" class="control-label">District :</label>							
						<input type="text" style="width:20rem" class="gridd"  id="district" name="district" placeholder="District..">	<br><br>
						<label for="email" class="control-label">State :</label>							
						<input type="text" style="width:20rem" class="gridd"  id="state" name="state" placeholder="State..">	
					</div>
					<div class="gride">
						<label for="email" class="control-label">Permanent Address :</label>
						<br>
						<label for="email" class="control-label">Street Address :</label>
						<input type="text" style="width:20rem" class="gride"  id="staddress" name="staddress" placeholder="Street Address..">	<br><br>
						<label for="email" class="control-label">Pincode :</label>							
						<input type="number" style="width:20rem" class="gride"  id="pincode" name="pincode" placeholder="Pincode..">	<br><br>
						<label for="email" class="control-label">District :</label>							
						<input type="text" style="width:20rem" class="gride"  id="district" name="district" placeholder="District..">	<br><br>
						<label for="email" class="control-label">State :</label>							
						<input type="text" style="width:20rem" class="gride"  id="state" name="state" placeholder="State..">							
					</div>
</div>
					<div class="gride">
				<div class="modal-footer">
					<input type="hidden" name="studentid" id="studentid" />
					<input type="hidden" name="action" id="action" value="updateStudent" />
					<input type="submit" name="save" id="save" class="btn btn-info" value="Update" />
					<button type="button" class="btn btn-default" data-dismiss="modal"></button>
        </div>
                    </form>
                </div>
            </div>
</div>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
	<script src="image.js"></script>
	<style>
	.modal-content {
  position: relative;
  display: flex;
  width: 85rem;
  border: 2px solid #e8ecf1;
  border-radius: 2rem;
  padding-left: 50px;
  padding-right: 40px;
  padding-bottom: 50px; }
  .grid{
			display:table;
			position:relative;
			height:3rem;
    font-size: 0.8125rem;
border-radius:8px;}
#blah {
    max-width: 180px;
	margin-left:0px;
}
.column {
  float:right;
  width: 21%;
  padding: 5px;
  max-height:300px;
  border:2px solid;
  border-radius:10px;
}
input[type=file]{
padding:10px;
display:flex;
width: 15rem;
}
.gridd{
	display:inline-block;
    position: relative;
    height: 3rem;
    font-size: 0.8125rem;
    border-radius: 8px;
}
.gride{
	display:inline-block;
    position: relative;
    height: 3rem;
    font-size: 0.8125rem;
    border-radius: 8px;
}
.roww{
	display:block;
	gap:20rem;
}
.row1{
	display:-webkit-inline-box;
	gap:2rem;
}
/* .label span{
    display: inline-block;
    text-align: right;
    width: 100px;
} */
  </style>
  </body>
</html><?php }  ?>