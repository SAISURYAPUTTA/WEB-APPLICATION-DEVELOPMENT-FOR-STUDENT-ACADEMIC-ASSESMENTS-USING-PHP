<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
    $admissionnumber=$_POST['Admission N0'];
    $firstname=$_POST['First Name'];
    $lastname=$_POST['Last Name'];
    $age=$_POST['Age'];
    $dob=$_POST['DOB'];
    $mothertongue=$_POST['Mother Tongue'];
    $religion=$_POST['Religion'];
    $caste=$_POST['Caste'];
    $subcaste=$_POST['Sub Caste'];
    $bloodGroup=$_POST['Blood Group'];
    $identificationMarksScar=$_POST['Identification Marks(Scar)'];
    $identificationMarksMole=$_POST['Identification Marks(Mole)'];
    $image=$_FILES["image"]["name"];
    $gender=$_POST['Gender'];
    $disabilitye=$_POST['Disability'];
    $dateofjoin=$_POST['Date of Join'];
    $tcnumber=$_POST['TC Number'];
    $emisid=$_POST['EMIS ID']; 
    $aadhar=$_POST['Aadhar Number'];
    $previousschool=$_POST['Previous School With Address'];
    $studymedium=$_POST['Study Medium'];
    $sql="insert into tblstudent(Admission NO,First Name,Last Name,Age,DOB,Mother Tongue,Religion,Caste,Sub Caste,Blood Group,Identification Marks(Scar),Identificarion Marks(Mole),Image,Gender,Any Disability,Date of Join,TC Number,EMIS Id,Aadhar Number,Previous School With Address,Study Medium)values(:stuAdmission Number,:First Name,:Last Name,:Age,:DOB,:Mother Tongue,:Religion,:Caste,:Sub Caste,:Blood Group,:Identification Marks(Scar),:Identification Marks(Mole),:image,:Gender,:Disability,:Date of Join,:TC Number,:EMIS Id,:Aadhar Number,:Previous School With Address,:Study Medium)";
$query=$dbh->prepare($sql);
$query->bindParam(':Admission No',$AdmissionNumber,PDO::PARAM_STR);
$query->bindParam(':First Name',$FirstName,PDO::PARAM_STR);
$query->bindParam(':Last Name',$LastName,PDO::PARAM_STR);
$query->bindParam(':Age',$Age,PDO::PARAM_STR);
$query->bindParam(':DOB',$dob,PDO::PARAM_STR);
$query->bindParam(':Mother Tongue',$MotherTongue,PDO::PARAM_STR);
$query->bindParam(':Religion',$Religion,PDO::PARAM_STR);
$query->bindParam(':Caste',$Caste,PDO::PARAM_STR);
$query->bindParam(':Sub Caste',$SubCaste,PDO::PARAM_STR);
$query->bindParam(':Blood Group',$BloodGroup,PDO::PARAM_STR);
$query->bindParam(':Identification Marks(Scar)',$IdentificationMarksScar,PDO::PARAM_STR);
$query->bindParam(':Identification Marks(Mole)',$TdentificationMarksMole,PDO::PARAM_STR);
$query->bindParam(':Image',$image,PDO::PARAM_STR);
$query->bindParam(':Gender',$gender,PDO::PARAM_STR);
$query->bindParam(':Any Disability',$AnyDisability,PDO::PARAM_STR);
$query->bindParam(':Date of Join',$DateOfJoin,PDO::PARAM_STR);
$query->bindParam(':TC Number',$TCNumber,PDO::PARAM_STR);
$query->bindParam(':EMIS Id',$EMISID,PDO::PARAM_STR);
$query->bindParam(':Aadhar Number',$AadharNumber,PDO::PARAM_STR);
$query->bindParam(':Previous School With Address',$PreviousSchoolWithAddress,PDO::PARAM_STR);
$query->bindParam(':Study Medium',$StudyMedium,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
  echo '<script>alert("Student has been updated")</script>';
}

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Smart School  Management|| Update Students</title>
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
            <div class="page-header">
              <h3 class="page-title"> Update Students </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Update Students</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Update Students</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <?php
$eid=$_GET['editid'];
$sql="SELECT tblstudent.StudentName,tblstudent.StudentEmail,tblstudent.StudentClass,tblstudent.Gender,tblstudent.DOB,tblstudent.StuID,tblstudent.FatherName,tblstudent.MotherName,tblstudent.ContactNumber,tblstudent.AltenateNumber,tblstudent.Address,tblstudent.UserName,tblstudent.Password,tblstudent.Image,tblstudent.DateofAdmission,tblclass.ClassName,tblclass.Section from tblstudent join tblclass on tblclass.ID=tblstudent.StudentClass where tblstudent.ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                      <div class="form-group">
                        <label for="exampleInputName1">Student Name</label>
                        <input type="text" name="stuname" value="<?php  echo htmlentities($row->StudentName);?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Student Email</label>
                        <input type="text" name="stuemail" value="<?php  echo htmlentities($row->StudentEmail);?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Student Class</label>
                        <select  name="stuclass" class="form-control" required='true'>
                          <option value="<?php  echo htmlentities($row->StudentClass);?>"><?php  echo htmlentities($row->ClassName);?> <?php  echo htmlentities($row->Section);?></option>
                         <?php 

$sql2 = "SELECT * from    tblclass ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row1)
{          
    ?>  
<option value="<?php echo htmlentities($row1->ClassName);?><?php echo htmlentities($row1->Section);?>"><?php echo htmlentities($row1->ClassName);?> <?php echo htmlentities($row1->Section);?></option>
 <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Gender</label>
                        <select name="gender" value="" class="form-control" required='true'>
                          <option value="<?php  echo htmlentities($row->Gender);?>"><?php  echo htmlentities($row->Gender);?></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Date of Birth</label>
                        <input type="date" name="dob" value="<?php  echo htmlentities($row->DOB);?>" class="form-control" required='true'>
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleInputName1">Student ID</label>
                        <input type="text" name="stuid" value="<?php  echo htmlentities($row->StuID);?>" class="form-control" readonly='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Student Photo</label>
                        <img src="images/<?php echo $row->Image;?>" width="100" height="100" value="<?php  echo $row->Image;?>"><a href="changeimage.php?editid=<?php echo $row->ID;?>"> &nbsp; Edit Image</a>
                      </div>
                      <h3>Parents/Guardian's details</h3>
                      <div class="form-group">
                        <label for="exampleInputName1">Father's Name</label>
                        <input type="text" name="fname" value="<?php  echo htmlentities($row->FatherName);?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Mother's Name</label>
                        <input type="text" name="mname" value="<?php  echo htmlentities($row->MotherName);?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Contact Number</label>
                        <input type="text" name="connum" value="<?php  echo htmlentities($row->ContactNumber);?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Alternate Contact Number</label>
                        <input type="text" name="altconnum" value="<?php  echo htmlentities($row->AltenateNumber);?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Address</label>
                        <textarea name="address" class="form-control" required='true'><?php  echo htmlentities($row->Address);?></textarea>
                      </div>
                      </div><?php $cnt=$cnt+1;}} ?>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
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
  </body>
</html><?php }  ?>