@extends("layouts.admin")

@section('content')
    <h1>Add New Article</h1>
    <hr>
    <form action="{{ route("admin.posts.create") }}" method="post">
        @csrf
        <div class="form-group">
            <label for="post-title">Title</label>
            <input type="text" class="form-control" id="post-title" name="title">
        </div>
        <div class="form-group">
            <label for="post-text">Content</label>
            <textarea type="text" class="form-control" id="post-text" name="content" rows="10"></textarea>
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
@endsection
