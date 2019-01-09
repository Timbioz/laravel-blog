@extends('layouts.admin')

@section('content')

    <h1>Add New Tag</h1>
    <hr>
    <form action="{{ route('admin.tags.create') }}" method="post" id="tag-create-form">
        @csrf
        <div class="form-group">
            <label for="tag-title">Title</label>
            <input type="text" class="form-control" id="tag-title" minlength="2" name="title">
        </div>
        <div class="form-group">
            <label for="tag-text">Description</label>
            <textarea type="text" class="form-control tinymce-editor" id="tag-text" name="content" rows="10"></textarea>
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
            $("#tag-create-form").validate({
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
