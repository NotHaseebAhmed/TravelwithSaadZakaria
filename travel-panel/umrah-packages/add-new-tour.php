    <?php include_once __DIR__ . '/../includes/header.php'; ?>
    <?php include_once __DIR__ . '/../includes/sidebar.php'; ?>
    <link rel="stylesheet" href="/travelwithsaadzakaria/travel-panel/assets/css/add-room.css">
    <style>
        :root {
            --primary-color: #2563eb;
            /* Modern Blue */
            --primary-hover: #1d4ed8;
            --danger-color: #ef4444;
            --danger-hover: #dc2626;
            --success-color: #10b981;
            --success-hover: #059669;
            --bg-color: #f3f4f6;
            --card-bg: #ffffff;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --border-color: #e5e7eb;
            --radius: 8px;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        body {

            background-color: #f3f4f6;
            color: #1f2937;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 850px;
            margin: 0 auto;
        }



        .header-section p {
            color: var(--text-muted);
        }

        /* Itinerary Container */
        #itinerary-container {
            display: flex;
            flex-direction: row;
            overflow-x: scroll;
            gap: 20px;
            padding: 10px 0px 0px 0px;
            border-radius: 0px 0px 10px 10px;
            padding: 10px 0px 0px 0px;
            border: 3px solid white;
            margin-top: -5px;
        }

        /* Individual Day Card */
        .day-card {
            background: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
            padding: 25px;
            position: relative;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            animation: fadeIn 0.4s ease-out;
            min-width: 400px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .day-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--bg-color);
        }

        /* Editable Day Wrapper (Badge Style) */
        .day-input-wrapper {
            display: flex;
            align-items: center;
            background-color: var(--primary-color);
            padding: 6px 16px;
            border-radius: 20px;
            width: fit-content;
            transition: background-color 0.2s;
            cursor: text;
            /* Indicates interaction */
        }

        .day-input-wrapper:hover {
            background-color: var(--primary-hover);
        }

        /* Static Prefix "Day" */
        .day-prefix {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
            font-size: 0.95rem;
            margin-right: 6px;
            user-select: none;
            /* Prevents selecting the word "Day" */
        }

        /* Editable Number Input */
        #day-suffix-input {
            background: transparent;
            border: none;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            width: 35px;
            /* Adequate width for "1-2" or longer numbers */
            outline: none;
            height: 30px;
            text-align: end;
            margin: 0px;
            font-family: inherit;
        }

        #day-suffix-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .day-badge {
            background-color: var(--primary-color);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .remove-btn {
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 1.1rem;
            transition: color 0.2s;
        }

        .remove-btn:hover {
            color: var(--danger-color);
        }

        /* Form Layout - Stacked fields since image is gone */
        .form-stack {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Inputs */
        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-main);
        }

        .form-control {
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
            width: 100%;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
            /* Slightly taller default height */
            font-family: inherit;
        }

        /* Action Buttons */
        .actions-bar {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .btn {

            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 1rem;
            transition: background-color 0.2s, transform 0.1s;
        }

        .btn:active {
            transform: scale(0.98);
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        .btn-success {
            background-color: var(--success-color);
            color: white;
        }

        .btn-success:hover {
            background-color: var(--success-hover);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline:hover {
            background-color: rgba(37, 99, 235, 0.05);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px;
            color: var(--text-muted);
            font-style: italic;
        }
    </style>
    <div class="content-page">
        <form id="tourForm" action="save-umrah-packages.php" method="POST" enctype="multipart/form-data">

            <div class="content">


                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box justify-content-between d-flex align-items-md-center flex-md-row flex-column">
                                <h4 class="page-title">Add a new Umrah Package</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- hotel form stat -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                 <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="umrah-package-title" class="form-label">Umrah Package Title</label>
                                            <input type="text" id="umrah-package-title" name="umrah_package_title" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="umrah-package-slug" class="form-label">Umrah Package Slug</label>
                                            <input type="text" id="umrah-package-slug" name="umrah_package_slug" class="form-control" placeholder="umrah-package-slug" required>
                                            <small id="umrah-package-slug-status" class="form-text"></small>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const titleInput = document.getElementById('umrah-package-title');
                                                const slugInput = document.getElementById('umrah-package-slug');
                                                const statusMsg = document.getElementById('umrah-package-slug-status');

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
                                                        const response = await fetch('umrah-check-slug.php', {
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
                                            <label for="example-select" class="form-label">Select Package Type</label>
                                            <select class="form-select" id="example-select" name="umrah_package_type">
                                                <option value="Premium Package">Premium Package</option>
                                                <option value="Business Package">Business Package</option>
                                                <option value="Economy Package">Economy Package</option>
                                               
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <!-- MAKKAH HOTEL -->
                                            <!-- MAKKAH HOTEL -->
                                            <div>
                                                <label for="makkah_hotels">Makkah Hotel</label>
                                                <select id="makkah_hotels" name="makkah_hotel" class="js-example-basic-single" style="width:100%">
                                                    <option value="">Select Makkah Hotel</option>
                                                    <?php


                                                    $sql = " SELECT h.id, h.hotel_title,(SELECT image_path FROM hotel_images WHERE hotel_id = h.id ORDER BY id ASC LIMIT 1) AS image_path FROM hotels h JOIN locations loc ON h.location_id = loc.id WHERE loc.name = 'Makkah' ORDER BY h.hotel_title ASC ";
                                                    $res = $conn->query($sql);
                                                    if ($res && $res->num_rows) {
                                                        while ($r = $res->fetch_assoc()) {
                                                            $id = (int)$r['id'];
                                                            $title = htmlspecialchars($r['hotel_title'], ENT_QUOTES);
                                                            $img = !empty($r['image_path']) ? htmlspecialchars($r['image_path'], ENT_QUOTES) : '';
                                                            echo "<option value=\"{$id}\" data-image=\"{$img}\">{$title}</option>";
                                                        }
                                                    } else {
                                                        echo '<option value="">No Makkah hotels found</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>


                                        <div class="mb-3">

                                            <!-- MADINA HOTEL -->
                                            <div>
                                                <label for="madina_hotel">Madina Hotel</label>
                                                <select id="madina_hotel" name="madina_hotel" class="js-example-basic-single" style="width:100%">
                                                    <option value="">Select Madina Hotel</option>
                                                    <?php


                                                    $sql = "SELECT h.id, h.hotel_title,(SELECT image_path FROM hotel_images WHERE hotel_id = h.id ORDER BY id ASC LIMIT 1) AS image_path
                                                                 FROM hotels h JOIN locations loc ON h.location_id = loc.id
                                                                 WHERE loc.name = 'Madina' ORDER BY h.hotel_title ASC
                                                               ";
                                                    $res = $conn->query($sql);
                                                    if ($res && $res->num_rows) {
                                                        while ($r = $res->fetch_assoc()) {
                                                            $id = (int)$r['id'];
                                                            $title = htmlspecialchars($r['hotel_title'], ENT_QUOTES);
                                                            $img = !empty($r['image_path']) ? htmlspecialchars($r['image_path'], ENT_QUOTES) : '';
                                                            echo "<option value=\"{$id}\" data-image=\"{$img}\">{$title}</option>";
                                                        }
                                                    } else {
                                                        echo '<option value="">No Madina hotels found</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">No. of Stays At Makkah</label>
                                            <input type="number" name="stays_at_makkah" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">No. of Stays At Madina</label>
                                            <input type="number" name="stays_at_madina" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <div id="makkah_room_types" style="display: flex;flex-wrap:wrap; column-gap:20px;"></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="umrah-package-overview" class="form-label">Umrah Package Overview</label>
                                        <textarea id="umrah-package-overview" name="umrah_package_overview" class="form-control" rows="5" required></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" id="umrah-package-meta-title" name="umrah_package_meta_title" class="form-control" maxlength="60" data-toggle="maxlength">
                                    </div>

                                    <div class="mb-3">
                                        <label for="umrah-package-meta-description" class="form-label">Meta Description</label>
                                        <input type="text" id="umrah-package-meta-description" name="umrah_package_meta_description" class="form-control" maxlength="160" data-toggle="maxlength">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <div class="card">
                                            <h1 class="card-title">
                                                Upload Your Files
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

                              </div>
                            </div>



                            <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>








            <!-- Control Buttons -->
            <div class="actions-bar">
                <h1 style="font-size: 18px; font-weight: 800; color: #111827;"><i class="fa-solid fa-route"></i> Tour Itinerary Builder</h1>

                <div style="display: flex; gap:10px;">
                    <button type="button" class="btn btn-outline" style="width: fit-content;" id="addDayBtn">
                        <i class="fa-solid fa-plus"></i> Add Day
                    </button>

                    <!-- <button type="submit" class="btn btn-primary" style="width: fit-content;">
                            <i class="fa-solid fa-save"></i> Save Itinerary
                        </button> -->
                </div>
            </div>

            <!-- Container for Repeater Items -->
            <div id="itinerary-container">
                <!-- Days will be injected here via JavaScript -->
            </div>


            <div class="col-lg-12 text-end">
                <button type="submit" class="btn btn-primary mt-3">Save Hotel</button>
            </div>
        </form>

    </div>





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


    <!-- Bootstrap Maxlength Plugin js -->
    <?php include_once __DIR__ . '/../includes/footer.php'; ?>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('itinerary-container');
            const addBtn = document.getElementById('addDayBtn');
            // No longer grabbing form by ID for event listeners since we use standard submission

            // Template Function to generate HTML for a Day
            // 'dayNumber' parameter allows setting the default number (e.g., "1", "2")
            function createDayHTML(index, dayNumber) {
                return `
                <div class="day-card" data-index="${index}">
                    <div class="day-header">
                        <!-- Split Badge: Static 'Day' + Editable Input -->
                        <div class="day-input-wrapper" onclick="this.querySelector('input').focus()">
                            <span class="day-prefix">Day</span>
                            <input type="text" 
                                   class="day-suffix-input" 
                                   name="itinerary[${index}][day_number]" 
                                   value="${dayNumber}" 
                                   aria-label="Day Number">
                        </div>
                        
                        <button type="button" class="remove-btn" title="Remove this day">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                    
                    <div class="form-stack">
                        <!-- Heading Input -->
                        <div class="form-group">
                            <label for="heading-${index}">Heading / Title</label>
                            <input type="text" 
                                   id="heading-${index}" 
                                   name="itinerary[${index}][heading]" 
                                   class="form-control text-input" 
                                   placeholder="e.g. Arrival in Paris & Check-in" 
                                   required>
                        </div>

                        <!-- Description Textarea -->
                        <div class="form-group">
                            <label for="desc-${index}">Description & Activities</label>
                            <textarea 
                                id="desc-${index}" 
                                name="itinerary[${index}][description]" 
                                class="form-control text-input" 
                                placeholder="Detailed description of activities, meal plans, and logistics for this day..."
                                rows="4"></textarea>
                        </div>
                    </div>
                </div>
            `;
            }

            // Function to Add a New Day
            function addDay() {
                // Calculate what the next day number *should* be based on current count
                const currentCards = container.querySelectorAll('.day-card');
                const nextIndex = currentCards.length;
                const nextDayNumber = nextIndex + 1;

                const newDayHTML = createDayHTML(nextIndex, nextDayNumber);
                container.insertAdjacentHTML('beforeend', newDayHTML);

                // Call updateIndices to ensure IDs are perfectly sequential
                updateIndices();
            }

            // Function to Update Indices (Backend Array Keys)
            function updateIndices() {
                const cards = container.querySelectorAll('.day-card');

                if (cards.length === 0) {
                    container.innerHTML = '<div class="empty-state">No days added yet. Click "Add Day" to start.</div>';
                    return;
                }

                // Remove empty state if it exists
                const emptyState = container.querySelector('.empty-state');
                if (emptyState) emptyState.remove();

                cards.forEach((card, index) => {
                    // Update Backend Array Index
                    const arrayIndex = index;

                    // 1. Update Day Number Input Name
                    const daySuffixInput = card.querySelector('.day-suffix-input');
                    if (daySuffixInput) {
                        daySuffixInput.name = `itinerary[${arrayIndex}][day_number]`;
                        // Note: We DO NOT overwrite .value here. 
                        // This preserves custom edits (e.g., if user changed "3" to "3-4").
                    }

                    // 2. Update Heading Input
                    const headingInput = card.querySelector('input[id^="heading-"]');
                    if (headingInput) {
                        headingInput.name = `itinerary[${arrayIndex}][heading]`;
                        headingInput.id = `heading-${arrayIndex}`;
                        const headingLabel = card.querySelector(`label[for^="heading-"]`);
                        if (headingLabel) headingLabel.setAttribute('for', `heading-${arrayIndex}`);
                    }

                    // 3. Update Description Input
                    const descInput = card.querySelector('textarea[id^="desc-"]');
                    if (descInput) {
                        descInput.name = `itinerary[${arrayIndex}][description]`;
                        descInput.id = `desc-${arrayIndex}`;
                        const descLabel = card.querySelector(`label[for^="desc-"]`);
                        if (descLabel) descLabel.setAttribute('for', `desc-${arrayIndex}`);
                    }
                });
            }

            // Event Listener for Remove Buttons
            container.addEventListener('click', function(e) {
                const btn = e.target.closest('.remove-btn');
                if (!btn) return;

                if (confirm('Are you sure you want to remove this day?')) {
                    const card = btn.closest('.day-card');
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(10px)';

                    setTimeout(() => {
                        card.remove();
                        updateIndices(); // Re-index the array keys
                    }, 200);
                }
            });

            // Initialize with Day 1
            addDay();

            // Add Button Click Handler
            addBtn.addEventListener('click', addDay);

            // REMOVED: Form Submit Listener
            // The form now acts as a standard HTML form.
        });
    </script>
    <script>
        const fileInput = document.getElementById('file-input');
        const dropZone = document.getElementById('dropzone-single');
        const defaultContent = document.getElementById('default-content');
        const previewContent = document.getElementById('preview-content');
        const fileDetails = document.getElementById('file-details');

        let currentFile = null; // Stores { file: File, url: string }

        // Helper function to format file size
        const formatBytes = (bytes, decimals = 2) => {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
        };

        // --- Core Logic ---

        // Updates the file name, size, and type information below the drop zone
        const updateDetailsDisplay = (file) => {
            if (!file) {
                fileDetails.classList.add('hidden');
                fileDetails.innerHTML = '';
                return;
            }

            const size = formatBytes(file.size);
            const extension = file.name.split('.').pop().toUpperCase();

            fileDetails.innerHTML = `
                <p class="file-name">${file.name}</p>
                <div class="info-row">
                    <span>Size: <span>${size}</span></span>
                    <span>Type: <span>${extension}</span></span>
                </div>
            `;
            fileDetails.classList.remove('hidden');
        };


        const setFile = (file) => {
            // Basic validation for image type
            if (!file || !file.type.startsWith('image/')) {
                console.error("The selected file is not an image or is missing.");
                return;
            }

            // 1. Cleanup old file if it exists (memory management)
            if (currentFile && currentFile.url) {
                URL.revokeObjectURL(currentFile.url);
            }

            // 2. Create Object URL for preview and store file data
            const objectUrl = URL.createObjectURL(file);
            currentFile = {
                file: file,
                url: objectUrl
            };

            // 3. Update the UI to Preview Mode
            dropZone.classList.add('preview-mode');
            defaultContent.classList.add('hidden');
            previewContent.classList.remove('hidden');

            // 4. Insert the image and the removal button into the preview container
            previewContent.innerHTML = `
                <img src="${objectUrl}" alt="Preview of ${file.name}" class="rounded-xl" />
                <div class="remove-overlay">
                    <button id="remove-image-btn" class="remove-btn" type="button" title="Remove Image">
                        <!-- Trash Icon -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
            `;

            // Re-attach the event listener to the newly created button
            document.getElementById('remove-image-btn').addEventListener('click', removeFile);

            // 5. Update metadata display
            updateDetailsDisplay(file);
        };

        const removeFile = (e) => {
            if (e) e.preventDefault(); // Prevent default if triggered by button click
            if (!currentFile) return;

            // 1. Revoke the temporary URL to clean up memory
            URL.revokeObjectURL(currentFile.url);
            currentFile = null;
            fileInput.value = ''; // Reset the input element to allow re-uploading the same file

            // 2. Revert the UI to Default Mode
            dropZone.classList.remove('preview-mode');
            previewContent.classList.add('hidden');
            defaultContent.classList.remove('hidden');

            // 3. Clear and hide metadata
            updateDetailsDisplay(null);
        };


        // --- Event Handlers ---

        // Handle file selection from input
        fileInput.addEventListener('change', (e) => {
            const files = e.target.files;
            if (files.length > 0) {
                // Only process the first file, as this is a single upload component
                setFile(files[0]);
            }
        });

        // Handle drag and drop processing
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('drag-active');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                setFile(files[0]);
            }
        });

        // Drag & Drop events (styling)
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('drag-active');
        });

        dropZone.addEventListener('dragleave', (e) => {
            dropZone.classList.remove('drag-active');
        });

        // Initial setup on load
        window.onload = () => {
            updateDetailsDisplay(null);
        };
    </script>


    <script>
        $('#makkah_hotels').on('change', function() {
            let hotelId = $(this).val();

            $.ajax({
                url: "fetch-room-types.php",
                type: "POST",
                data: {
                    hotel_id: hotelId
                },
                success: function(response) {
                    $('#makkah_room_types').html(response);
                }
            });
        });
    </script>
    <script>
        form.addEventListener('submit', async function(e) {
            e.preventDefault(); // keep this for AJAX
            const formData = new FormData(form);

            try {
                const response = await fetch('save-umrah-packages.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json(); // assuming your PHP returns JSON
                if (result.success) {
                    alert("Package saved successfully!");
                    form.reset();
                    // optionally reset your room types / itinerary UI
                } else {
                    alert("Error: " + result.message);
                }
            } catch (error) {
                console.error(error);
                alert("Something went wrong!");
            }
        });
    </script>