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

    <div id="summernote"></div>


    @push('head_scripts')

    @endpush

    @push('view_scripts')
        <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- elFinder JS (REQUIRED) -->
        <script src="{{ asset('vendor/elfinder/js/elfinder.min.js') }}"></script>

        <!-- Extra contents editors (OPTIONAL) -->
        <script src="{{ asset('vendor/elfinder/js/extras/editors.default.min.js') }}"></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
        <script>

            function elfinderDialog(context){ // <------------------ +context
                var fm = $('<div/>').dialogelfinder({
                    url : '{{ asset('vendor/elfinder/php/connector.minimal.php') }}',
                    lang : 'en',
                    width : 840,
                    height: 450,
                    destroyOnClose : true,
                    getFileCallback : function(file, fm) {
                        console.log(file);
                        // $('.editor').summernote('editor.insertImage', fm.convAbsUrl(file.url)); ...before
                        context.invoke('editor.insertImage', fm.convAbsUrl(file.url)); // <------------ after
                    },
                    commandsOptions : {
                        getfile : {
                            oncomplete : 'close',
                            folders : false
                        }
                    }
                }).dialogelfinder('instance');
            }

            (function (factory) {
                /* global define */
                if (typeof define === 'function' && define.amd) {
                    // AMD. Register as an anonymous module.
                    define(['jquery'], factory);
                } else if (typeof module === 'object' && module.exports) {
                    // Node/CommonJS
                    module.exports = factory(require('jquery'));
                } else {
                    // Browser globals
                    factory(window.jQuery);
                }
            }(function ($) {

                // Extends plugins for adding readmore.
                //  - plugin is external module for customizing.
                $.extend($.summernote.plugins, {
                    'elfinder': function (context) {
                        var self = this;

                        // ui has renders to build ui elements.
                        //  - you can create a button with `ui.button`
                        var ui = $.summernote.ui;

                        // add elfinder button
                        context.memo('button.elfinder', function () {
                            // create button
                            var button = ui.button({
                                contents: '<i class="fa fa-list-alt"/> Add Picture',
                                tooltip: 'elfinder',
                                click: function () {
                                    elfinderDialog(context);
                                }
                            });

                            // create jQuery object from button instance.
                            var $elfinder = button.render();
                            return $elfinder;
                        });

                        // This methods will be called when editor is destroyed by $('..').summernote('destroy');
                        // You should remove elements on `initialize`.
                        this.destroy = function () {
                            this.$panel.remove();
                            this.$panel = null;
                        };
                    }

                });
            }));



        </script>

        <script>

            $("#post-create-form").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 5
                    }
                },
            });

            $('#summernote').summernote({
                placeholder: 'Hello bootstrap 4',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'elfinder', 'video', 'hr', 'readmore']],
                    ['genixcms', ['elfinder']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ],
            });
        </script>
        <script>

            $(document).ready(function() {
                $('#elfinder').elfinder(
                    // 1st Arg - options
                    {
                        cssAutoLoad : false,               // Disable CSS auto loading
                        baseUrl : './',                    // Base URL to css/*, js/*
                        url : 'vendor/elfinder/php/connector.minimal.php',
                    },
                )
                    .dialog({modal: true});
            });
        </script>
    @endpush

    <div id="elfinder"></div>

@endsection
