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

                                <form id="car-rentalForm" action="save-car-rental.php" method="POST" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="room-title" class="form-label">Room Title</label>
                                                <input type="text" id="room-title" name="car_rental_title" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="room-slug" class="form-label">Hotel Slug</label>
                                                <input type="text" id="room-slug" name="car_rental_slug" class="form-control" placeholder="hotel-slug" required>
                                                <small id="room-slug-status" class="form-text"></small>
                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const titleInput = document.getElementById('room-title');
                                                    const slugInput = document.getElementById('room-slug');
                                                    const statusMsg = document.getElementById('room-slug-status');

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
                                                            const response = await fetch('room-check-slug.php', {
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
                                           
                                        </div>
                                        <div class="col-lg-6">
                                              <div class="mb-3">
                                                <label for="car-rental-price" class="form-label">Car rental Average Price</label>
                                                <input type="number" id="car-rental-price" name="car_rental_price" class="form-control" placeholder="Enter Price" data-toggle="input-mask" data-mask-format="0,000,00" data-reverse="true" required>
                                            </div>
                                            <div class="mb-3">
                                                   <div class="form-group">
                                                    <label for="location_id">Select Location</label>
                                                    <select id="location_id" name="route_id" class="form-control select2">
                                                      <option value="">-- Choose Location --</option>
                                                      <?php
                                                        $result = $conn->query("SELECT id, pickup_location, dropoff_location FROM car_rentals_routes ORDER BY pickup_location ASC");
                                                        while ($row = $result->fetch_assoc()) {
                                                          echo "<option value='{$row['id']}'>" . htmlspecialchars($row['pickup_location']) . " to " . htmlspecialchars($row['dropoff_location']) . "</option>";
                                                        }
                                                      ?>
                                                    </select>
                                                  </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-6">
                                             <div class="mb-3">
                                               <div class="form-group">
                                                 <label for="car-rental-price" class="form-label">No. of Persons</label>
                                                <select name="car_capacity" id="" class="form-control">
                                                    <option value="4-5">4-5</option>
                                                    <option value="7-9">7-9</option>
                                                    <option value="15-17">15-17</option>
                                                    <option value="27-30">27-30</option>

                                                   
                                                </select>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="car-rental-overview" class="form-label">Hotel Overview</label>
                                                <textarea id="car-rental-overview" name="car_rental_overview" class="form-control" rows="5" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Meta Title</label>
                                                <input type="text" id="room-meta-title" name="car_meta_title" class="form-control" maxlength="60" data-toggle="maxlength">
                                            </div>

                                            <div class="mb-3">
                                                <label for="meta_description" class="form-label">Meta Description</label>
                                                <input type="text" id="room-meta-description" name="car_meta_description" class="form-control" maxlength="160" data-toggle="maxlength">
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
                    document.getElementById('car-rentalForm').addEventListener('submit', async function(e) {
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
                            formData.append('car_rental_images[]', f.file);
                        });

                        // 3️⃣ Send request
                        try {
                            const response = await fetch('save-car-rental.php', {
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

   
    <!-- Bootstrap Maxlength Plugin js -->
    <?php include_once __DIR__ . '/../includes/footer.php'; ?>

<script>
    const fileInput = document.getElementById('file-input');
const dropZone = document.getElementById('drop-zone');
const fileListContainer = document.getElementById('file-list');

// Stores file objects, their unique IDs, and temporary object URLs for preview cleanup
let uploadedFiles = [];

// Helper function to format file size
const formatBytes = (bytes, decimals = 2) => {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
};

// Function to create a file item element
const createItemHTML = (file, fileId, objectUrl) => {
    const size = formatBytes(file.size);
    const type = file.type || 'N/A';
    const extension = file.name.split('.').pop();

    let fileAssetHTML;

    if (objectUrl) {
        // Use image tag for preview if an objectUrl is provided
        fileAssetHTML = `
                    <div class="file-thumbnail">
                        <img src="${objectUrl}" alt="${file.name}" />
                    </div>
                `;
    } else {
        // For all other file types, use the SVG icon
        let iconClass = 'icon-default';
        if (type.startsWith('video/')) {
            iconClass = 'icon-video';
        } else if (type === 'application/pdf') {
            iconClass = 'icon-pdf';
        }

        fileAssetHTML = `
                    <svg class="file-icon ${iconClass}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                 `;
    }


    const item = document.createElement('div');
    item.className = 'file-item';
    item.setAttribute('data-file-id', fileId);

    item.innerHTML = `
                <!-- File Details -->
                <div class="file-details">
                    ${fileAssetHTML}
                    <div class="file-info">
                        <p class="file-name">${file.name}</p>
                        <div class="file-metadata">
                            <span>Size: <span class="value">${size}</span></span>
                            <span>Type: <span class="value">${extension.toUpperCase()}</span></span>
                        </div>
                    </div>
                </div>

                <!-- Action Button (Remove) -->
                <button data-file-id="${fileId}" class="remove-file-btn">
                    <!-- Icon for Remove (Trash) -->
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            `;
    return item;
};

// Function to render the ENTIRE combined file list
const renderFiles = (filesToRender) => {
    // CRITICAL STEP 1: Revoke all existing Object URLs before rebuilding
    // This prevents memory leaks from old, unused previews
    uploadedFiles.forEach(f => {
        if (f.objectUrl) {
            URL.revokeObjectURL(f.objectUrl);
        }
    });

    // CRITICAL STEP 2: Reset the list containers
    fileListContainer.innerHTML = '';
    uploadedFiles = []; // Reset conceptual list for a fresh build

    if (filesToRender.length === 0) {
        fileListContainer.innerHTML = `<p>No files currently selected.</p>`;
        return;
    }

    // CRITICAL STEP 3: Rebuild the UI and the internal state array
    filesToRender.forEach((file, index) => {
        const fileId = Date.now() + index + Math.random() * 1000; // More unique ID
        let objectUrl = null;

        if (file.type.startsWith('image/')) {
            objectUrl = URL.createObjectURL(file);
        }

        const item = createItemHTML(file, fileId, objectUrl);
        fileListContainer.appendChild(item);

        // Re-populate uploadedFiles with the new combined set
        uploadedFiles.push({ id: fileId, file: file, objectUrl: objectUrl });
    });

    // CRITICAL STEP 4: Attach event listeners to the new remove buttons
    document.querySelectorAll('.remove-file-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const idToRemove = parseFloat(e.currentTarget.getAttribute('data-file-id'));
            removeItem(idToRemove);
        });
    });
};

// Function to combine existing files with new files and trigger a re-render
const handleNewFiles = (newFiles) => {
    if (newFiles.length === 0) return;

    // Extract just the File objects from the current internal tracking array
    const existingFileObjects = uploadedFiles.map(f => f.file);

    // Combine existing files with the new selection (FileList converted to Array)
    const combinedFiles = [...existingFileObjects, ...Array.from(newFiles)];

    // Re-render the entire list based on the combined array
    renderFiles(combinedFiles);
};

// Function to remove a file item
const removeItem = (fileId) => {
    const itemElement = document.querySelector(`.file-item[data-file-id="${fileId}"]`);
    if (itemElement) {

        const fileToRemove = uploadedFiles.find(f => f.id === fileId);

        // Visually hide the item with a fade-out effect
        itemElement.style.opacity = '0';
        itemElement.style.transform = 'translateX(50px)';

        setTimeout(() => {
            itemElement.remove();

            // Revoke Object URL if it exists (important for memory management)
            if (fileToRemove && fileToRemove.objectUrl) {
                URL.revokeObjectURL(fileToRemove.objectUrl);
            }

            // Filter the conceptual file list
            uploadedFiles = uploadedFiles.filter(f => f.id !== fileId);

            // Update the display if the list becomes empty
            if (uploadedFiles.length === 0) {
                fileListContainer.innerHTML = `<p>No files currently selected.</p>`;
            }
        }, 300);
    }
};

// --- Event Handlers ---

// 1. Handle file selection via the input click
fileInput.addEventListener('change', (e) => {
    const newFiles = e.target.files;
    if (newFiles.length > 0) {
        handleNewFiles(newFiles);
    }
    // CRITICAL FIX: Clear the input value so selecting the same file(s) again triggers 'change'
    e.target.value = '';
});

// 2. Drag & Drop events (styling)
dropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZone.classList.add('drag-active');
});

dropZone.addEventListener('dragleave', (e) => {
    dropZone.classList.remove('drag-active');
});

// 3. Drag & Drop events (file processing)
dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropZone.classList.remove('drag-active');

    const newFiles = e.dataTransfer.files;
    if (newFiles.length > 0) {
        handleNewFiles(newFiles);
    }
});

// Initial call to show empty state
window.onload = () => {
    renderFiles([]);
};


</script>