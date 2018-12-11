@extends('layouts.admin')

@section('content')
    <h1>Add New Category</h1>
    <hr>
    <form action="{{ route('admin.categories.create') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" class="form-control" id="category-title" name="title">
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
