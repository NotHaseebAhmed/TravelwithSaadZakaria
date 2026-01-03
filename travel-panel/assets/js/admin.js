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

