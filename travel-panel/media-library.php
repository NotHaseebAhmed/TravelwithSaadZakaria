<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <!-- Main Application Container -->
                    <div id="app">
                        <div class="top-heading">
                            <h1 class="text-3xl font-extrabold">Media Library</h1>

                        </div>

                        <!-- Loading & Error States (Toggle visibility with your PHP/JS) -->
                        <div id="loading" class="text-center py-20 text-xl font-medium hidden">
                            <svg class="h-8 w-8 mx-auto" style="color: #4f46e5;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <p class="mt-4">Loading Library...</p>
                        </div>

                        <div id="errorMsg" class="hidden card" style="background-color: #fef2f2; border-color: #f87171; color: #b91c1c; padding: 1rem 1.5rem; margin-bottom: 1.5rem;" role="alert">
                            <strong class="font-bold">Error:</strong>
                            <span id="errorText" style="display: block;">Error message will appear here.</span>
                        </div>

                        <!-- Media Grid: Your PHP must iterate and inject .media-item divs here -->
                        <?php
                        include 'includes/connection.php';

                        $sql = "SELECT * FROM hotel_images ORDER BY uploaded_at DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0): ?>
                            <div id="mediaGrid">
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <div class="media-item card" data-id="<?= $row['id']; ?>">
                                        <div style="width:100%;height:8rem;overflow:hidden;border-radius:0.5rem;margin-bottom:0.5rem;">
                                            <img src="/travelwithsaadzakaria/travel-panel/assets/uploads/hotels/<?= $row['image_path']; ?>"
                                                alt="<?= $row['image_alt_text']; ?>"
                                                onerror="this.src='https://placehold.co/100x100/94a3b8/ffffff?text=Error'">
                                        </div>
                                        <p title="<?= $row['image_title']; ?>"><?= $row['image_title']; ?></p>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php else: ?>
                            <div id="emptyState" class="text-center py-20">
                                <h3 class="mt-4 text-lg font-medium">No Images Yet</h3>
                                <p class="mt-1 text-sm">Click "Add New Image" to get started.</p>
                            </div>
                        <?php endif; ?>


                        <!-- Empty State (Toggle visibility with your PHP/JS) -->
                        <div id="emptyState" class="hidden text-center py-20">
                            <svg class="w-16 h-16 mx-auto" style="color: #9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <h3 class="mt-4 text-lg font-medium" style="color: #1f2937;">No Images Yet</h3>
                            <p class="mt-1 text-sm" style="color: #6b7280;">Click "Add New Image" to get started.</p>
                        </div>

                    </div>

                    <!-- Edit/Action Modal (Starts hidden) -->
                    <div id="imageModal" class="modal-overlay hidden">
                        <div class="modal-container">
                            <!-- PREVIOUS BUTTON: Used for navigation -->
                            <button id="prevArrow" class="modal-nav-arrow left" title="Previous Image" disabled>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>

                            <div class="modal-content card">
                                <div style="width: 314px;">
                                    <h2 class="text-xl font-bold" style="margin-bottom: 1.5rem; color: #1f2937;">Edit Media Details</h2>

                                    <!-- Image container: Update the src/alt attributes when opening the modal -->
                                    <img id="modalImage" alt="Preview Image" src="\travel-panel\assets\uploads\hotels\1761434988_mecca-worth-elite-hotel-photo-1.jpeg">
                                </div>

                                <div>
                                    <form id="editForm">
                                        <input type="hidden" id="imageIdHidden" name="image_id" value="">

                                        <div class="form-group">
                                            <label for="editName" class="form-label">Image Name</label>
                                            <input type="text" id="editName" name="image_name" required placeholder="Enter a descriptive name">
                                        </div>
                                        <div class="form-group">
                                            <label for="editAltText" class="form-label">Alt Text (Accessibility)</label>
                                            <textarea id="editAltText" name="alt_text" rows="3" placeholder="Describe the image content for screen readers"></textarea>
                                        </div>

                                        <div class="flex-container justify-between items-center" style="padding-top: 1rem;">
                                            <div class="flex-container space-x-3">
                                                <!-- Update/Save Action -->
                                                <button type="submit" class="btn btn-primary" style="padding: 10px" ;>
                                                    Save Changes
                                                </button>
                                                <!-- Download Action: Now fully functional in JS -->
                                                <button type="button" id="downloadBtn" class="btn btn-secondary">
                                                    Download
                                                </button>

                                                <!-- Delete Action -->
                                                <button type="button" id="deleteBtn" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </div>


                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- NEXT BUTTON: Used for navigation -->
                            <button id="nextArrow" class="modal-nav-arrow right" title="Next Image" disabled>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Confirmation Modal (for Delete - Starts hidden) -->
                    <div id="confirmationModal" class="modal-overlay hidden">
                        <div class="modal-container" style="max-width: 400px;">
                            <div class="modal-content card">
                                <h2 class="text-xl font-bold" style="margin-bottom: 1rem; color: #1f2937;">Confirm Deletion</h2>
                                <p style="color: #6b7280; margin-bottom: 1.5rem;">Are you sure you want to delete this image? This action cannot be undone.</p>

                                <div class="flex-container justify-between space-x-3">
                                    <button type="button" id="cancelDeleteBtn" class="btn btn-light">
                                        Cancel
                                    </button>
                                    <!-- Use this button ID to execute the final deletion logic -->
                                    <button type="button" id="confirmDeleteBtn" class="btn btn-danger">
                                        Yes, Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
    <script>
   const mediaGrid = document.getElementById('mediaGrid');
