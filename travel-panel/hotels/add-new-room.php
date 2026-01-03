    <?php include_once __DIR__ . '/../includes/header.php'; ?>
    <link rel="stylesheet" href="../assets/css/add-room.css">
    <?php include_once __DIR__ . '/../includes/sidebar.php'; ?>
    <style>
        /* Card Container */




        /* Drop Zone - Default and Hover States */
    </style>
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

                                <form id="roomForm">

                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="mb-3">
                                                <label for="room-title" class="form-label">Room Title</label>
                                                <input type="text" id="room-title" name="room_title" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Select Hotel</label>
                                                <input type="text" id="the-basics" name="hotel_name" class="form-control" placeholder="Search hotels..." autocomplete="on">
                                                <!-- HIDDEN: will be set by the typeahead select handler -->
                                                <input type="hidden" id="hotel_id" name="hotel_id" value="">
                                            </div>

                                        </div>

                                        <div class="col-lg-4">

                                            <div class="card">
                                                <h1 class="card-title">
                                                    Image Uploader with Live Preview
                                                </h1>

                                                <!-- File Drop Zone and Input -->
                                                <label id="dropzone-single" for="file-input">

                                                    <!-- Default Content (Visible when no file is selected) -->
                                                    <div id="default-content" class="flex flex-col items-center justify-center w-full h-full">
                                                        <!-- SVG Icon for Upload -->
                                                        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.884 1.157 4 4 0 01-1.157.884M16 16l-3-3m0 0l-3 3m3-3v12M17 14h6M3 14h6M5 11V7a4 4 0 014-4h6a4 4 0 014 4v4m-5 3v1m0-1a4 4 0 00-4 4"></path>
                                                        </svg>

                                                        <p class="title">Drag & Drop an Image or <span class="title-highlight">Browse</span></p>
                                                        <p class="subtitle">Only single JPG, PNG, or GIF files allowed (Max 5MB).</p>
                                                    </div>

                                                    <!-- Preview Content (Visible when a file is selected) -->
                                                    <div id="preview-content" class="preview-container hidden">
                                                        <!-- Image and Remove Button will be dynamically inserted here -->
                                                    </div>

                                                    <!-- Hidden File Input (Single Image Only) -->
                                                    <input type="file" id="file-input" name="room_image" class="hidden" accept="image/*">
                                                </label>

                                                <!-- File Details Display (Hidden by default) -->
                                                <div id="file-details" class="hidden">
                                                    <!-- File metadata will be shown here -->
                                                </div>

                                            </div>
                                        </div>








                                    </div>

                                    <div class="row">
                                        <div class="col-3">

                                            <!-- Pricing form -->
                                            <div class="card">
                                                <h2>Set New Rate Rule</h2>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="date-range">Date Range</label>
                                                            <input type="text" id="date-range" placeholder="Select date range" required />
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="price">Price per Night (USD)</label>
                                                            <input type="number" id="price" placeholder="e.g. 150" min="1" step="0.01" required />
                                                        </div>

                                                        <div class="mb-3">
                                                            <button id="save-btn" type="button">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-9">

                                            <!-- Calendar Preview -->
                                            <div class="card">
                                                <h2>Preview: Current Pricing Calendar</h2>
                                                <div id="pricing-calendar-display"></div>
                                                <p id="no-rules-message">No rules yet. Add a new rule above.</p>
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

                    </div><!-- end col-->
                    <div class="col-lg-12 text-end">
                        <button type="submit" class="btn btn-primary mt-3">Save Hotel</button>
                    </div>
                </div>
                </form>
                <div id="responseMsg"></div>

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
    <script src="../assets/js/room-upload.js"></script>
    <script>
        let rulesArray = [];
        let datePriceMap = new Map();
        let inputFlatpickrInstance;
        let displayFlatpickrInstance = null;

        function createDatePriceMap(rules) {
            const map = new Map();
            rules.forEach((rule) => {
                const start = new Date(rule.startDate);
                const end = new Date(rule.endDate);
                const current = new Date(start);
                while (current <= end) {
                    const dateStr = current.toISOString().split("T")[0];
                    map.set(dateStr, rule.price);
                    current.setDate(current.getDate() + 1);
                }
            });
            return map;
        }

        function displayPricingCalendar() {
            const container = document.getElementById("pricing-calendar-display");
            if (displayFlatpickrInstance) displayFlatpickrInstance.destroy();

            displayFlatpickrInstance = flatpickr(container, {
                inline: true,
                dateFormat: "Y-m-d",
                showMonths: 2,
                minDate: "today",
                disableMobile: true,
                onDayCreate: (dObj, dStr, fp, dayElem) => {
                    const dateStr = dayElem.dateObj.toISOString().split("T")[0];
                    const price = Number(datePriceMap.get(dateStr));
                    if (price) {
                        dayElem.classList.add("price-day");
                        dayElem.innerHTML = `
              <div>${dayElem.dateObj.getDate()}</div>
              <span>$${Math.round(price)}</span>`;
                    }
                },
            });
        }

        function handleSave() {
            const range = inputFlatpickrInstance.selectedDates;
            const priceVal = parseFloat(document.getElementById("price").value);

            if (range.length !== 2) {
                alert("Please select a valid date range.");
                return;
            }
            if (isNaN(priceVal) || priceVal <= 0) {
                alert("Please enter a valid price.");
                return;
            }

            const [start, end] = range;
            const newRule = {
                startDate: start.toISOString().split("T")[0],
                endDate: end.toISOString().split("T")[0],
                price: Math.round(priceVal),
            };

            rulesArray.push(newRule);
            datePriceMap = createDatePriceMap(rulesArray);
            document.getElementById("no-rules-message").style.display = "none";
            displayPricingCalendar();

            // Reset fields
            inputFlatpickrInstance.clear();
            document.getElementById("price").value = "";
        }

        function init() {
            inputFlatpickrInstance = flatpickr("#date-range", {
                mode: "range",
                minDate: "today",
                dateFormat: "Y-m-d",
            });

            document.getElementById("save-btn").addEventListener("click", handleSave);
            displayPricingCalendar();
        }

        window.onload = init;
    </script>


    <!-- Bootstrap Maxlength Plugin js -->
    <?php include_once __DIR__ . '/../includes/footer.php'; ?>
    <script>
        $(document).ready(function() {
            var o, e = []; // e = array of display strings
            var hotelMap = {}; // map name -> id (for quick lookup). If names duplicate, better to use object list; we'll store objects below.

            // Fetch hotels (id + name)
            $.ajax({
                url: "fetch-hotels.php", // returns JSON: [{id:1,name:"Serena"},...]
                method: "GET",
                dataType: "json",
                success: function(data) {
                    if (!Array.isArray(data)) {
                        console.error("Invalid hotel data:", data);
                        return;
                    }

                    // build mappings and display array
                    e = data.map(function(item) {
                        // handle duplicate names: store array of ids per name (rare)
                        if (!hotelMap[item.name]) hotelMap[item.name] = [];
                        hotelMap[item.name].push(item.id);
                        return item.name;
                    });

                    $("#the-basics").typeahead({
                        hint: true,
                        highlight: true,
                        minLength: 1
                    }, {
                        name: "hotels",
                        source: ((o = e),
                            function(query, process) {
                                var matches = [];
                                var substrRegex = new RegExp(query, "i");
                                $.each(o, function(i, str) {
                                    if (substrRegex.test(str)) matches.push(str);
                                });
                                process(matches);
                            }),
                    }).bind('typeahead:select', function(ev, suggestion) {
                        // suggestion is a hotel name (string)
                        // If multiple ids for same name, pick the first — or better prompt user (but usually names unique)
                        var ids = hotelMap[suggestion] || [];
                        var selectedId = ids.length ? ids[0] : '';
                        $('#hotel_id').val(selectedId);
                        // Optional visual feedback
                        console.log('Selected hotel:', suggestion, 'id=', selectedId);
                    });
                },
                error: function(xhr, status, err) {
                    console.error('fetch-hotels error', err);
                }
            });
        });



        document.getElementById('roomForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = e.target;
            const fd = new FormData();

            // Basic form fields
            const roomTitle = form.querySelector('[name="room_title"]').value.trim();
            const hotelId = form.querySelector('#hotel_id').value.trim(); // required
            const defaultPrice = document.getElementById('price').value || ''; // optional default

            if (!roomTitle) {
                alert('Please enter room title');
                return;
            }
            if (!hotelId) {
                alert('Please select a hotel from the suggestions');
                return;
            }

            fd.append('room_title', roomTitle);
            fd.append('hotel_id', hotelId);
            fd.append('price_default', defaultPrice);

            // Append pricing rules (your rulesArray must be available globally)
            // Make sure rulesArray is an array of {startDate:'YYYY-MM-DD', endDate:'YYYY-MM-DD', price:100}
            if (typeof rulesArray !== 'undefined' && Array.isArray(rulesArray) && rulesArray.length) {
                fd.append('price_rules', JSON.stringify(rulesArray));
            } else {
                fd.append('price_rules', JSON.stringify([]));
            }

            // Append image file (single)
            const fileInput = document.getElementById('file-input');
            if (fileInput && fileInput.files && fileInput.files[0]) {
                fd.append('room_image', fileInput.files[0]);
            }

            // Optional: disable button while saving
            const submitBtn = form.querySelector('button[type="submit"]') || document.querySelector('#save-room-btn');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.textContent = 'Saving...';
            }

            try {
                const res = await fetch('insert-room.php', {
                    method: 'POST',
                    body: fd
                });
                const json = await res.json();

                if (json.success) {
                    alert('Room added successfully');
                    // optionally reset form & calendar
                    form.reset();
                    rulesArray = [];
                    datePriceMap = new Map();
                    displayPricingCalendar();
                    // clear preview
                    if (typeof removeFile === 'function') removeFile(); // uses your removeFile
                } else {
                    alert('Error: ' + (json.message || 'Unknown error'));
                }
            } catch (err) {
                console.error(err);
                alert('Server error. Check console.');
            } finally {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Save Hotel';
                }
            }
        });
    </script>