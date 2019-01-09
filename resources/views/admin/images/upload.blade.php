@extends('layouts.admin')

@section('content')

    <h1>Add New Image</h1>

    <div id="image-upload" class="row">

        <div class="col-3">
            <div id="image-preview">
                <img src="https://via.placeholder.com/300" alt="#">
            </div>
            <button id="browse-btn" type="button" class="btn btn-info">Browse...</button>
            <button id="remove-btn" type="button" class="btn btn-danger" style="display: none">Remove...</button>
        </div>

        <div class="col-9">
            <div id="image-properties">
                <div id="filename" class="alert alert-secondary" role="alert">
                    Image filename: &nbsp;
                    <span>Browse file...</span>
                </div>
                <div id="size" class="alert alert-secondary" role="alert">
                    Image size: &nbsp;
                    <span>Browse file...</span>
                </div>
            </div>
            <br>
            <h3>Image properties</h3>
            <hr>
            <ul id="errors"></ul>
            <form id="image-upload-form" action="{{ route('admin.images.store') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <input id="image-upload-input" type="file" class="form-control" name="image" hidden="hidden">
                <div class="form-group">
                    <label for="image-name">Name</label>
                    <input type="text" class="form-control" id="image-name" minlength="2" name="name">
                </div>
                <div class="form-group">
                    <label for="image-alt">Alt text</label>
                    <input type="text" class="form-control" id="image-alt" minlength="2" name="alt">
                </div>
                <div class="form-group">
                    <label for="image-title">Title text</label>
                    <input type="text" class="form-control" id="image-title" minlength="2" name="title">
                </div>
                <button type="submit" class="btn btn-success">Upload</button>
            </form>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

    @push('view_scripts')
        <script>

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

            $('#image-upload-form').validate({
                ignore: [],
                errorLabelContainer: '#errors',
                wrapper: 'li',
                rules: {
                    image: {
                        required: true,
                        accept: "image/*",
                    }
                },
            });


        </script>
    @endpush


@endsection
