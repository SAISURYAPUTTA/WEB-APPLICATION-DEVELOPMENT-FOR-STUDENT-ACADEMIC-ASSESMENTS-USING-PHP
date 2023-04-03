<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>LIGHT THE CLASSROOM|| SideBar </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
        <div class="logo_name">LIGHT THE CLASSROOM</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="dashboard.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="#">
         <i class='bx bx-user' ></i>
         <span class="links_name">Class</span>
       </a>
       <span class="tooltip">Class</span>
       <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-class.php">Add Class</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-class.php">Manage Class</a></li>
</ul>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Students</span>
       </a>
       <span class="tooltip">Students</span>
       <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-students.php">Add Students</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-students.php">Manage Students</a></li>
</ul>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Staff</span>
       </a>
       <span class="tooltip">Staff</span>
       <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-notice.php"> Teaching Staff </a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-notice.php"> Non-Teaching </a></li>
</ul>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Reportsr</span>
       </a>
       <span class="tooltip">Reports</span>
       <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-public-notice.php"> Attendence </a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-public-notice.php"> Marks </a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-public-notice.php"> Fees </a></li>
</ul>
     </li>
     <!-- <li>
       <a href="#">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Order</span>
       </a>
       <span class="tooltip">Order</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="profile.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name">Prem Shahi</div>
             <div class="job">Web designer</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li> -->
    <!-- </ul> -->
  </div>
  <!-- <section class="home-section">
      <div class="text">Dashboard</div>
  </section> -->

  <script src="script.js"></script>

</body>
</html>
