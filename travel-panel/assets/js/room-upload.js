
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

