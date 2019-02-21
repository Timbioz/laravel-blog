@extends('layouts.admin')

@section('content')

    <h1>Add New Tag</h1>
    <hr>
    <form action="{{ route('admin.tags.create') }}" method="post" id="tag-create-form">
    @csrf

    <!--<editor-fold desc="Title Folder">-->

        <div class="form-group">
            <label for="tag-title">Title</label>
            <input type="text" class="form-control" id="tag-title" minlength="2" name="title">
        </div>

        <!--</editor-fold>-->

        <!--<editor-fold desc="Slug Folder">-->

        <div class="form-group">
            <label for="tag-slug">Slug</label>
            <input type="text" class="form-control" id="tag-slug" name="slug"/>
        </div>

        <!--</editor-fold>-->

        <!--<editor-fold desc="Descriptions Folder">-->

        <div class="descriptions collapsible-block">
            <a class="collapsible collapse-trigger" data-toggle="collapse" href="#descriptions-collapsible" role="button" aria-expanded="false">
                <i class="fas fa-caret-right"></i> <span>Descriptions</span>
            </a>
            <div class="collapse" id="descriptions-collapsible">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="short-descr-tab-nav" data-toggle="tab" href="#short-descr" role="tab">Short</a>
                        <a class="nav-item nav-link" id="descr-tab-nav" data-toggle="tab" href="#descr" role="tab">Full</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="short-descr" role="tabpanel" aria-labelledby="short-descr-tab">
                        <textarea type="text" data-max-symbols="55" class="form-control tinymce-editor" id="tag-text" name="description-short" rows="2"></textarea>
                    </div>
                    <div class="tab-pane fade" id="descr" role="tabpanel" aria-labelledby="descr-tab">
                        <textarea type="text" class="form-control tinymce-editor" id="tag-text" name="description" rows="4"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!--</editor-fold>-->

        <!--<editor-fold desc="Seo Folder">-->

        <div class="seo collapsible-block">
            <a class="collapsible collapse-trigger" data-toggle="collapse" href="#seo-collapsible"
               role="button" aria-expanded="false">
                <i class="fas fa-caret-right"></i> <span>Seo</span>
            </a>
            <div class="collapse" id="seo-collapsible">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="seo-title-tab" data-toggle="tab" href="#seo-title" role="tab" aria-selected="true">Seo Title tag</a>
                        <a class="nav-item nav-link" id="seo-descr-tab" data-toggle="tab" href="#seo-descr" role="tab" aria-selected="false">Seo Description tag</a>
                        <a class="nav-item nav-link" id="seo-keyw-tab" data-toggle="tab" href="#seo-keyw" role="tab" aria-selected="false">Seo Keywords tag</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="seo-title" role="tabpanel" aria-labelledby="seo-title-tab">
                        <textarea type="text" data-max-symbols="55" class="form-control tinymce-editor" id="tag-text" name="seo-title" rows="2"></textarea>
                    </div>
                    <div class="tab-pane fade" id="seo-descr" role="tabpanel" aria-labelledby="seo-descr-tab">
                        <textarea type="text" class="form-control tinymce-editor" id="tag-text" name="seo-description" rows="4"></textarea>
                    </div>
                    <div class="tab-pane fade" id="seo-keyw" role="tabpanel" aria-labelledby="seo-keyw-tab">
                        <textarea type="text" class="form-control tinymce-editor" id="tag-text" name="seo-keywords" rows="4"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!--</editor-fold>-->

        <!--<editor-fold desc="Errors Folder">-->

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

    <!--</editor-fold>-->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!--<editor-fold desc="Scripts Folder">-->

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

            $('#tags-selection').select2({});
        </script>
    @endpush

    <!--</editor-fold>-->

@endsection
