<?php
    echo'<!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
  
      <ul class="sidebar-nav" id="sidebar-nav">
  
        <li class="nav-item " >
          <a class="nav-link '; if ($pagewhat == 1) {echo "";} else {echo "collapsed";} echo' " href="index.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->
  
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#admin-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="admin-nav" class="nav-content collapse  '; if ($pagewhat>1 && $pagewhat<4) {echo "show";} else {echo "";} echo'" data-bs-parent="#sidebar-nav">
            <li>
              <a href="c-admin.php" class="'; if ($pagewhat == 2) {echo "active";} else {echo "";} echo'">
                <i class="bi bi-circle"></i><span>Create</span>
              </a>
            </li>
            <li>
              <a href="m-admin.php" class="'; if ($pagewhat == 3) {echo "active";} else {echo "";} echo'">
                <i class="bi bi-circle"></i><span>Manage</span>
              </a>
            </li>
            
          </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="user-nav" class="nav-content collapse  '; if ($pagewhat>3 && $pagewhat<6) {echo "show";} else {echo "";} echo'" data-bs-parent="#sidebar-nav">
            <li>
              <a href="c-user.php" class="'; if ($pagewhat == 4) {echo "active";} else {echo "";} echo'">
                <i class="bi bi-circle"></i><span>Create</span>
              </a>
            </li>
            <li>
              <a href="m-user.php" class="'; if ($pagewhat == 5) {echo "active";} else {echo "";} echo'">
                <i class="bi bi-circle"></i><span>Manage</span>
              </a>
            </li>
            
          </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#sp-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Service Provider</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="sp-nav" class="nav-content collapse  '; if ($pagewhat>5 && $pagewhat<8) {echo "show";} else {echo "";} echo'" data-bs-parent="#sidebar-nav">
            <li>
              <a href="c-sp.php" class="'; if ($pagewhat == 6) {echo "active";} else {echo "";} echo'">
                <i class="bi bi-circle"></i><span>Create</span>
              </a>
            </li>
            <li>
              <a href="m-sp.php" class="'; if ($pagewhat == 7) {echo "active";} else {echo "";} echo'">
                <i class="bi bi-circle"></i><span>Manage</span>
              </a>
            </li>
            
          </ul>
        </li><!-- End Components Nav -->
        
  
        <li class="nav-heading">Pages</li>
  
        <li class="nav-item">
          <a class="nav-link collapsed" href="users-profile.php">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li><!-- End Profile Page Nav -->
  
        <li class="nav-item">
          <a class="nav-link collapsed" href="pages-faq.php">
            <i class="bi bi-question-circle"></i>
            <span>F.A.Q</span>
          </a>
        </li><!-- End F.A.Q Page Nav -->
  
        <li class="nav-item">
          <a class="nav-link collapsed" href="pages-contact.php">
            <i class="bi bi-envelope"></i>
            <span>Contact</span>
          </a>
        </li><!-- End Contact Page Nav -->
  
        <li class="nav-item">
          <a class="nav-link collapsed" href="pages-register.php">
            <i class="bi bi-card-list"></i>
            <span>Register</span>
          </a>
        </li><!-- End Register Page Nav -->
  
        <li class="nav-item">
          <a class="nav-link collapsed" href="pages-login.php">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Login</span>
          </a>
        </li><!-- End Login Page Nav -->
  
        <li class="nav-item">
          <a class="nav-link collapsed" href="pages-error-404.php">
            <i class="bi bi-dash-circle"></i>
            <span>Error 404</span>
          </a>
        </li><!-- End Error 404 Page Nav -->
  
        <li class="nav-item">
          <a class="nav-link collapsed" href="pages-blank.php">
            <i class="bi bi-file-earmark"></i>
            <span>Blank</span>
          </a>
        </li><!-- End Blank Page Nav -->
  
      </ul>
  
    </aside><!-- End Sidebar-->';
?>