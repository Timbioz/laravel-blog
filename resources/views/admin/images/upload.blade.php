@extends('layouts.admin')

@section('content')

    <h1>Add New Image</h1>

    <div id="image-upload-form" class="row">
        @csrf

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


            <form action="{{ route('admin.images.store') }}" method="post">
                <input id="image-upload-input" type="file" class="form-control" name="image" style="display: none">
                <button type="button" class="btn btn-secondary" id="ter">Remove</button>
                <img id="blah" src="#" style="display: none" alt="your image"/>

                <div class="form-group">
                    <label for="post-title">Title</label>
                    <input type="text" class="form-control" id="post-title" minlength="2" name="title">
                </div>
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
        <button type="submit" class="btn btn-primary">Save</button>
    </div>




    @push('view_scripts')
        <script>

        </script>
    @endpush

@endsection
