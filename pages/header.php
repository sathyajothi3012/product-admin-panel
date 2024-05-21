  <!-- Topbar Start -->
  <div class="navbar-custom">
            <div class="container-fluid">
               <ul class="list-unstyled topnav-menu float-right mb-0">
                  <li class="dropdown notification-list topbar-dropdown">
                     <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                     <img src="assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                     <span class="pro-user-name ml-1">
                     Admin <i class="mdi mdi-chevron-down"></i> 
                     </span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                           <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>Settings</span>
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Lock Screen</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <!-- item-->
                        <a href="logout.php" class="dropdown-item notify-item">
                        <i class="fe-log-out"><span>Logout</span></i>
                        
                        </a>
                     </div>
                  </li>
               </ul>
               <!-- LOGO -->
               <div class="logo-box">
                  <a class="logo logo-dark text-center">
                     <span class="logo-sm">
                        <img src="../images/logo.png" alt="" height="22">
                        <!-- <span class="logo-lg-text-light">UBold</span> -->
                     </span>
                     <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="20">
                        <!-- <span class="logo-lg-text-light">U</span> -->
                     </span>
                  </a>
                  <a href="index.html" class="logo logo-light text-center">
                  <span class="logo-sm">
                  <img src="../images/logo.png" alt="" height="22">
                  </span>
                  <span class="logo-lg">
                  <img src="../images/logo.png" alt="" class="mainLogo" height="20">
                  </span>
                  </a>
               </div>
               <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                  <li>
                     <button class="button-menu-mobile waves-effect waves-light">
                     <i class="fe-menu"></i>
                     </button>
                  </li>
                  <li>
                     <!-- Mobile menu toggle (Horizontal Layout)-->
                     <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                        <div class="lines">
                           <span></span>
                           <span></span>
                           <span></span>
                        </div>
                     </a>
                     <!-- End mobile menu toggle-->
                  </li>
               </ul>
               <div class="clearfix"></div>
            </div>
         </div>
         <!-- end Topbar -->
         <!-- ========== Left Sidebar Start ========== -->
         <div class="left-side-menu">
            <div class="h-100" data-simplebar>
               <!-- User box -->
               <div class="user-box text-center">
                  <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                     class="rounded-circle avatar-md">
                  <div class="dropdown">
                     <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                        data-toggle="dropdown">Geneva Kennedy</a>
                     <div class="dropdown-menu user-pro-dropdown">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        
                        </a>
                     </div>
                  </div>
                  <p class="text-muted">Admin Head</p>
               </div>
               <!--- Sidemenu -->
               <div id="sidebar-menu">
                  <ul id="side-menu">
                     <li class="menu-title">Navigation</li>
<!--                      <li>
                        <a href="#vendors" data-toggle="collapse">
                        <i data-feather="user"></i>
                        <span> Vendors </span>
                        <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="vendors">
                           <ul class="nav-second-level">
                              <li>
                                 <a href="index.php">Vendors Requests</a>
                              </li>
                              <li>
                                 <a href="aproved_vendor.php">Approved Vendors</a>
                              </li>
                           </ul>
                        </div>
                     </li> -->
                     <li>
                        <a href="#orders" data-toggle="collapse">
                        <i data-feather="layers"></i>
                        <span> Products </span>
                        <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="orders">
                           <ul class="nav-second-level">
                              <li>
                                 <a href="add-product.php">Add Product</a>
                              </li>
                              <li>
                                 <a href="index.php">View Products</a>
                              </li>
                           </ul>
                        </div>
                     </li>
<!--                      <li>
                        <a href="#orders" data-toggle="collapse">
                        <i data-feather="layers"></i>
                        <span> Orders </span>
                        <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="orders">
                           <ul class="nav-second-level">
                              <li>
                                 <a href="orders-list.php">View Orders</a>
                              </li>
                           </ul>
                        </div>
                     </li> -->
<!--                      <li>
                        <a href="#sidebarProjects" data-toggle="collapse">
                        <i data-feather="book"></i>
                        <span> Blogs </span>
                        <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarProjects">
                           <ul class="nav-second-level">
                              <li>
                                 <a href="add-blog.php">Add Blog</a>
                              </li>
                              <li>
                                 <a href="blogs.php">View Blogs</a>
                              </li>
                           </ul>
                        </div>
                     </li> -->
<!--                      <li>
                        <a href="transports.php">
                        <i data-feather="users"></i>
                        <span> Transports </span>
                        </a>
                     </li> -->
<!--                      <li>
                        <a href="categories.php">
                        <i data-feather="users"></i>
                        <span> Categories </span>
                        </a>
                     </li>
                     <li>
                        <a href="sub-categories.php">
                        <i data-feather="users"></i>
                        <span> Sub-categories </span>
                        </a>
                     </li> -->
                  </ul>
               </div>
               <!-- End Sidebar -->
               <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->
         </div>
         <!-- Left Sidebar End -->