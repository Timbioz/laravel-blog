let imagePreview = document.querySelector('#image-preview img');
let imageInput = document.getElementById('image-upload-input');
let browseBtn = document.getElementById('browse-btn');
let removeBtn = document.getElementById('remove-btn');
let filenameField = document.querySelector('#filename span');
let sizeField = document.querySelector('#size span');

function previewImage(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        let file = input.files[0];
        reader.onload = function (e) {
            imagePreview.src = e.target.result;
            filenameField.textContent = file.name;
            sizeField.textContent = file.size;
        };

        reader.readAsDataURL(input.files[0]);
    }
}

removeBtn.addEventListener('click', function () {
    imageInput.value = '';
    imagePreview.src = 'https://via.placeholder.com/300';
    filenameField.textContent = '';
    sizeField.textContent = '';
    browseBtn.style.display = 'inline-block';
    removeBtn.style.display = 'none';
});

browseBtn.addEventListener('click', function () {
    imageInput.click();
});

imageInput.addEventListener('change', function () {
    removeBtn.style.display = 'inline-block';
    browseBtn.style.display = 'none';
    previewImage(this);
});
