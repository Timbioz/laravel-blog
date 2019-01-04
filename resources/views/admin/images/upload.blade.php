@extends('layouts.admin')

@section('content')

    <h1>Add New Image</h1>

    <div class="row">

        <form action="{{ route('admin.images.store') }}" class="dropzone" method="post" id="images">
            @csrf

            <div class="col-1">
                <div id="image-preview">

                </div>
            </div>

            <div class="form-group">
                <label for="image-upload">Title</label>
                <input type="file" class="form-control" id="image-upload" name="image">
            </div>

            <button type="button" class="btn btn-secondary" id="ter">Remove</button>
            <img id="blah" src="#" style="display: none" alt="your image" />

            <div class="form-group">
                <label for="post-title">Title</label>
                <input type="text" class="form-control" id="post-title" minlength="2" name="title">
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
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>




    @push('view_scripts')
        <script>

            let imagePreview = document.querySelector('#blah');
            let inputImage = document.getElementById('image-upload');

            function readURL(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            document.getElementById('ter').addEventListener('click', function () {
                inputImage.value = '';
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            });

            document.getElementById('image-upload').addEventListener('change', function () {
                readURL(this);
            });

        </script>
    @endpush

@endsection
