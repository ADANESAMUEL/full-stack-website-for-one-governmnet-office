<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>HARAMAYA - UNIVERSITY </title>
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
  <link rel="stylesheet" href="./style.css">

</head>
<body style="background-image: b">
<!-- partial:index.partial.html -->
<div class="sidebar">
  <div class="logo-details">
    <i class='#'></i>
    <div class="logo_name">HARAMAYA</div>
    <i class='bx bx-menu' id="btn"></i>
  </div>
  <ul class="nav-list">
   
    <li>
      <a href="#">
        <i class='bx bx-grid-alt'></i>
        <span class="links_name">My profile</span>
      </a>
      
    </li>
    <li>
      <a href="grade.html">
        <i class='bx bx-book'></i>
        <span class="links_name">my grade</span>
      </a>
      
    </li>
    <li>
      <a href="new.html">
        <i class='bx bx-book'></i>
        <span class="links_name">quiz</span>
      </a>
      
    </li>
    <li>
      <a href="#">
        <i class='bx bx-user'></i>
        <span class="links_name">registration</span>
      </a>
      
    </li>
    
    
   
    <li class="profile">
      <div class="profile-details">
        <img src="https://drive.google.com/uc?export=view&id=1ETZYgPpWbbBtpJnhi42_IR3vOwSOpR4z" alt="profileImg">
        <div class="name_job">
          <div class="name">REGISTRATION</div>
          <div class="job">LOG IN</div>
        </div>
      </div>
      <i class='bx bx-log-out' id="log_out"></i>
    </li>
  </ul>
</div>
<section class="home-section">
  <div class="text">My Profile</div>
  <div class="profile">
    <img src="profile.png">
  </div>
  <ul>
    <li>Name: <?php echo $row['First_name']; ?> </li>
    <li>UID: <?php echo $row['uid']; ?> </li>
    
  </ul>


</section>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
