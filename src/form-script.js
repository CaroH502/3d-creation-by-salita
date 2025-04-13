// File upload functionality
document.addEventListener('DOMContentLoaded', function() {
    const dropzone = document.getElementById('dropzone');
    const fileInput = document.getElementById('file-input');
    const uploadBtn = document.getElementById('upload-btn');
    
    if (uploadBtn) {
        uploadBtn.addEventListener('click', () => {
            fileInput.click();
        });
    }
    
    if (dropzone) {
        dropzone.addEventListener('click', () => {
            fileInput.click();
        });
        
        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.classList.add('border-white');
        });
        
        dropzone.addEventListener('dragleave', () => {
            dropzone.classList.remove('border-white');
        });
        
        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('border-white');
            
            if (e.dataTransfer.files.length) {
                fileInput.files = e.dataTransfer.files;
                updateFileList();
            }
        });
    }
    
    if (fileInput) {
        fileInput.addEventListener('change', () => {
            updateFileList();
        });
    }
    
    function updateFileList() {
        const files = fileInput.files;
        if (files.length > 0) {
            // Remove any existing file list
            const existingList = dropzone.querySelector('.file-list');
            if (existingList) {
                existingList.remove();
            }
            
            let fileListHTML = '<div class="file-list mt-4 text-left">';
            fileListHTML += '<p class="font-semibold mb-2">Fichiers sélectionnés:</p>';
            fileListHTML += '<ul class="list-disc pl-5">';
            
            for (let i = 0; i < files.length; i++) {
                fileListHTML += `<li>${files[i].name}</li>`;
            }
            
            fileListHTML += '</ul></div>';
            
            // Update the dropzone content
            dropzone.insertAdjacentHTML('beforeend', fileListHTML);
        }
    }
});