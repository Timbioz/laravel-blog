@extends('layouts.admin')

@section('content')

    <h1>Add New Article</h1>
    <hr>
    <form action="{{ route('admin.posts.create') }}" method="post" id="post-create-form">
        @csrf
        <div class="form-group">
            <label for="post-title">Title</label>
            <input type="text" class="form-control" id="post-title" minlength="2" name="title">
        </div>
        <div class="form-group">
            <label for="category-selection">Category</label>
            <select class="form-control" id="category-selection" name="category_id">
                <option disabled selected value>-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags-selection">Tags</label>
            <select class="form-control" id="tags-selection" name="tags_ids[]" multiple="multiple">
                {{--<option disabled selected value>-- Select Tags --</option>--}}
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="post-text">Content</label>
            <textarea type="text" class="form-control tinymce-editor" id="post-text" name="content" rows="10"></textarea>
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
            $("#post-create-form").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 5
                    }
                },
            });

            tinymce.init({
                selector: 'textarea.tinymce-editor',
                skin: false,
                plugins: [
                    "advlist autolink link image imagetools lists charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                ],
                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                image_advtab: true,
                relative_urls: false,

                external_filemanager_path: "/vendor/filemanager/",
                filemanager_title: "Responsive Filemanager",
            });

            $('#tags-selection').select2({

            });
        </script>
    @endpush

@endsection
