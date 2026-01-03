    <?php include_once __DIR__ . '/../includes/header.php'; ?>
    <?php include_once __DIR__ . '/../includes/sidebar.php'; ?>

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div
                            class="page-title-box justify-content-between d-flex align-items-md-center flex-md-row flex-column">
                            <h4 class="page-title">Add a new Hotel</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- hotel form stat -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Input Types</h4>
                                <p class="text-muted fs-14">
                                    Most common form control, text-based input fields. Includes support for all
                                    HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>,
                                    <code>datetime-local</code>, <code>date</code>, <code>month</code>,
                                    <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>,
                                    <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                                </p>

                                <form id="hotelForm" action="save-hotel.php" method="POST" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="hotel-title" class="form-label">Hotel Title</label>
                                                <input type="text" id="hotel-title" name="hotel_title" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="hotel-slug" class="form-label">Hotel Slug</label>
                                                <input type="text" id="hotel-slug" name="hotel_slug" class="form-control" placeholder="hotel-slug" required>
                                                <small id="slug-status" class="form-text"></small>
                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const titleInput = document.getElementById('hotel-title');
                                                    const slugInput = document.getElementById('hotel-slug');
                                                    const statusMsg = document.getElementById('slug-status');

                                                    // Convert text to slug
                                                    function generateSlug(text) {
                                                        return text
                                                            .toLowerCase()
                                                            .trim()
                                                            .replace(/[^a-z0-9\s-]/g, '')
                                                            .replace(/\s+/g, '-')
                                                            .replace(/-+/g, '-');
                                                    }

                                                    // Check slug availability via AJAX
                                                    async function checkSlugAvailability(slug) {
                                                        if (slug.length < 2) {
                                                            statusMsg.textContent = '';
                                                            return;
                                                        }

                                                        try {
                                                            const response = await fetch('check-slug.php', {
                                                                method: 'POST',
                                                                headers: {
                                                                    'Content-Type': 'application/x-www-form-urlencoded'
                                                                },
                                                                body: 'slug=' + encodeURIComponent(slug)
                                                            });
                                                            const data = await response.json();

                                                            if (data.exists) {
                                                                statusMsg.textContent = '❌ Slug already taken, try another.';
                                                                statusMsg.style.color = 'red';
                                                            } else {
                                                                statusMsg.textContent = '✅ Slug available.';
                                                                statusMsg.style.color = 'green';
                                                            }
                                                        } catch (error) {
                                                            console.error('Error checking slug:', error);
                                                        }
                                                    }

                                                    // Generate slug as title is typed
                                                    titleInput.addEventListener('input', function() {
                                                        const slug = generateSlug(this.value);
                                                        slugInput.value = slug;
                                                        checkSlugAvailability(slug);
                                                    });

                                                    // Also check when slug field is manually edited
                                                    slugInput.addEventListener('input', function() {
                                                        const slug = generateSlug(this.value);
                                                        this.value = slug;
                                                        checkSlugAvailability(slug);
                                                    });
                                                });
                                            </script>
                                            <div class="mb-3">
                                                <label for="hotel_price" class="form-label">Hotel Average Price</label>
                                                <input type="number" id="hotel_price" name="hotel_price" class="form-control" placeholder="Enter Price" data-toggle="input-mask" data-mask-format="0,000,00" data-reverse="true" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="hotel_rating" class="form-label">Hotel Rating</label>
                                                <select id="hotel_rating" name="hotel_rating" class="form-select" required>
                                                    <option value="">Select Rating</option>
                                                    <option value="1">1 Star</option>
                                                    <option value="2">2 Star</option>
                                                    <option value="3">3 Star</option>
                                                    <option value="4">4 Star</option>
                                                    <option value="5">5 Star</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="hotel_location" class="form-label">Hotel Location</label>
                                                <input type="text" id="hotel_location" name="hotel_location" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="map_link" class="form-label">Map Link (Google Maps)</label>
                                                <input type="url" id="map_link" name="map_link" class="form-control">
                                            </div>
                                        </div>
                                    <div class="col-lg-12">
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <label for="location_id">Select Location</label>
                                                    <select id="location_id" name="location_id" class="form-control select2">
                                                      <option value="">-- Choose Location --</option>
                                                      <?php
                                                        $result = $conn->query("SELECT id, name FROM locations ");
                                                        while ($row = $result->fetch_assoc()) {
                                                          echo "<option value='{$row['id']}'>" . htmlspecialchars($row['name']) . "</option>";
                                                        }
                                                      ?>
                                                    </select>
                                                  </div>
                                                  
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="hotel_overview" class="form-label">Hotel Overview</label>
                                                <textarea id="hotel_overview" name="hotel_overview" class="form-control" rows="5" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Meta Title</label>
                                                <!-- <input type="text" id="meta_title" name="meta_title" class="form-control" maxlength="60" data-toggle="maxlength"> -->
                                                <input type="text" class="form-control" placeholder="Max 25" maxlength="25" data-toggle="maxlength">
                                            </div>

                                            <div class="mb-3">
                                                <label for="meta_description" class="form-label">Meta Description</label>
                                                <input type="text" id="meta_description" name="meta_description" class="form-control" maxlength="160" data-toggle="maxlength">
                                            </div>
                                        </div>




                                    </div>



                                    <!-- end row-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div><!-- end col -->
                </div>








                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h1 class="card-title">
                                Upload Your Files
                            </h1>

                            <!-- File Drop Zone and Input -->
                            <label id="drop-zone" for="file-input">

                                <!-- SVG Icon for Upload -->
                                <svg class="file-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.884 1.157 4 4 0 01-1.157.884M16 16l-3-3m0 0l-3 3m3-3v12M17 14h6M3 14h6M5 11V7a4 4 0 014-4h6a4 4 0 014 4v4m-5 3v1m0-1a4 4 0 00-4 4"></path>
                                </svg>

                                <p class="title">Drag & Drop or <span>Browse Files</span></p>
                                <p class="subtitle">Maximum file size 5MB. Any format is fine.</p>

                                <!-- Hidden File Input -->
                                <input type="file" id="file-input" class="hidden" multiple accept="*/*">
                            </label>

                            <!-- File List Container -->
                            <div id="file-list">
                                <!-- Files will be injected here -->
                            </div>
                        </div>
                    </div><!-- end col-->
                    <div class="col-lg-12 text-end">
                        <button type="submit" class="btn btn-primary mt-3">Save Hotel</button>
                    </div>
                </div>
                </form>
                <div id="responseMsg"></div>
                <script>
                    document.getElementById('hotelForm').addEventListener('submit', async function(e) {
                        e.preventDefault();

                        const form = e.target;
                        const formData = new FormData();

                        // 1️⃣ Append all form fields (except file input)
                        const inputs = form.querySelectorAll('input, select, textarea');
                        inputs.forEach(input => {
                            if (input.type !== 'file') {
                                formData.append(input.name, input.value);
                            }
                        });

                        // 2️⃣ Append only the current active (visible) files
                        uploadedFiles.forEach((f, index) => {
                            formData.append('hotel_images[]', f.file);
                        });

                        // 3️⃣ Send request
                        try {
                            const response = await fetch('save-hotel.php', {
                                method: 'POST',
                                body: formData
                            });

                            const result = await response.json();
                            const msgDiv = document.getElementById('responseMsg');

                            if (result.success) {
                                msgDiv.innerHTML = `<div style="color:green;">✅ ${result.message}</div>`;
                                form.reset();

                                // Reset preview list
                                fileListContainer.innerHTML = '<p>No files currently selected.</p>';
                                uploadedFiles = [];
                            } else {
                                msgDiv.innerHTML = `<div style="color:red;">❌ ${result.message}</div>`;
                            }

                        } catch (error) {
                            console.error(error);
                            document.getElementById('responseMsg').innerHTML =
                                `<div style="color:red;">⚠️ Something went wrong.</div>`;
                        }
                    });
                </script>
                <!-- hotel form ends -->
            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Jidox - mannatthemes.com
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
            <h5 class="text-white m-0">Theme Settings</h5>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="card mb-0 p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                    </div>

                    <h5 class="mt-0 fs-16 fw-bold mb-3">Choose Layout</h5>
                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input id="customizer-layout01" name="data-layout" type="checkbox" value="vertical"
                                class="form-check-input">
                            <label class="form-check-label" for="customizer-layout01">Vertical</label>
                        </div>
                        <div class="form-check form-switch">
                            <input id="customizer-layout02" name="data-layout" type="checkbox" value="horizontal"
                                class="form-check-input">
                            <label class="form-check-label" for="customizer-layout02">Horizontal</label>
                        </div>
                    </div>

                    <h5 class="my-3 fs-16 fw-bold">Color Scheme</h5>

                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-light"
                                value="light">
                            <label class="form-check-label" for="layout-color-light">Light</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-dark"
                                value="dark">
                            <label class="form-check-label" for="layout-color-dark">Dark</label>
                        </div>
                    </div>

                    <div id="layout-width">
                        <h5 class="my-3 fs-16 fw-bold">Layout Mode</h5>

                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                    id="layout-mode-fluid" value="fluid">
                                <label class="form-check-label" for="layout-mode-fluid">Fluid</label>
                            </div>

                            <div id="layout-boxed">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                        id="layout-mode-boxed" value="boxed">
                                    <label class="form-check-label" for="layout-mode-boxed">Boxed</label>
                                </div>
                            </div>

                            <div id="layout-detached">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                        id="data-layout-detached" value="detached">
                                    <label class="form-check-label" for="data-layout-detached">Detached</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="my-3 fs-16 fw-bold">Topbar Color</h5>

                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-topbar-color"
                                id="topbar-color-light" value="light">
                            <label class="form-check-label" for="topbar-color-light">Light</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-topbar-color"
                                id="topbar-color-dark" value="dark">
                            <label class="form-check-label" for="topbar-color-dark">Dark</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-topbar-color"
                                id="topbar-color-brand" value="brand">
                            <label class="form-check-label" for="topbar-color-brand">Brand</label>
                        </div>
                    </div>

                    <div>
                        <h5 class="my-3 fs-16 fw-bold">Menu Color</h5>

                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-menu-color"
                                    id="leftbar-color-light" value="light">
                                <label class="form-check-label" for="leftbar-color-light">Light</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-menu-color"
                                    id="leftbar-color-dark" value="dark">
                                <label class="form-check-label" for="leftbar-color-dark">Dark</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-menu-color"
                                    id="leftbar-color-brand" value="brand">
                                <label class="form-check-label" for="leftbar-color-brand">Brand</label>
                            </div>
                        </div>
                    </div>

                    <div id="sidebar-size">
                        <h5 class="my-3 fs-16 fw-bold">Sidebar Size</h5>

                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                    id="leftbar-size-default" value="default">
                                <label class="form-check-label" for="leftbar-size-default">Default</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                    id="leftbar-size-compact" value="compact">
                                <label class="form-check-label" for="leftbar-size-compact">Compact</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                    id="leftbar-size-small" value="condensed">
                                <label class="form-check-label" for="leftbar-size-small">Condensed</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                    id="leftbar-size-small-hover" value="sm-hover">
                                <label class="form-check-label" for="leftbar-size-small-hover">Hover View</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                    id="leftbar-size-full" value="full">
                                <label class="form-check-label" for="leftbar-size-full">Full Layout</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                    id="leftbar-size-fullscreen" value="fullscreen">
                                <label class="form-check-label" for="leftbar-size-fullscreen">Fullscreen Layout</label>
                            </div>
                        </div>
                    </div>

                    <div id="layout-position">
                        <h5 class="my-3 fs-16 fw-bold">Layout Position</h5>

                        <div class="btn-group checkbox" role="group">
                            <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed"
                                value="fixed">
                            <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                            <input type="radio" class="btn-check" name="data-layout-position"
                                id="layout-position-scrollable" value="scrollable">
                            <label class="btn btn-soft-primary w-sm ms-0"
                                for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>

                    <div id="sidebar-user">
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <label class="fs-16 fw-bold m-0" for="sidebaruser-check">Sidebar User Info</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" name="sidebar-user"
                                    id="sidebaruser-check">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                </div>
                <div class="col-6">
                    <a href="#" role="button" class="btn btn-primary w-100">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Maxlength Plugin js -->
    <?php include_once __DIR__ . '/../includes/footer.php'; ?>

      <!-- Admin Jss -->
  <script src="../assets/js/admin.js"></script>   