const imageModal = document.getElementById('imageModal');
const confirmationModal = document.getElementById('confirmationModal');
const modalImage = document.getElementById('modalImage');
const editName = document.getElementById('editName');
const editAltText = document.getElementById('editAltText');
const imageIdHidden = document.getElementById('imageIdHidden');
const prevArrow = document.getElementById('prevArrow');
const nextArrow = document.getElementById('nextArrow');

// Store all image elements dynamically
let images = Array.from(document.querySelectorAll('.media-item'));
let currentIndex = -1;

// Open modal
function openModal(index) {
    currentIndex = index;
    const item = images[index];
    const img = item.querySelector('img');
    const title = item.querySelector('p').textContent;
    const id = item.dataset.id;

    modalImage.src = img.src;
    modalImage.alt = img.alt;
    editName.value = title;
    editAltText.value = img.alt;
    imageIdHidden.value = id;

    prevArrow.disabled = index === 0;
    nextArrow.disabled = index === images.length - 1;

    imageModal.classList.remove('hidden');
    setTimeout(() => imageModal.classList.add('open'), 10);
}

// Close modal
function closeModal(modal) {
    modal.classList.remove('open');
    setTimeout(() => modal.classList.add('hidden'), 300);
}

// Event listeners for image click
images.forEach((item, index) => {
    item.addEventListener('click', () => openModal(index));
});

// Download
document.addEventListener('DOMContentLoaded', function() {
    const downloadBtn = document.getElementById('downloadBtn');

    downloadBtn?.addEventListener('click', function() {
        // Get image path (assuming your modal image has id="modalImage")
        const image = document.getElementById('modalImage');
        const imageUrl = image?.getAttribute('src');

        if (!imageUrl) {
            alert('No image found to download!');
            return;
        }

        // Create a temporary link element
        const link = document.createElement('a');
        link.href = imageUrl;
        link.download = imageUrl.substring(imageUrl.lastIndexOf('/') + 1); // extract file name
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });
});


// Keyboard Escape close
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        [imageModal, confirmationModal].forEach(m => {
            if (m.classList.contains('open')) closeModal(m);
        });
    }
});

// Modal navigation
prevArrow.addEventListener('click', () => {
    if (currentIndex > 0) openModal(currentIndex - 1);
});
nextArrow.addEventListener('click', () => {
    if (currentIndex < images.length - 1) openModal(currentIndex + 1);
});

// Save Changes
document.getElementById('editForm').addEventListener('submit', e => {
    e.preventDefault();
    const formData = new FormData(e.target);
    formData.append('action', 'update');

    fetch('ajax-media.php', {
        method: 'POST',
        body: formData
    })
    .then(r => r.json())
    .then(res => {
        if (res.status === 'success') {
            const item = images[currentIndex];
            item.querySelector('p').textContent = formData.get('image_name');
            item.querySelector('img').alt = formData.get('alt_text');
            alert('✅ Updated successfully!');
            closeModal(imageModal);
        } else {
            alert('❌ Error updating image.');
        }
    });
});

// Delete Button → open confirmation modal
document.getElementById('deleteBtn').addEventListener('click', () => {
    closeModal(imageModal);
    confirmationModal.classList.remove('hidden');
    setTimeout(() => confirmationModal.classList.add('open'), 10);
});

// Cancel delete
document.getElementById('cancelDeleteBtn').addEventListener('click', () => {
    closeModal(confirmationModal);
    openModal(currentIndex);
});

// Confirm delete
document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
    const id = imageIdHidden.value;
    const formData = new FormData();
    formData.append('action', 'delete');
    formData.append('image_id', id);

    fetch('ajax-media.php', {
        method: 'POST',
        body: formData
    })
    .then(r => r.json())
    .then(res => {
        if (res.status === 'deleted') {
            document.querySelector(`[data-id="${id}"]`).remove();
            images = Array.from(document.querySelectorAll('.media-item'));
            alert('🗑️ Image deleted successfully.');
            closeModal(confirmationModal);
        }
    });
});

    </script>
    </body>

    </html>