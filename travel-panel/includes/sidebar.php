 <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                

                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="<?= BASE_URL ?>/assets/img/logo/Travelwithsaadzakaria-logo.png" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="<?= BASE_URL ?>/assets/img/logo/Travelwithsaadzakaria-logo.png" alt="small logo">
                    </span>
                </a>

                <!-- Sidebar Hover Menu Toggle Button -->
                <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
                    <i class="ri-checkbox-blank-circle-line align-middle"></i>
                </div>

                <!-- Full Sidebar Menu Close Button -->
                <div class="button-close-fullsidebar">
                    <i class="ri-close-fill align-middle"></i>
                </div>

                <!-- Sidebar -left -->
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <!-- Leftbar User -->
                    <div class="leftbar-user p-3 text-white">
                        <a href="pages-profile.html" class="d-flex align-items-center text-reset">
                            <div class="flex-shrink-0">
                                <img src="<?= BASE_URL ?>/travel-panel/assets/images/users/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow">
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <span class="fw-semibold fs-15 d-block">Haseeb Ahmed</span>
                                <span class="fs-13">Developer</span>
                            </div>
                        </a>
                    </div>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title mt-1"> Main</li>

                        <li class="side-nav-item">
                            <a href="index.html" class="side-nav-link">
                                <i class="ri-home-6-line"></i>
                                <span class="badge bg-success float-end">9+</span>
                                <span> Dashboard </span>
                            </a>
                        </li>
                         <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                                <i class="ri-calendar-2-line"></i>
                                <span> Bookings</span>
                                <span class="menu-arrow"><i class="bi bi-chevron-down"></i></span>
                            </a>
                            <div class="collapse" id="sidebarEmail">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="<?= BASE_URL ?>/travel-panel/bookings/hotel-booking.php">Hotels</a>
                                    </li>
                                    <li>
                                        <a href="<?= BASE_URL ?>/travel-panel/bookings/umrah-package-booking.php">Umrah Packages</a>
                                    </li>
                                     <li>
                                        <a href="<?= BASE_URL ?>/travel-panel/bookings/car-rental-booking.php">Car rentals</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                                <i class="ri-building-line"></i>
                                <span> Hotels </span>
                                <span class="menu-arrow"><i class="bi bi-chevron-down"></i></span>
                            </a>
                            <div class="collapse" id="sidebarEmail">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="<?= BASE_URL ?>/travel-panel/hotels/add-new-hotel.php">Add a new Hotel</a>
                                    </li>
                                    <li>
                                        <a href="<?= BASE_URL ?>/travel-panel/hotels/add-new-room.php">Add a New Room</a>
                                    </li>
                                     <li>
                                        <a href="apps-email-inbox.html">All Hotels</a>
                                    </li>
                                     <li>
                                        <a href="apps-email-inbox.html">All Rooms</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                                <i class="ri-list-check-3"></i>
                                <span> umrah Packages</span>
                                <span class="menu-arrow"><i class="bi bi-chevron-down"></i></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="<?= BASE_URL ?>/travel-panel/umrah-packages/add-new-tour.php">Add a new Package</a>
                                    </li>
                                    <li>
                                        <a href="apps-tasks-details.html">All Packages</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                           <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                                <i class="ri-roadster-line"></i>
                                <span>Car Rentals</span>
                                <span class="menu-arrow"><i class="bi bi-chevron-down"></i></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="<?= BASE_URL ?>/travel-panel/car-rentals/add-new-car-rental.php">Add a new Car Rental</a>
                                    </li>
                                    <li>
                                        <a href="<?= BASE_URL ?>/travel-panel/car-rentals/routes.php">Add a new Route</a>
                                    </li>
                                     <li>
                                        <a href="apps-tasks-details.html">All Car Rentals</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="/travel-panel/locations/locations.php" class="side-nav-link">
                                <i class="ri-map-pin-line"></i>
                                <span class="badge bg-success float-end">9+</span>
                                <span> Location </span>
                            </a>
                        </li>

                        <li class="side-nav-title mt-2">Inquires</li>

                     

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth" class="side-nav-link">
                                <i class="ri-group-2-fill"></i>
                                <span> Auth Pages </span>
                                <span class="menu-arrow"><i class="bi bi-chevron-down"></i></span>
                            </a>
                            <div class="collapse" id="sidebarPagesAuth">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="auth-login.html">Login</a>
                                    </li>
                                    <li>
                                        <a href="auth-login-2.html">Login 2</a>
                                    </li>
                                    <li>
                                        <a href="auth-register.html">Register</a>
                                    </li>
                                    <li>
                                        <a href="auth-register-2.html">Register 2</a>
                                    </li>
                                    <li>
                                        <a href="auth-logout.html">Logout</a>
                                    </li>
                                    <li>
                                        <a href="auth-logout-2.html">Logout 2</a>
                                    </li>
                                    <li>
                                        <a href="auth-recoverpw.html">Recover Password</a>
                                    </li>
                                    <li>
                                        <a href="auth-recoverpw-2.html">Recover Password 2</a>
                                    </li>
                                    <li>
                                        <a href="auth-lock-screen.html">Lock Screen</a>
                                    </li>
                                    <li>
                                        <a href="auth-lock-screen-2.html">Lock Screen 2</a>
                                    </li>
                                    <li>
                                        <a href="auth-confirm-mail.html">Confirm Mail</a>
                                    </li>
                                    <li>
                                        <a href="auth-confirm-mail-2.html">Confirm Mail 2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPagesError" aria-expanded="false" aria-controls="sidebarPagesError" class="side-nav-link">
                                <i class="ri-error-warning-fill"></i>
                                <span> Error Pages </span>
                                <span class="menu-arrow"><i class="bi bi-chevron-down"></i></span>
                            </a>
                            <div class="collapse" id="sidebarPagesError">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="error-404.html">Error 404</a>
                                    </li>
                                    <li>
                                        <a href="error-404-alt.html">Error 404-alt</a>
                                    </li>
                                    <li>
                                        <a href="error-500.html">Error 500</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                                <i class="ri-layout-3-fill"></i>
                                <span> Layouts </span>
                                <span class="menu-arrow"><i class="bi bi-chevron-down"></i></span>
                            </a>
                            <div class="collapse" id="sidebarLayouts">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="layouts-horizontal.html" target="_blank">Horizontal</a>
                                    </li>
                                    <li>
                                        <a href="layouts-detached.html" target="_blank">Detached</a>
                                    </li>
                                    <li>
                                        <a href="layouts-full.html" target="_blank">Full View</a>
                                    </li>
                                    <li>
                                        <a href="layouts-fullscreen.html" target="_blank">Fullscreen View</a>
                                    </li>
                                    <li>
                                        <a href="layouts-hover.html" target="_blank">Hover Menu</a>
                                    </li>
                                    <li>
                                        <a href="layouts-compact.html" target="_blank">Compact</a>
                                    </li>
                                    <li>
                                        <a href="layouts-icon-view.html" target="_blank">Icon View</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                       

                    </ul>
                    <!--- End Sidemenu -->

                    <div class="clearfix"></div>
                </div>
            </div>

              <!-- ========== Left Sidebar Ends ========== -->