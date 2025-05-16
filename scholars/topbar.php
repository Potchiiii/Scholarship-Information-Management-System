<!-- Navbar -->
<style>
.layout-navbar {
    font-family: 'Poppins', sans-serif;
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.95) !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
}

.navbar-nav {
    gap: 1rem;
}

.avatar {
    border: 2px solid #fff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.avatar:hover {
    transform: scale(1.05);
}

.dropdown-menu {
    border: none;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.dropdown-item {
    border-radius: 8px;
    margin: 0.2rem;
    transition: all 0.3s ease;
}

.dropdown-item:hover {
    background: rgba(128, 0, 0, 0.05);
    transform: translateX(5px);
}

.navbar-nav-right {
    max-width: 400px;
    margin-left: auto;
    padding: 0 1rem;
}

</style>

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme "
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li><?php echo $semdetails['sememestrName']."<br> ".$semdetails['date_start']." - ".$semdetails['date_end']?></li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/images/profile/<?php echo $fetch_info['profile']?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/images/profile/<?php echo $fetch_info['profile']?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-medium d-block"><?php echo $fetch_info['first_name'].' '.$fetch_info['last_name']?></span>
                            <small class="text-muted"><?php if ($fetch_info['roles'] == 1) {
                              echo "Administrator";
                            }elseif ($fetch_info['roles']==2) {
                              echo "System Staff";
                            }else {
                              echo "Scholar";
                            }?></small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="profile.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                   
                    
                    <li>
                      <a class="dropdown-item" href="../logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->
