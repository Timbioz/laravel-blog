@extends('layouts.admin')

@section('content')
    <h1>Add New Tag</h1>
    <hr>
    <form action="{{ route('admin.categories.create') }}" method="post" id="category-create-form">
        @csrf
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" class="form-control" id="category-title" minlength="2" name="title">
        </div>
        <div class="form-group">
            <label for="category-text">Description</label>
            <textarea type="text" class="form-control tinymce-editor" id="category-text" name="content" rows="10"></textarea>
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @push('view_scripts')
        <script>
            $("#category-create-form").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 5
                    }
                },
            });
        </script>
    @endpush

@endsection
