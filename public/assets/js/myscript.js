const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const imagePreviewContainer = document.getElementById('image-preview-container');

    imageInput.addEventListener('change', function () {
        imagePreview.innerHTML = '';

        for (let i = 0; i < this.files.length; i++) {
            const file = this.files[i];
            const reader = new FileReader();
            const previewImage = document.createElement('img');

            reader.onload = function () {
                previewImage.src = reader.result;
            }

            reader.readAsDataURL(file);

            previewImage.classList.add('avatar-img', 'me-2');
            imagePreview.appendChild(previewImage);
        }

        imagePreviewContainer.style.display = 'block';
    });

    imageInput.addEventListener('click', function () {
        this.value = null;
    });

    const closeButton = document.getElementById('close-button');
    closeButton.addEventListener('click', function () {
        imagePreview.innerHTML = '';
        imageInput.value = null;
        imagePreviewContainer.style.display = 'none';
    });

    imageInput.addEventListener('change', function () {
        if (this.files.length === 0) {
            imagePreviewContainer.style.display = 'none';
            return;
        }

        const file = this.files[0];
        const fileName = file.name;
        const fileSize = file.size / 1024 / 1024; // Convert to MB

        const fileNameElement = document.getElementById('file-name');
        fileNameElement.textContent = fileName;

        const fileSizeElement = document.getElementById('file-size');
        fileSizeElement.textContent = fileSize.toFixed(2) + ' MB';
    });

    imageInput.addEventListener('click', function () {
        this.value = null;
    });