@extends('layouts.admin')

@section('content')

    <h1>Add New Image</h1>
    <hr>
    <form action="{{ route('admin.images.store') }}" class="" method="post" id="images">
        @csrf
        <div id="images-upload" style="height: 200px; width: 200px; background-color: #ced2bf;"></div> <!-- this is were the previews should be shown. -->
        <div id="container" style="width: 100px; height: 100px; background-color: #b1aba9"></div>


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



    {{--<div id="tpl">--}}
        {{--<div class="dz-preview dz-file-preview">--}}
            {{--<div class="dz-details">--}}
                {{--<div class="dz-filename"><span data-dz-name></span></div>--}}
                {{--<div class="dz-size" data-dz-size></div>--}}
                {{--<img data-dz-thumbnail />--}}
            {{--</div>--}}
            {{--<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>--}}
            {{--<div class="dz-success-mark"><span>✔</span></div>--}}
            {{--<div class="dz-error-mark"><span>✘</span></div>--}}
            {{--<div class="dz-error-message"><span data-dz-errormessage></span></div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div id="container" style="width: 100px; height: 100px; background-color: #a9dba9"></div>

    <div class="d-none">
    <div id="tpl">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" alt="Card image cap" data-dz-thumbnail>
            <div class="card-body">
                <h5 class="card-title" data-dz-name></h5>
                <div class="dz-progress" style="height: 5px; background-color: #0e90d2"><span class="dz-upload" data-dz-uploadprogress></span></div>
                <p class="card-text" data-dz-size></p>
                <a href="#" class="btn btn-primary" data-dz-remove>Remove</a>
            </div>
        </div>
    </div>
    </div>





    @push('view_scripts')

        <script type="application/javascript">

            // window.onload = function () {
            //     var progressBar = new ProgressBar.Circle('#container', {
            //         strokeWidth: 2
            //     });
            //     progressBar.animate(0.3, {
            //         duration: 2000
            //     }, function() {
            //         console.log('Animation has finished');
            //     });
            // };

            // jQuery(document).ready(function() {
            //
            //     let form2 = $("div#my-awesome-dropzone").dropzone({
            //         url: "/uploadcar",
            //         thumbnailWidth: 240,
            //         thumbnailHeight: 240,
            //         previewTemplate: document.querySelector('#tpl').innerHTML,
            //         addRemoveLinks: true,
            //         uploadprogress: function (file, progress, bytesSent) {
            //             alert(progress)
            //         }
            //     });
            //
            //
            //
            //
            // });



            // $(function() {
            //     Dropzone.options.images = {
            //         autoProcessQueue: false,
            //         uploadMultiple: true,
            //         parallelUploads: 100,
            //         maxFiles: 3,
            //         thumbnailWidth: 240,
            //         thumbnailHeight: 240,
            //         addRemoveLinks: true,
            //
            //         // The setting up of the dropzone
            //         init: function () {
            //             let myDropzone = this;
            //
            //             // First change the button to actually tell Dropzone to process the queue.
            //             this.element.querySelector("button[type=submit]").addEventListener("click", function (e) {
            //                 // Make sure that the form isn't actually being sent.
            //                 e.preventDefault();
            //                 e.stopPropagation();
            //                 myDropzone.processQueue();
            //             });
            //
            //             // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
            //             // of the sending event because uploadMultiple is set to true.
            //             this.on("sendingmultiple", function () {
            //                 // Gets triggered when the form is actually being sent.
            //                 // Hide the success button or the complete form.
            //             });
            //             this.on("successmultiple", function (files, response) {
            //                 // Gets triggered when the files have successfully been sent.
            //                 // Redirect user or notify of success.
            //             });
            //             this.on("errormultiple", function (files, response) {
            //                 // Gets triggered when there was an error sending the files.
            //                 // Maybe show form again, and notify user of error
            //             });
            //         }
            //     };
            // });
        </script>
    @endpush

@endsection
